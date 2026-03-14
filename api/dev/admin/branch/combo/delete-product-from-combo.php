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
    $branchId  = $_GET['branchId'] ?? '';
    $comboId   = $_GET['comboId'] ?? '';
    $productId = $_GET['productId'] ?? '';

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboId, 'COMBO ID');
    validateEmptyField($productId, 'PRODUCT ID');

    ////////////////// Delete Product from Combo //////////////////
    $deleteQuery = "
        DELETE FROM BRANCH_COMBO_PRODUCTS_TAB 
        WHERE branchId = ? AND comboId = ? AND productId = ?
    ";
    deleteQuery($conn, $deleteQuery, "sss", [$branchId, $comboId, $productId]);

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "PRODUCT REMOVED FROM COMBO SUCCESSFULLY!"
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);