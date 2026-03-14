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
    $branchId = $_GET['branchId'] ?? '';
    $q        = $_GET['q'] ?? '';

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');

    ////////////////// Main Product Query //////////////////
    $select = "
        SELECT 
            a.*, 
            b.sellingPrice, 
            b.createdBy AS productAddedBy, 
            b.updatedBy AS productUpdatedBy, 
            b.statusId AS productStatusId 
        FROM PRODUCTS_TAB a
        JOIN BRANCH_PRODUCTS_TAB b 
            ON a.parentId = b.productCategoryId 
            AND a.productId = b.productId
        WHERE 
            b.branchId = ? 
            AND a.statusId = 1 
            AND a.productTags LIKE ?
        ORDER BY a.productName ASC
    ";
    $products = selectQuery($conn, $select, "ss", [$branchId, "%$q%"]);

    if (empty($products)) {
        throw new NotFoundException("No products found for this branch.");
    }

    ////////////////// Build Response //////////////////
    $responseData = [];
    foreach ($products as $product) {
        $productId        = $product['productId'];
        $productCategoryId = $product['parentId'];
        $statusId         = $product['productStatusId'];
        $createdBy        = $product['productAddedBy'];
        $updatedBy        = $product['productUpdatedBy'];

        // Product Category Data
        $productCategoryData = selectQuery($conn, "SELECT * FROM PRODUCTS_TAB WHERE productId = ?", "s", [$productCategoryId]);
        $product['productCategoryData'] = $productCategoryData[0] ?? [];

        // Product Pictures
        $productPix = selectQuery($conn, "SELECT * FROM PRODUCT_PIX_TAB WHERE productId = ?", "s", [$productId]);
        $product['picturesData'] = $productPix;

        // Status Data
        $statusData = selectQuery($conn, "SELECT * FROM SETUP_STATUS_TAB WHERE statusId = ?", "s", [$statusId]);
        $product['statusData'] = $statusData[0] ?? [];

        // Created By
        $product['createdBy'] = _action_performed_by($conn, $createdBy) ?? null;
        // Updated By
        $product['updatedBy'] = _action_performed_by($conn, $updatedBy) ?? null;

        $responseData[] = $product;
    }

    $response = [
        'response'       => 200,
        'success'        => true,
        'message'        => "PRODUCT FETCHED SUCCESSFULLY!",
        'allRecordCount' => count($responseData),
        'data'           => $responseData,
    ];


} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);