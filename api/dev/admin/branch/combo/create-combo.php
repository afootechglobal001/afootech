<?php
require_once '../../../config/connection.php';
require_once '../../../config/staff-session-check.php';

try {
    if (!$checkBasicSecurity) {
        throw new UnauthorizedException("Unauthorized access.");
    }

    if (!$checkSession) {
        throw new UnauthorizedException("SESSION EXPIRED! Please LogIn Again.");
    }

    ////////////////// Variables //////////////////
    $branchId      = trim($_GET['branchId'] ?? '');
    $comboName     = trim(strtoupper($_POST['comboName'] ?? ''));
    $comboTags     = trim(strtoupper(str_replace("'", "\'", $_POST['comboTags'] ?? '')));
    $statusId      = trim($_POST['statusId'] ?? '');
    $comboPixCount = !empty($_FILES["comboPix"]["name"]) ? count($_FILES["comboPix"]["name"]) : 0;

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboName, 'COMBO NAME');
    validateEmptyField($comboTags, 'COMBO TAGS');
    validateEmptyField($statusId, 'COMBO STATUS');

    if ($comboPixCount === 0) {
        throw new BadRequestException("COMBO PICTURES REQUIRED! Check the fields and try again");
    }

    ////////////////// Check for duplicate combo //////////////////
    $existingCombo = selectQuery(
        $conn,
        "SELECT * FROM BRANCH_COMBO_TAB WHERE branchId=? AND comboName=?",
        "ss",
        [$branchId, $comboName]
    );

    if (!empty($existingCombo)) {
        throw new ConflictException("COMBO EXIST! Combo already exists by name. Check and try again.");
    }

    ////////////////// Generate Combo ID //////////////////
    $sequence = _get_sequence_count($conn, 'GFSC');
    $array    = json_decode($sequence, true);
    $no       = $array[0]['no'];
    $comboId  = 'GFSC' . $no . date("Ymdhis");

    ////////////////// Insert Combo //////////////////
    insertQuery(
        $conn,
        "INSERT INTO BRANCH_COMBO_TAB (branchId, comboId, comboName, comboTags, statusId, createdBy, createdTime)
         VALUES (?, ?, ?, ?, ?, ?, NOW())",
        "ssssss",
        [$branchId, $comboId, $comboName, $comboTags, $statusId, $loginStaffId]
    );

    ////////////////// Handle Combo Images //////////////////
    $oldComboPixNames = '';
    $newComboPixNames = '';

    for ($i = 0; $i < $comboPixCount; $i++) {
        $imageName      = $_FILES["comboPix"]["name"][$i];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName   = $comboId . "_" . $i . uniqid() . "." . $imageExtension;

        insertQuery(
            $conn,
            "INSERT INTO PRODUCT_PIX_TAB (productId, productPix, createdTime) VALUES (?, ?, NOW())",
            "ss",
            [$comboId, $newImageName]
        );

        $newComboPixNames .= $newImageName . ",";
    }

    ////////////////// Fetch Combo Data //////////////////
    $comboDataArr = selectQuery(
        $conn,
        "SELECT * FROM BRANCH_COMBO_TAB WHERE comboId=?",
        "s",
        [$comboId]
    );

    $responseData = [];

    foreach ($comboDataArr as $comboData) {

        $comboId     = $comboData['comboId'];
        $statusId    = $comboData['statusId'];
        $createdBy   = $comboData['createdBy'];
        $updatedBy   = $comboData['updatedBy'];

        // Combo Pictures
        $comboData['picturesData'] = selectQuery(
            $conn,
            "SELECT * FROM PRODUCT_PIX_TAB WHERE productId=?",
            "s",
            [$comboId]
        );

        // Status
        $comboData['statusData'] = selectQuery(
            $conn,
            "SELECT * FROM SETUP_STATUS_TAB WHERE statusId=?",
            "s",
            [$statusId]
        )[0] ?? null;

        // Created by
        $comboData['createdBy'] = _action_performed_by($conn, $createdBy) ?? null;
        // Updated by
        $comboData['updatedBy'] = _action_performed_by($conn, $updatedBy) ?? null;

        $responseData[] = $comboData;
    }

    ////////////////// Response //////////////////
    $response = [
        'response'         => 200,
        'success'          => true,
        'message'          => "COMBO CREATED SUCCESSFULLY!",
        'oldComboPixNames' => $oldComboPixNames,
        'newComboPixNames' => $newComboPixNames,
        'data'             => $responseData
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);