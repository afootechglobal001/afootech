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
    $branchId    = $_GET['branchId'] ?? '';
    $comboId     = $_GET['comboId'] ?? '';
    $sellingPrice = $data['sellingPrice'] ?? null;

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($comboId, 'COMBO ID');

    if (!is_numeric($sellingPrice) || $sellingPrice <= 0) {
        throw new InvalidArgumentException("SELLING PRICE must be a positive number.");
    }

    ////////////////// Update Combo //////////////////
    $updateQuery = "UPDATE `BRANCH_COMBO_TAB` 
                    SET `sellingPrice` = ?, `updatedBy` = ?, `updatedTime` = NOW() 
                    WHERE branchId = ? AND comboId = ?";
    updateQuery($conn, $updateQuery, "dsss", [$sellingPrice, $loginStaffId, $branchId, $comboId]);

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "COMBO SELLING PRICE UPDATED SUCCESSFULLY!",
        'data'     => [],
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}
http_response_code($response['response'] ?? 500);
echo json_encode($response);