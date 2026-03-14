<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////// Variables //////////////////

    $publishId = trim($_GET['publishId'] ?? null);
    validateEmptyField($publishId, 'PAGE IDENTIFIER');

    ////////////////// Check Page View //////////////////

    $pageViewQuery = "
        SELECT publishId 
        FROM PAGES_VIEWS_TAB 
        WHERE userDeviceId = ? AND publishId = ?
    ";

    $pageViewData = selectQuery($conn, $pageViewQuery, 'ss', [$userDeviceId, $publishId]);

    if (count($pageViewData) === 0) {

        $insertViewQuery = "
            INSERT INTO PAGES_VIEWS_TAB
            (publishId, userDeviceId)
            VALUES (?, ?)
        ";

        insertQuery($conn, $insertViewQuery, 'ss', [$publishId, $userDeviceId]);

        updatePageViewsCount($conn, $publishId);
    }

    ////////////////// Fetch Page //////////////////

    $pageQuery = "SELECT * FROM PAGES_TAB WHERE publishId = ?";
    $pageData = selectQuery($conn, $pageQuery, 's', [$publishId]);

    if (count($pageData) === 0) {
        throw new NotFoundException("Page not found.");
    }

    $page = $pageData[0];

    $pageCategory = $page['pageCategory'];
    $createdBy = $page['createdBy'];
    $updatedBy = $page['updatedBy'];

    ////////////////// Created By //////////////////
    $page['createdBy'] = _action_performed_by($conn, $createdBy) ?? null;

    ////////////////// Updated By //////////////////
    $page['updatedBy'] = _action_performed_by($conn, $updatedBy) ?? null;

    ////////////////// Product FAQ //////////////////

    if ($pageCategory === "product" || $pageCategory === "combo-product") {

        $faqQuery = "
            SELECT questionId, question, answer
            FROM PRODUCT_FAQ
            WHERE productId = ?
        ";

        $faqData = selectQuery($conn, $faqQuery, 's', [$publishId]);
        $page['productFaq'] = $faqData;
    }

    ////////////////// Product Category //////////////////

    if ($pageCategory === "product") {

        $productCategoryQuery = "
            SELECT parentId AS productCategoryId
            FROM PRODUCTS_TAB
            WHERE productId = ?
        ";

        $productCategoryData = selectQuery($conn, $productCategoryQuery, 's', [$publishId]);
        $page['productCategoryId'] = $productCategoryData[0]['productCategoryId'] ?? null;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "PAGE FETCHED SUCCESSFULLY!",
        'data' => $page
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>