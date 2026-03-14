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
    $productCategoryId = $_GET['productCategoryId'] ?? '';
    $productId = $_GET['productId'] ?? '';

    validateEmptyField($branchId, 'BRANCH');

    $limit = '';
    if ($page !== 'products') {
        $limit = " LIMIT 24 ";
    }

    ////////////////// Dynamic Conditions //////////////////

    $conditions = [];
    $params = [$branchId, "%{$q}%"];
    $types = "ss";

    if (!empty($productCategoryId)) {
        $conditions[] = "a.productCategoryId = ?";
        $params[] = $productCategoryId;
        $types .= "s";
    }

    if (!empty($productId)) {
        $conditions[] = "a.productId = ?";
        $params[] = $productId;
        $types .= "s";
    }

    $extraWhere = '';
    if (!empty($conditions)) {
        $extraWhere = " AND " . implode(" AND ", $conditions);
    }

    ////////////////// Products Query //////////////////

    $selectQuery = "
        SELECT 
            a.productId,
            a.productCategoryId,
            a.sellingPrice,
            b.productName,
            c.pageUrl
        FROM BRANCH_PRODUCTS_TAB a
        JOIN PRODUCTS_TAB b ON a.productId = b.productId
        JOIN PAGES_TAB c ON a.productId = c.publishId
        WHERE
            a.branchId = ?
            AND b.productTags LIKE ?
            AND b.productLevel = 2
            AND b.statusId = 1
            $extraWhere
        ORDER BY a.sellingPrice ASC
        $limit
    ";

    $productsData = selectQuery($conn, $selectQuery, $types, $params);
    $allRecordCount = count($productsData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    ////////////////// Attach Extra Data //////////////////

    $products = [];

    foreach ($productsData as $product) {

        $productId = $product['productId'];
        $productCategoryId = $product['productCategoryId'];

        ////////////////// Product Category Name //////////////////

        $categoryQuery = "SELECT productName FROM PRODUCTS_TAB WHERE productId = ?";
        $categoryData = selectQuery($conn, $categoryQuery, 's', [$productCategoryId]);

        $product['productCategoryName'] = $categoryData[0]['productName'] ?? null;

        ////////////////// Product Pictures //////////////////

        $pixQuery = "SELECT productPix FROM PRODUCT_PIX_TAB WHERE productId = ?";
        $picturesData = selectQuery($conn, $pixQuery, 's', [$productId]);

        $product['picturesData'] = $picturesData;

        ////////////////// Cart Quantity //////////////////

        $cartQuery = "
            SELECT SUM(quantity) AS totalQuantity
            FROM ADD_TO_CART_TEMP
            WHERE
                userDeviceId = ?
                AND productCategoryId = ?
                AND productId = ?
        ";

        $cartData = selectQuery($conn, $cartQuery, 'sss', [
            $userDeviceId,
            $productCategoryId,
            $productId
        ]);

        $product['cartQuantity'] = $cartData[0]['totalQuantity'] ?? 1;

        $products[] = $product;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'allRecordCount' => $allRecordCount,
        'message' => $page !== 'products'
            ? "TOP SALES PRODUCTS FETCHED SUCCESSFULLY!"
            : "PRODUCTS FETCHED SUCCESSFULLY!",
        'data' => $products
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>