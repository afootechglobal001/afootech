<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    /////////////////////// Fetch Total Items in Cart ///////////////////////

    $countQuery = "SELECT SUM(quantity) AS totalItems FROM ADD_TO_CART_TEMP WHERE userDeviceId = ?";
    $countResult = selectQuery($conn, $countQuery, 's', [$userDeviceId]);
    $totalItems = $countResult[0]['totalItems'] ?? 0;

    /////////////////////// Response ///////////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'totalItemsInCart' => $totalItems,
        'message' => "Total items in cart fetched successfully!"
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>