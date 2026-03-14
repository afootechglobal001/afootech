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
    $branchId = trim($_GET['branchId'] ?? '');
    $comboId  = trim($_GET['comboId'] ?? '');
    $productIds = $data['productIds'] ?? [];

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboId, 'COMBO ID');

    if (empty($productIds) || !is_array($productIds)) {
        throw new BadRequestException("COMBO PRODUCTS REQUIRED! Provide at least one product and try again.");
    }

    ////////////////// Insert Products //////////////////
    foreach ($productIds as $product) {
        $productId = $product['productId'] ?? null;
        if (!$productId) continue;

        // Use INSERT ... ON DUPLICATE KEY UPDATE to skip existing records
        $insertQuery = "
            INSERT INTO BRANCH_COMBO_PRODUCTS_TAB
            (branchId, comboId, productId, createdBy, createdTime)
            VALUES (?, ?, ?, ?, NOW())
            ON DUPLICATE KEY UPDATE createdTime = createdTime
        ";
        insertQuery($conn, $insertQuery, "ssss", [$branchId, $comboId, $productId, $loginStaffId]);
    }

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "PRODUCTS ADDED TO COMBO SUCCESSFULLY!"
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);