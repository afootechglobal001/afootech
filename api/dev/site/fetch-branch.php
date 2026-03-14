<?php
require_once '../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    /////////////////////// Declaration of variables /////////////////////////
    $branchId = $_GET['branchId'] ?? null;

    $whereClause = "WHERE branchId != 'GFSB001' AND statusId = 1";
    $params = [];
    $types = '';

    if (!empty($branchId)) {
        $whereClause .= " AND branchId = ?";
        $params[] = $branchId;
        $types .= 's';
    }

    $selectQuery = "
        SELECT 
            branchId, 
            name AS branchName, 
            mobileNumber, 
            address, 
            logo 
        FROM BRANCHES_TAB
        $whereClause
    ";

    $branchData = selectQuery($conn, $selectQuery, $types, $params);
    $allRecordCount = count($branchData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    /////////////////////// Response /////////////////////////
    $response = [
        'response' => 200,
        'success' => true,
        'message' => "BRANCH FETCHED SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'data' => $branchData
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>