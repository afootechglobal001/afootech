<?php
require_once '../../config/connection.php';

try {
    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    $branchId = $_GET['branchId'] ?? '';
    $productCategoryId = $_GET['productCategoryId'] ?? '';
    $productId = $_GET['productId'] ?? '';
    $quantity = $data['quantity'] ?? '';
    
    /////////////////////// Variables ///////////////////////
    validateEmptyField($branchId,'BRANCH');
    validateEmptyField($productCategoryId,'PRODUCT CATEGORY');
    validateEmptyField($productId,'PRODUCT');
    validateEmptyField($quantity,'QUANTITY');

    if (!filter_var($quantity, FILTER_VALIDATE_INT, ["options"=>["min_range"=>1]])) {
        throw new Exception("Quantity must be a positive integer.");
    }
        /////////////////////// Validate Category ///////////////////////
    $checkCategoryQuery = "SELECT productId FROM PRODUCTS_TAB WHERE productId=? AND productLevel=1 AND statusId=1";
    $categoryData = selectQuery($conn, $checkCategoryQuery, 's', [$productCategoryId]);
    if (count($categoryData) === 0) {
        throw new NotFoundException("Product category not found.");
    }
    /////////////////////// Validate Product ///////////////////////
    $checkProductQuery = "SELECT productId FROM PRODUCTS_TAB WHERE productId=? AND productLevel=2 AND statusId=1";
    $productData = selectQuery($conn, $checkProductQuery, 's', [$productId]);
    if (count($productData) === 0) {
        throw new NotFoundException("Product not found.");
    }
    

    $insertQuery = "
    INSERT INTO ADD_TO_CART_TEMP
    (userDeviceId, branchId, productCategoryId, productId, quantity, createdTime)
    VALUES (?, ?, ?, ?, ?, NOW())

    ON DUPLICATE KEY UPDATE
    quantity = VALUES(quantity)
    ";

    $insertParams = [$userDeviceId,$branchId,$productCategoryId,$productId,$quantity];

    insertQuery($conn,$insertQuery,'ssssi',$insertParams);

    $response = [
        'response'=>200,
        'success'=>true,
        'message'=>"Cart updated successfully!"
    ];

} catch(Throwable $e){
    ErrorHandler::handle($e);
}
http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>