<?php
require_once '../../config/connection.php';
require_once '../../config/staff-session-check.php';

try {

    if (!$checkBasicSecurity) {
        throw new UnauthorizedException("Unauthorized access.");
    }

    if (!$checkSession) {
        throw new UnauthorizedException("SESSION EXPIRED! Please LogIn Again.");
    }

    ////////////////// Variables //////////////////
    $branchId     = trim($_GET['branchId'] ?? '');

    $name         = trim(strtoupper($data['name'] ?? ''));
    $mobileNumber = trim($data['mobileNumber'] ?? '');
    $stateId      = trim($data['stateId'] ?? '');
    $lgaId        = trim($data['lgaId'] ?? '');
    $address      = trim(strtoupper($data['address'] ?? ''));
    $smtpHost     = trim($data['smtpHost'] ?? '');
    $smtpUsername = trim($data['smtpUsername'] ?? '');
    $smtpPassword = trim($data['smtpPassword'] ?? '');
    $smtpPort     = trim($data['smtpPort'] ?? '');
    $supportEmail = trim($data['supportEmail'] ?? '');
    $paymentKey   = trim($data['paymentKey'] ?? '');
    $staffId      = trim($data['managerId'] ?? '');
    $statusId     = trim($data['statusId'] ?? '');

    ////////////////// Validation //////////////////

    validateEmptyField($branchId, "BRANCH ID");
    validateEmptyField($name, "BRANCH NAME");
    validateEmptyField($mobileNumber, "MOBILE NUMBER");
    validateEmptyField($stateId, "BRANCH STATE");
    validateEmptyField($lgaId, "BRANCH LGA");
    validateEmptyField($address, "BRANCH ADDRESS");
    validateEmptyField($smtpHost, "SMTP HOST");
    validateEmptyField($smtpUsername, "SMTP USERNAME");
    validateEmptyField($smtpPassword, "SMTP PASSWORD");
    validateEmptyField($smtpPort, "SMTP PORT");
    validateEmptyField($supportEmail, "SUPPORT EMAIL");
    validateEmptyField($paymentKey, "PAYMENT CHANNEL");
    validateEmptyField($staffId, "BRANCH MANAGER");
    validateEmptyField($statusId, "BRANCH STATUS");

    ////////////////// Email Validation //////////////////

    if (!filter_var($smtpUsername, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException("INVALID SMTP USERNAME ADDRESS!");
    }

    if (!filter_var($supportEmail, FILTER_VALIDATE_EMAIL)) {
        throw new InvalidArgumentException("INVALID SUPPORT EMAIL ADDRESS!");
    }

    ////////////////// Check Branch Exists //////////////////

    $branch = selectQuery(
        $conn,
        "SELECT branchId FROM BRANCHES_TAB WHERE branchId=?",
        "s",
        [$branchId]
    );

    if (empty($branch)) {
        throw new NotFoundException("Branch not found.");
    }

    ////////////////// Check Duplicate Name //////////////////

    $duplicateName = selectQuery(
        $conn,
        "SELECT branchId FROM BRANCHES_TAB WHERE name=? AND branchId!=?",
        "ss",
        [$name, $branchId]
    );

    if (!empty($duplicateName)) {
        throw new ConflictException("BRANCH EXIST! Branch already exist by name.");
    }

    ////////////////// Check Duplicate SMTP //////////////////

    $duplicateSMTP = selectQuery(
        $conn,
        "SELECT branchId FROM BRANCHES_TAB WHERE smtpUsername=? AND branchId!=?",
        "ss",
        [$smtpUsername, $branchId]
    );

    if (!empty($duplicateSMTP)) {
        throw new ConflictException("BRANCH EXIST! Branch already exist by smtpUsername.");
    }

    ////////////////// Update Branch //////////////////

    updateQuery(
        $conn,
        "UPDATE BRANCHES_TAB SET
        name=?,
        mobileNumber=?,
        stateId=?,
        lgaId=?,
        address=?,
        smtpHost=?,
        smtpUsername=?,
        smtpPassword=?,
        smtpPort=?,
        supportEmail=?,
        paymentKey=?,
        managerId=?,
        statusId=?,
        updatedBy=?,
        updatedTime=NOW()
        WHERE branchId=?",
        "sssssssssssssss",
        [
            $name,
            $mobileNumber,
            $stateId,
            $lgaId,
            $address,
            $smtpHost,
            $smtpUsername,
            $smtpPassword,
            $smtpPort,
            $supportEmail,
            $paymentKey,
            $staffId,
            $statusId,
            $loginStaffId,
            $branchId
        ]
    );

    ////////////////// Fetch Updated Branch //////////////////

    $branches = selectQuery(
        $conn,
        "SELECT * FROM BRANCH_VIEW WHERE branchId=?",
        "s",
        [$branchId]
    );

    foreach ($branches as &$branch) {

        $createdBy = $branch['createdBy'];
        $updatedBy = $branch['updatedBy'];

        /// createdBy
        $createdByData = selectQuery(
            $conn,
            "SELECT CONCAT(firstName,' ',lastName) AS fullname,emailAddress FROM STAFF_TAB WHERE staffId=?",
            "s",
            [$createdBy]
        );

        $branch['createdBy'] = $createdByData[0] ?? null;

        /// updatedBy
        $updatedByData = selectQuery(
            $conn,
            "SELECT CONCAT(firstName,' ',lastName) AS fullname,emailAddress FROM STAFF_TAB WHERE staffId=?",
            "s",
            [$updatedBy]
        );

        $branch['updatedBy'] = $updatedByData[0] ?? null;
    }

    ////////////////// Response //////////////////

    $response = [
        'response' => 200,
        'success'  => true,
        'message'  => "BRANCH UPDATED SUCCESSFULLY!",
        'data'     => $branches
    ];

} catch (Throwable $e) {

    ErrorHandler::handle($e);

}

http_response_code($response['response'] ?? 500);
echo json_encode($response);