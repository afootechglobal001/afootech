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
    $branchId          = trim($_GET['branchId'] ?? '');
    $productCategoryId = trim($_GET['productCategoryId'] ?? '');
    $productId         = trim($_GET['productId'] ?? '');

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($productCategoryId, 'PRODUCT CATEGORY');
    validateEmptyField($productId, 'PRODUCT');

    ////////////////// Fetch Product //////////////////
    $product = selectQuery(
        $conn,
        "SELECT a.*, b.pageContent
         FROM PRODUCTS_TAB a
         INNER JOIN PAGES_TAB b ON a.productId = b.publishId
         WHERE a.productId=? AND a.parentId=?",
        "ss",
        [$productId, $productCategoryId]
    );

    if (empty($product)) {
        throw new NotFoundException("Product not found.");
    }

    $productData = $product[0];

    ////////////////// Fetch Product Images //////////////////
    $pictures = selectQuery(
        $conn,
        "SELECT * FROM PRODUCT_PIX_TAB WHERE productId=?",
        "s",
        [$productId]
    );

    $productData['productPictures'] = $pictures;

    ////////////////// Fetch Branch Product Details //////////////////
    $branchProduct = selectQuery(
        $conn,
        "SELECT * FROM BRANCH_PRODUCTS_TAB
         WHERE branchId=? AND productCategoryId=? AND productId=?",
        "sss",
        [$branchId, $productCategoryId, $productId]
    );

    if (!empty($branchProduct)) {

        $branchProductData = $branchProduct[0];

        ////////////////// Fetch Status //////////////////
        $status = selectQuery(
            $conn,
            "SELECT * FROM SETUP_STATUS_TAB WHERE statusId=?",
            "s",
            [$branchProductData['statusId']]
        );

        $branchProductData['statusData'] = $status[0] ?? null;

        $productData['productDetails'] = $branchProductData;
    } else {

        $productData['productDetails'] = null;
    }

    ////////////////// Fetch Product Category //////////////////
    $productCategory = selectQuery(
        $conn,
        "SELECT * FROM PRODUCTS_TAB WHERE productId=?",
        "s",
        [$productCategoryId]
    );

    $productData['productCategoryData'] = $productCategory[0] ?? null;

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "PRODUCT DETAILS FETCHED SUCCESSFULLY!",
        'data'     => $productData
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);