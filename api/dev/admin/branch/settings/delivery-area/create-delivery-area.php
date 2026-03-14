<?php 
require_once '../../../../config/connection.php';
require_once '../../../../config/staff-session-check.php';

try {
    if (!$checkBasicSecurity) {
        throw new ForbiddenException("Unauthorized access! Please log in and try again.");
    }
	if(!$checkSession){
		throw new UnauthorizedException("SESSION EXPIRED! Please LogIn Again.");
	}

    //////////////////declaration of variables///////////////////////////////////////////////////
    $branchId = $_GET['branchId'];
    $deliveryAreaName = strtoupper($data['deliveryAreaName']);
    $statusId = $data['statusId'];
    
    ///////////////Validate empty fields//////////////////////////////////////////////////////////
    validateEmptyField($branchId, 'BRANCH');
    validateEmptyField($deliveryAreaName, 'DELIVERY AREA NAME');
    validateEmptyField($statusId, 'STATUS');
    ////////////////validate others///////////////////////////////////////////////////////////////
    validateNumericField($statusId, 'STATUS');

    ///////////////////////geting sequence//////////////////////////
	$getSequence=_get_sequence_count($conn, 'DLA');
	$sequenceData = json_decode($getSequence, true);
	$no= $sequenceData['no'];
	$deliveryAreaId='DLA'.$no.date("Ymdhis");

    ///// insert into BRANCH_DELIVERY_AREA table////////////////////////////////////////////////////////////
    $insertQuery ="INSERT INTO `BRANCH_DELIVERY_AREA`
	(`deliveryAreaId`, `branchId`, `deliveryAreaName`, `statusId`, `createdBy`, `createdTime`) VALUES
	(?, ?, ?, ?, ?, NOW())";
	$insertParams=[$deliveryAreaId, $branchId, $deliveryAreaName, $statusId, $loginStaffId];
	$insertResult = insertQuery($conn, $insertQuery, 'sssis', $insertParams);

    ////get the details of the created delivery area to return in the response////////////////////////////////////////
    $getQuery = "SELECT * FROM DELIVERY_AREA_VIEW WHERE deliveryAreaId= ?";
    $getParams=[$deliveryAreaId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
	$deliveryAreaData = $getResult[0];
    
    $response=[
		'response' => 200,
		'success' => true,
		'message' => "DELIVERY AREA CREATED SUCCESSFULLY!",
        'data' => $deliveryAreaData
	];
 }catch (Throwable $e) {
    ErrorHandler::handle($e);
}
http_response_code($response['response']); // sets HTTP status
echo json_encode($response);
?>