<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////// Variables //////////////////

    $q = $_GET['q'] ?? '';
    $branchId = $_GET['branchId'] ?? null;
    $productCategoryId = $_GET['productCategoryId'] ?? null;

    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($productCategoryId, 'PRODUCT CATEGORY');

    ////////////////// Product Query //////////////////

    $selectQuery = "
        SELECT 
            a.*,
            b.sellingPrice
        FROM PRODUCTS_TAB a
        JOIN BRANCH_PRODUCTS_TAB b
            ON a.parentId = b.productCategoryId
            AND a.productId = b.productId
        WHERE
            b.branchId = ?
            AND b.productCategoryId = ?
            AND a.statusId = 1
            AND a.productTags LIKE ?
        ORDER BY a.productName ASC
    ";

    $selectParams = [$branchId, $productCategoryId, "%{$q}%"];
    $productsData = selectQuery($conn, $selectQuery, 'sss', $selectParams);

    $allRecordCount = count($productsData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    ////////////////// Product Category //////////////////

    $categoryQuery = "
        SELECT productId AS productCategoryId, productName, productTags
        FROM PRODUCTS_TAB
        WHERE productId = ?
    ";

    $categoryData = selectQuery($conn, $categoryQuery, 's', [$productCategoryId]);
    $productCategoryData = $categoryData[0] ?? null;

    ////////////////// Attach Pictures //////////////////

    $products = [];

    foreach ($productsData as $product) {

        $productId = $product['productId'];

        $pixQuery = "SELECT * FROM PRODUCT_PIX_TAB WHERE productId = ?";
        $picturesData = selectQuery($conn, $pixQuery, 's', [$productId]);

        $product['picturesData'] = $picturesData;

        $products[] = $product;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "PRODUCT FETCHED SUCCESSFULLY!",
        'allRecordCount' => $allRecordCount,
        'productCategoryData' => $productCategoryData,
        'data' => $products
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>