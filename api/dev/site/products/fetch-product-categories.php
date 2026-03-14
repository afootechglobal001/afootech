<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////// Variables //////////////////

    $q = $_GET['q'] ?? '';
    $branchId = $_GET['branchId'] ?? null;
    $page = $_GET['page'] ?? 'products';

    validateEmptyField($branchId, 'BRANCH');

    $limit = '';
    if ($page !== 'products') {
        $limit = " LIMIT 24 ";
    }

    ////////////////// Product Categories Query //////////////////

    $selectQuery = "
        SELECT
            a.productId AS productCategoryId,
            a.productName,
            b.pageUrl
        FROM PRODUCTS_TAB a
        JOIN PAGES_TAB b ON a.productId = b.publishId
        JOIN BRANCH_PRODUCTS_TAB c ON a.productId = c.productCategoryId
        WHERE
            c.branchId = ?
            AND a.productTags LIKE ?
            AND a.productLevel = 1
            AND a.statusId = 1
        GROUP BY
            a.productId,
            a.productName,
            b.pageUrl
        $limit
    ";

    $selectParams = [$branchId, "%{$q}%"];
    $categoriesData = selectQuery($conn, $selectQuery, 'ss', $selectParams);

    $allRecordCount = count($categoriesData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    ////////////////// Attach Pictures //////////////////

    $categories = [];

    foreach ($categoriesData as $category) {

        $productId = $category['productCategoryId'];

        $pixQuery = "SELECT productPix FROM PRODUCT_PIX_TAB WHERE productId = ?";
        $picturesData = selectQuery($conn, $pixQuery, 's', [$productId]);

        $category['picturesData'] = $picturesData;

        $categories[] = $category;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "PRODUCT CATEGORIES FETCH SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'data' => $categories
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>