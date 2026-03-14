<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////////// Fetch Cart Items //////////////////////

    $cartQuery = "SELECT * FROM ADD_TO_CART_TEMP WHERE userDeviceId = ?";
    $cartItemsData = selectQuery($conn, $cartQuery, 's', [$userDeviceId]);
    $allRecordCount = count($cartItemsData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No items in cart.");
    }

    $totalItemsPrice = 0;
    $cartItems = [];

    foreach ($cartItemsData as $cartItem) {

        $branchId = $cartItem['branchId'];
        $productCategoryId = $cartItem['productCategoryId'];
        $productId = $cartItem['productId'];
        $quantity = $cartItem['quantity'];

        ////////////////////// Fetch Branch //////////////////////
        $branchQuery = "
            SELECT branchId, name AS branchName, mobileNumber, address, logo
            FROM BRANCHES_TAB
            WHERE branchId = ?
        ";
        $branchData = selectQuery($conn, $branchQuery, 's', [$branchId]);
        $cartItem['branchData'] = $branchData[0] ?? null;

        ////////////////////// Fetch Product Category //////////////////////
        $categoryQuery = "
            SELECT productId AS productCategoryId, productName AS productCategoryName
            FROM PRODUCTS_TAB
            WHERE productId = ?
        ";
        $categoryData = selectQuery($conn, $categoryQuery, 's', [$productCategoryId]);
        $cartItem['productCategoryData'] = $categoryData[0] ?? null;

        ////////////////////// Fetch Product //////////////////////
        $productQuery = "
            SELECT 
                a.productId, 
                a.productName, 
                b.sellingPrice AS unitPrice
            FROM PRODUCTS_TAB a
            JOIN BRANCH_PRODUCTS_TAB b 
                ON a.parentId = b.productCategoryId 
                AND a.productId = b.productId 
                AND b.branchId = ?
            WHERE a.parentId = ? AND a.productId = ?
        ";
        $productData = selectQuery($conn, $productQuery, 'sss', [$branchId, $productCategoryId, $productId]);
        $cartItem['productData'] = $productData[0] ?? null;

        $cartItem['subPrice'] = ($productData[0]['unitPrice'] ?? 0) * $quantity;
        $totalItemsPrice += $cartItem['subPrice'];

        ////////////////////// Fetch Product Pictures //////////////////////
        $pixQuery = "SELECT productPix FROM PRODUCT_PIX_TAB WHERE productId = ?";
        $picturesData = selectQuery($conn, $pixQuery, 's', [$productId]);
        $cartItem['picturesData'] = $picturesData;

        $cartItems[] = $cartItem;
    }

    ////////////////////// Response //////////////////////
    $response = [
        'response' => 200,
        'success' => true,
        'message' => "Cart details fetched successfully.",
        'totalItemsPrice' => $totalItemsPrice,
        'data' => $cartItems
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>