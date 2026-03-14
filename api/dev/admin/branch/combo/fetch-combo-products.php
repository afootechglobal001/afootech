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
    $comboId  = $_GET['comboId'] ?? '';
    $q        = $_GET['q'] ?? '';

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboId, 'COMBO ID');

    ////////////////// Fetch Combo Products //////////////////
    $select = "
        SELECT 
            a.*, 
            b.parentId,
            b.productName,
            b.productTags
        FROM BRANCH_COMBO_PRODUCTS_TAB a
        JOIN PRODUCTS_TAB b ON a.productId = b.productId
        WHERE 
            a.branchId = ? 
            AND a.comboId = ? 
            AND (b.productName LIKE ? OR b.productTags LIKE ?)
        ORDER BY b.productName ASC
    ";
    $comboProducts = selectQuery($conn, $select, "ssss", [$branchId, $comboId, "%$q%", "%$q%"]);

    if (empty($comboProducts)) {
        throw new NotFoundException("No combo products found.");
    }

    ////////////////// Fetch Branch and Combo Info //////////////////
    $branchData = selectQuery($conn, "SELECT * FROM BRANCHES_TAB WHERE branchId = ?", "s", [$branchId])[0] ?? [];
    $comboData  = selectQuery($conn, "SELECT * FROM BRANCH_COMBO_TAB WHERE comboId = ?", "s", [$comboId])[0] ?? [];

    ////////////////// Build Response Data //////////////////
    $responseData = [];
    foreach ($comboProducts as $product) {
        $productId = $product['productId'];
        $parentId  = $product['parentId'];

        // Parent Product Data
        $productParentData = selectQuery($conn, "SELECT * FROM PRODUCTS_TAB WHERE productId = ?", "s", [$parentId])[0] ?? [];
        $product['productParentData'] = $productParentData;

        // Product Data
        $productData = selectQuery($conn, "SELECT * FROM PRODUCTS_TAB WHERE productId = ?", "s", [$productId])[0] ?? [];
        $product['productData'] = $productData;

        // Product Price in Branch
        $productPriceData = selectQuery($conn, "SELECT sellingPrice FROM BRANCH_PRODUCTS_TAB WHERE branchId = ? AND productId = ?", "ss", [$branchId, $productId])[0] ?? [];
        $product['productPriceData'] = $productPriceData;

        // Product Pictures
        $productPix = selectQuery($conn, "SELECT * FROM PRODUCT_PIX_TAB WHERE productId = ?", "s", [$productId]);
        $product['picturesData'] = $productPix;

        $responseData[] = $product;
    }

    ////////////////// Response //////////////////
    $response = [
        'response'       => 200,
        'success'        => true,
        'message'        => "COMBO PRODUCTS FETCHED SUCCESSFULLY!",
        'allRecordCount' => count($responseData),
        'branchData'     => $branchData,
        'comboData'      => $comboData,
        'data'           => $responseData,
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}
    
http_response_code($response['response'] ?? 500);
echo json_encode($response);