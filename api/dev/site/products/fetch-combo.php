<?php
require_once '../../config/connection.php';

try {

    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    ////////////////// Variables //////////////////

    $q = $_GET['q'] ?? '';
    $branchId = $_GET['branchId'] ?? null;
    $page = $_GET['page'] ?? 'combo';
    $comboId = $_GET['comboId'] ?? '';

    validateEmptyField($branchId, 'BRANCH');

    $limit = '';
    if ($page !== 'combo') {
        $limit = " LIMIT 24 ";
    }

    $comboClause = '';
    $params = [$branchId, "%{$q}%"];
    $types = 'ss';

    if (!empty($comboId)) {
        $comboClause = " AND a.comboId = ? ";
        $params[] = $comboId;
        $types .= 's';
    }

    ////////////////// Fetch Combos //////////////////

    $selectQuery = "
        SELECT 
            a.comboId,
            a.comboName,
            a.sellingPrice,
            b.pageUrl
        FROM BRANCH_COMBO_TAB a
        JOIN PAGES_TAB b ON a.comboId = b.publishId
        WHERE 
            a.branchId = ?
            AND a.comboTags LIKE ?
            $comboClause
            AND a.statusId = 1
            AND a.sellingPrice > 0
        ORDER BY a.sellingPrice ASC
        $limit
    ";

    $comboData = selectQuery($conn, $selectQuery, $types, $params);
    $allRecordCount = count($comboData);

    if ($allRecordCount === 0) {
        throw new NotFoundException("No Record found");
    }

    $combos = [];

    foreach ($comboData as $combo) {

        $productId = $combo['comboId'];

        ////////////////// Combo Pictures //////////////////

        $pixQuery = "SELECT productPix FROM PRODUCT_PIX_TAB WHERE productId = ?";
        $picturesData = selectQuery($conn, $pixQuery, 's', [$productId]);
        $combo['picturesData'] = $picturesData;

        ////////////////// Combo Items //////////////////

        if (!empty($comboId)) {

            $comboItemsQuery = "
                SELECT 
                    a.productId,
                    b.productName,
                    MIN(c.productPix) AS productPix
                FROM BRANCH_COMBO_PRODUCTS_TAB a
                JOIN PRODUCTS_TAB b ON a.productId = b.productId
                LEFT JOIN PRODUCT_PIX_TAB c ON a.productId = c.productId
                WHERE 
                    a.comboId = ?
                    AND a.branchId = ?
                GROUP BY a.productId, b.productName
            ";

            $comboItemsData = selectQuery($conn, $comboItemsQuery, 'ss', [$comboId, $branchId]);
            $combo['comboItemsData'] = $comboItemsData;
        }

        $combos[] = $combo;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success' => true,
        'allRecordCount' => $allRecordCount,
        'message' => $page !== 'combo'
            ? "TOP SALES COMBOS FETCHED SUCCESSFULLY!"
            : "COMBOS FETCHED SUCCESSFULLY!",
        'data' => $combos
    ];

} catch (Throwable $e) {
    ErrorHandler::handle($e);
}

http_response_code($response['response'] ?? 500);
echo json_encode($response);
?>