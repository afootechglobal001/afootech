<?php
require_once '../config/connection.php';

try {
    // Basic security check
    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    /////////////////////// Declaration of variables /////////////////////////
    $categoryId = $_GET['categoryId'] ?? null;
    $page = $_GET['page'] ?? 'blog';
    $limit = ($page !== 'blog') ? "LIMIT 3" : "";

    // Build WHERE clause safely
    $whereClause = "WHERE a.statusId = 1";
    $params = [];
    $types = '';

    if (!empty($categoryId)) {
        $whereClause .= " AND a.blogCatId = ?";
        $params[] = $categoryId;
        $types .= 's';
    }

    // Main query
    $selectQuery = "
        SELECT 
            a.blogCatId, 
            a.blogId, 
            a.blogTitle, 
            a.blogPix,
            b.viewCount, 
            a.updatedTime,
            b.pageUrl,
            b.seoDescription
        FROM BLOG_TAB a
        JOIN PAGES_TAB b ON a.blogId = b.publishId
        $whereClause
        ORDER BY a.updatedTime DESC
        $limit
    ";

    $blogsData = selectQuery($conn, $selectQuery, $types, $params);
    $allRecordCount = count($blogsData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    // Fetch category details for each blog
    foreach ($blogsData as &$blog) {
        $categoryData = _get_information_category_details($conn, $blog['blogCatId']); // You can reuse _get_category_data() if you create it
        /// get only categoryId and categoryName from the categoryData
        $blog['categoryData'] = [
            'categoryId' => $categoryData['categoryId'] ?? null,
            'categoryName' => $categoryData['categoryName'] ?? null
        ];
    }

    /////////////////////// Response /////////////////////////
    $response = [
        'response' => 200,
        'success' => true,
        'message' => "BLOG FETCHED SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'data' => $blogsData
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

// Send response
http_response_code($response['response'] ?? 500);
echo json_encode($response);