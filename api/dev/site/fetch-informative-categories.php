<?php
require_once '../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    /////////////////////// Fetch Informative Categories /////////////////////////

    $selectQuery = "
        SELECT 
            categoryId,
            categoryName
        FROM INFORMATION_CATEGORY_TAB
        WHERE statusId = 1
    ";

    $categoryData = selectQuery($conn, $selectQuery);
    $allRecordCount = count($categoryData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    /////////////////////// Response /////////////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "INFORMATIVE CATEGORIES FETCHED SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'data' => $categoryData
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>