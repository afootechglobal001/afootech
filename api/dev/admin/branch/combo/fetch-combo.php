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
    $branchId = $_GET['branchId'] ?? '';
    $comboId  = $_GET['comboId'] ?? '';
    $statusId = $_GET['statusId'] ?? '';
    $q        = $_GET['q'] ?? '';

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    $q = mysqli_real_escape_string($conn, $q);

    ////////////////// Build Conditions //////////////////
    $conditions = ['branchId = ?'];
    $params = [$branchId];
    $types = 's';

    if (!empty($comboId)) {
        $conditions[] = 'comboId = ?';
        $params[] = $comboId;
        $types .= 's';
    }

    if (!empty($statusId)) {
        $statusList = implode(',', array_map('intval', explode(',', $statusId)));
        $conditions[] = "statusId IN ($statusList)";
    }

    $conditions[] = "(comboTags LIKE ?)";
    $params[] = "%$q%";
    $types .= 's';

    $whereClause = implode(' AND ', $conditions);
    $select = "SELECT * FROM BRANCH_COMBO_TAB WHERE $whereClause ORDER BY comboName ASC";

    $combos = selectQuery($conn, $select, $types, $params);

    if (empty($combos)) {
        throw new NotFoundException("No combos found for this branch.");
    }

    ////////////////// Fetch Branch Data //////////////////
    $branchData = selectQuery($conn, "SELECT * FROM BRANCHES_TAB WHERE branchId = ?", "s", [$branchId])[0] ?? [];

    ////////////////// Build Response Data //////////////////
    $responseData = [];
    foreach ($combos as $combo) {
        $comboId  = $combo['comboId'];
        $statusId = $combo['statusId'];
        $createdBy = $combo['createdBy'];
        $updatedBy = $combo['updatedBy'];

        // Number of products in combo
        $numberOfProducts = selectQuery($conn, "SELECT COUNT(*) AS numberOfProducts FROM BRANCH_COMBO_PRODUCTS_TAB WHERE comboId = ?", "s", [$comboId])[0]['numberOfProducts'] ?? 0;
        $combo['numberOfProducts'] = $numberOfProducts;

        // Combo Pictures
        $comboPix = selectQuery($conn, "SELECT * FROM PRODUCT_PIX_TAB WHERE productId = ?", "s", [$comboId]);
        $combo['picturesData'] = $comboPix;

        // Status Data
        $statusData = selectQuery($conn, "SELECT * FROM SETUP_STATUS_TAB WHERE statusId = ?", "s", [$statusId])[0] ?? [];
        $combo['statusData'] = $statusData;

        // Created By
        $combo['createdBy'] = _action_performed_by($conn, $createdBy) ?? null;

        // Updated By
        $combo['updatedBy'] = _action_performed_by($conn, $updatedBy) ?? null;

        $responseData[] = $combo;
    }

    ////////////////// Response //////////////////
    $response = [
        'response'       => 200,
        'success'        => true,
        'message'        => "COMBOS FETCHED SUCCESSFULLY!",
        'allRecordCount' => count($responseData),
        'branchData'     => $branchData,
        'data'           => $responseData,
    ];
} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);