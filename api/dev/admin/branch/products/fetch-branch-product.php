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

    ////////////////// Fetch Products //////////////////
    $products = selectQuery(
        $conn,
        "SELECT 
            a.*,
            b.sellingPrice,
            b.createdBy AS productAddedBy,
            b.updatedBy AS productUpdatedBy,
            b.statusId AS productStatusId
        FROM PRODUCTS_TAB a
        INNER JOIN BRANCH_PRODUCTS_TAB b 
            ON a.productId = b.productId
            AND a.parentId = b.productCategoryId
        WHERE 
            b.branchId=? 
            AND b.productCategoryId=? 
            AND a.statusId=1
            AND a.productTags LIKE ?
        ORDER BY a.productName ASC",
        "sss",
        [$branchId, $productCategoryId, "%$q%"]
    );

    if (empty($products)) {
        throw new NotFoundException("No Record found");
    }

    ////////////////// Fetch Product Category //////////////////
    $productCategory = selectQuery(
        $conn,
        "SELECT * FROM PRODUCTS_TAB WHERE productId=?",
        "s",
        [$productCategoryId]
    );

    $responseData = [];

    foreach ($products as $product) {

        $productId = $product['productId'];
        $statusId  = $product['productStatusId'];
        $createdBy = $product['productAddedBy'];
        $updatedBy = $product['productUpdatedBy'];

        ////////////////// Product Images //////////////////
        $pictures = selectQuery(
            $conn,
            "SELECT * FROM PRODUCT_PIX_TAB WHERE productId=?",
            "s",
            [$productId]
        );

        $product['picturesData'] = $pictures;

        ////////////////// Status //////////////////
        $status = selectQuery(
            $conn,
            "SELECT * FROM SETUP_STATUS_TAB WHERE statusId=?",
            "s",
            [$statusId]
        );

        $product['statusData'] = $status[0] ?? null;

        ////////////////// Created By //////////////////
        $product['createdBy'] = _action_performed_by($conn, $createdBy) ?? null;

        ////////////////// Updated By //////////////////
        $product['updatedBy'] = _action_performed_by($conn, $updatedBy) ?? null;

        $responseData[] = $product;
    }

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success' => true,
        'message' => "PRODUCT FETCHED SUCCESSFULLY!",
        'allRecordCount' => count($responseData),
        'productCategoryData' => $productCategory[0] ?? null,
        'data' => $responseData
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);