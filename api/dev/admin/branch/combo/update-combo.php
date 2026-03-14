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
    $branchId      = $_GET['branchId'] ?? '';
    $comboId       = $_GET['comboId'] ?? '';
    $comboName     = trim(strtoupper($_POST['comboName'] ?? ''));
    $comboTags     = trim(strtoupper(str_replace("'", "\'", $_POST['comboTags'] ?? '')));
    $comboPixFiles = $_FILES["comboPix"]["name"] ?? [];
    $statusId      = trim($_POST['statusId'] ?? '');

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboId, 'COMBO ID');
    validateEmptyField($comboName, 'COMBO NAME');
    validateEmptyField($comboTags, 'COMBO TAGS');
    validateEmptyField($statusId, 'COMBO STATUS');

    // Check duplicate combo name
    $checkQuery = "SELECT * FROM BRANCH_COMBO_TAB WHERE branchId=? AND comboName=? AND comboId != ?";
    $count = selectQuery($conn, $checkQuery, "sss", [$branchId, $comboName, $comboId]);
    if ($count > 0) {
        throw new InvalidArgumentException("COMBO EXIST! Combo already exists by name. Check and try again.");
    }

    ////////////////// Update Combo //////////////////
    $updateQuery = "UPDATE `BRANCH_COMBO_TAB` 
                    SET `comboName`=?, `comboTags`=?, `statusId`=?, `updatedBy`=?, `updatedTime`=NOW() 
                    WHERE branchId=? AND comboId=?";
    updateQuery($conn, $updateQuery, "ssssss", [$comboName, $comboTags, $statusId, $loginStaffId, $branchId, $comboId]);

    ////////////////// Handle Combo Pictures //////////////////
    $oldComboPixNames = '';
    $newComboPixNames = '';
    if (count($comboPixFiles) > 0) {
        // Get old pictures
        $oldPix = selectQuery($conn, "SELECT productPix FROM PRODUCT_PIX_TAB WHERE productId=?", "s", [$comboId], true);
        foreach ($oldPix as $pix) {
            $oldComboPixNames .= $pix['productPix'] . ',';
        }

        // Delete old pictures
        deleteQuery($conn, "DELETE FROM PRODUCT_PIX_TAB WHERE productId=?", "s", [$comboId]);

        // Insert new pictures
        foreach ($comboPixFiles as $i => $imageName) {
            $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            $newImageName = $comboId . "_$i" . uniqid() . "." . $imageExtension;
            insertQuery($conn, "INSERT INTO PRODUCT_PIX_TAB (productId, productPix, createdTime) VALUES (?, ?, NOW())", "ss", [
                $comboId,
                $newImageName,
            ]);
            $newComboPixNames .= $newImageName . ',';
        }
    }

    ////////////////// Fetch Updated Combo //////////////////
    $comboData = selectQuery($conn, "SELECT * FROM BRANCH_COMBO_TAB WHERE comboId=?", "s", [$comboId], true)[0];

    // Fetch related data
    $comboData['picturesData'] = selectQuery($conn, "SELECT * FROM PRODUCT_PIX_TAB WHERE productId=?", "s", [$comboId], true);
    $comboData['statusData']   = selectQuery($conn, "SELECT * FROM SETUP_STATUS_TAB WHERE statusId=?", "s", [$comboData['statusId']])[0];
    $comboData['createdBy']    = selectQuery($conn, "SELECT CONCAT(firstName,' ',lastName) AS fullname,emailAddress FROM STAFF_TAB WHERE staffId=?", "s", [$comboData['createdBy']])[0];
    $comboData['updatedBy']    = selectQuery($conn, "SELECT CONCAT(firstName,' ',lastName) AS fullname,emailAddress FROM STAFF_TAB WHERE staffId=?", "s", [$comboData['updatedBy']])[0];

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "COMBO UPDATED SUCCESSFULLY!",
        'oldComboPixNames' => $oldComboPixNames,
        'newComboPixNames' => $newComboPixNames,
        'data' => [$comboData]
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>