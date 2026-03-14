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

    $sellingPrice      = $data['sellingPrice'] ?? '';
    $statusId          = $data['statusId'] ?? '';

    ////////////////// Validation //////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($productCategoryId, 'PRODUCT CATEGORY');
    validateEmptyField($productId, 'PRODUCT');
    validateEmptyField($statusId, 'STATUS');

    if (!is_numeric($sellingPrice) || $sellingPrice <= 0) {
        throw new InvalidArgumentException("SELLING PRICE must be a positive number.");
    }

    ////////////////// Check Existing Record //////////////////
    $existingProduct = selectQuery(
        $conn,
        "SELECT branchId FROM BRANCH_PRODUCTS_TAB 
         WHERE branchId=? AND productCategoryId=? AND productId=?",
        "sss",
        [$branchId, $productCategoryId, $productId]
    );

    ////////////////// Update Existing //////////////////
    if (!empty($existingProduct)) {

        updateQuery(
            $conn,
            "UPDATE BRANCH_PRODUCTS_TAB SET
            sellingPrice=?,
            statusId=?,
            updatedBy=?,
            updatedTime=NOW()
            WHERE branchId=? AND productCategoryId=? AND productId=?",
            "dsssss",
            [
                $sellingPrice,
                $statusId,
                $loginStaffId,
                $branchId,
                $productCategoryId,
                $productId
            ]
        );

        $message = "PRODUCT DETAILS UPDATED SUCCESSFULLY!";

    } else {

        ////////////////// Insert New //////////////////
        insertQuery(
            $conn,
            "INSERT INTO BRANCH_PRODUCTS_TAB
            (branchId,productCategoryId,productId,sellingPrice,statusId,createdBy,createdTime)
            VALUES (?,?,?,?,?,?,NOW())",
            "sssiss",
            [
                $branchId,
                $productCategoryId,
                $productId,
                $sellingPrice,
                $statusId,
                $loginStaffId
            ]
        );

        $message = "PRODUCT ADDED TO BRANCH SUCCESSFULLY!";
    }

    ////////////////// Response //////////////////
    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => $message,
        'data'     => []
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);