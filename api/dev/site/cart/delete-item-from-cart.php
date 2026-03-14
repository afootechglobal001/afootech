<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////// Variables //////////////////

    $branchId = $_GET['branchId'] ?? null;
    $productCategoryId = $_GET['productCategoryId'] ?? null;
    $productId = $_GET['productId'] ?? null;

    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($productCategoryId, 'PRODUCT CATEGORY');
    validateEmptyField($productId, 'PRODUCT');

    ////////////////// Delete Cart Product //////////////////

    $deleteQuery = "
        DELETE FROM ADD_TO_CART_TEMP
        WHERE userDeviceId = ?
        AND branchId = ?
        AND productCategoryId = ?
        AND productId = ?
    ";

    $deleteParams = [$userDeviceId, $branchId, $productCategoryId, $productId];
    deleteQuery($conn, $deleteQuery, 'ssss', $deleteParams);

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "Product removed from cart successfully!"
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>