<?php
require_once '../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    /////////////////////// Declaration of variables /////////////////////////
    $categoryId = $_GET['categoryId'] ?? null;
    $page = $_GET['page'] ?? 'faq';

    $whereClause = "WHERE statusId = 1";
    $params = [];
    $types = '';

    if (!empty($categoryId)) {
        $whereClause .= " AND faqCatId = ?";
        $params[] = $categoryId;
        $types .= 's';
    }

    $limit = ($page !== 'faq') ? "LIMIT 3" : "";

    $selectQuery = "
        SELECT 
            faqCatId,
            faqId,
            faqQuestion,
            faqAnswer
        FROM FAQ_TAB
        $whereClause
        ORDER BY RAND()
        $limit
    ";

    $faqData = selectQuery($conn, $selectQuery, $types, $params);
    $allRecordCount = count($faqData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    /////////////////////// Response /////////////////////////
    $response = [
        'response' => 200,
        'success' => true,
        'message' => "FAQ FETCHED SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'data' => $faqData
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>