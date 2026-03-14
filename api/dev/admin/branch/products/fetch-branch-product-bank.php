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
    $q                 = trim($_GET['q'] ?? '');
    $branchId          = trim($_GET['branchId'] ?? '');
    $productCategoryId = trim($_GET['productCategoryId'] ?? '');

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($productCategoryId, 'PRODUCT CATEGORY');

    ////////////////// Fetch Product Category //////////////////
    $productCategory = selectQuery(
        $conn,
        "SELECT * FROM PRODUCTS_TAB WHERE productId=?",
        "s",
        [$productCategoryId]
    );

    if (empty($productCategory)) {
        throw new NotFoundException("Product category not found.");
    }

    ////////////////// Fetch Products //////////////////
    $products = selectQuery(
        $conn,
        "SELECT a.* 
         FROM PRODUCTS_TAB a
         INNER JOIN PAGES_TAB b ON a.productId = b.publishId
         WHERE a.productTags LIKE ?
         AND a.parentId = ?
         AND a.statusId = 1
         AND a.productId NOT IN (
            SELECT productId 
            FROM BRANCH_PRODUCTS_TAB 
            WHERE branchId=? AND productCategoryId=?
         )
         ORDER BY a.productName ASC",
        "ssss",
        [
            "%$q%",
            $productCategoryId,
            $branchId,
            $productCategoryId
        ]
    );

    if (empty($products)) {
        throw new NotFoundException("No Record found");
    }

    ////////////////// Attach Product Images //////////////////
    foreach ($products as &$product) {

        $pictures = selectQuery(
            $conn,
            "SELECT * FROM PRODUCT_PIX_TAB WHERE productId=?",
            "s",
            [$product['productId']]
        );

        $product['picturesData'] = $pictures;
    }

    ////////////////// Response //////////////////
    $response = [
        'response'           => 200,
        'success'            => true,
        'message'            => "PRODUCT CATEGORY FETCHED SUCCESSFULLY!",
        'allRecordCount'     => count($products),
        'productCategoryData'=> $productCategory[0],
        'data'               => $products
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);