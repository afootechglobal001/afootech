<?php
require_once '../../config/connection.php';
try {
    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }

    // ////// get all input parameters
    $staffId = trim($data['staffId']);
	$otp = trim($data['otp']);
	$password = $data['password'];
	$confirmPassword = $data['confirmPassword'];

    //// validate input parameters
	validateEmptyField($staffId, "STAFF ID");
	validateEmptyField($otp, "OTP");
	validateEmptyField($password, "PASSWORD");
	validateEmptyField($confirmPassword, "CONFIRM PASSWORD");
	if ($password !== $confirmPassword) {
		throw new BadRequestException("PASSWORD NOT MATCH! Check the Passwords and try again.");
	}
	validateNumericField($otp, "OTP");
	/* Use prepared statement for SELECT */
    $selectQuery="SELECT staffId FROM STAFF_TAB WHERE staffId = ? AND otp = ?";
    $selectParams=[$staffId, $otp];
    $userData = selectQuery($conn, $selectQuery, 'si', $selectParams);

	if (empty($userData)) {
		throw new ForbiddenException("INVALID OTP! Check the OTP and try again.");
	}
	/* Secure password hashing */
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	/* Update with prepared statement */
	$updateQuery="UPDATE STAFF_TAB SET password = ?, otp = NULL, updatedTime = NOW() WHERE staffId = ?";
	$updateParams=[$hashedPassword, $staffId];
	updateQuery($conn, $updateQuery, 'ss', $updateParams);
	
	$response = [
		'response' => 200,
		'success' => true,
		'message' => "PASSWORD RESET SUCCESSFUL! You can now login with your new password.",
	];
    
 }catch (Throwable $e) {
    ErrorHandler::handle($e);
}
http_response_code($response['response']); // sets HTTP status
echo json_encode($response);
?>