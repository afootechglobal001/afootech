<?php
function _staff_accesskey_validation($conn, $accessKey) {
    $getQuery = "SELECT * FROM STAFF_VIEW WHERE accessKey=? AND statusId=?";
    $getParams=[$accessKey, 1];
    $getResult = selectQuery($conn, $getQuery, 'si', $getParams);
    $count = count($getResult);
    if ($count > 0) {
        $userData = $getResult[0];
		$firstName=$userData['firstName'];
		$lastName=$userData['lastName'];
        $response = [
            "checkSession" => true,
            "loginStaffId" => $userData['staffId'],
            "loginFullname" => "$firstName $lastName",
            "loginRoleid" => $userData['roleId']
        ];
    }else{
        $response = [
            "checkSession" => false
        ];
    }
    return json_encode($response);
}

///////////////////////////////////////////////////////////////////////////////////////////////////
function _get_sequence_count($conn, $counterId){
    $getQuery = "SELECT counterValue FROM SETUP_COUNTER_TAB WHERE counterId = ? FOR UPDATE";
    $getParams=[$counterId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
    $count = $getResult[0]['counterValue'];
    $num = $count + 1;
    ///// update the counter value in the database
    $updateQuery = "UPDATE `SETUP_COUNTER_TAB` SET `counterValue` = ? WHERE counterId = ?";
    $updateParams=[$num, $counterId];
    updateQuery($conn, $updateQuery, 'is', $updateParams);
    if ($num < 10) {
        $no = '00' . $num;
    } elseif ($num >= 10 && $num < 100) {
        $no = '0' . $num;
    } else {
        $no = $num;
    }
    $response = ["no" => $no];
    return json_encode($response);
}
////// get genderdata from SETUP_GENDER_TAB
function _get_gender_details($conn, $genderId){
    $getQuery = "SELECT * FROM SETUP_GENDER_TAB WHERE genderId = ?";
    $getParams=[$genderId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
    return json_encode($getResult[0]);
}

///////////////////////////////////////////////////////////////////////////////////////////////////
function updatePageViewsCount($conn, $publishId) {
    $updateQuery = "UPDATE PAGES_TAB SET viewCount = viewCount + 1 WHERE publishId = ?";
    $updateParams = [$publishId];
    updateQuery($conn, $updateQuery, 's', $updateParams);
}

function _get_branch_smtp_details($conn, $branchId) {
    $getQuery = "SELECT smtpHost, smtpUsername, smtpPassword, smtpPort, name AS senderName, supportEmail FROM BRANCHES_TAB WHERE branchId = ?";
    $getParams=[$branchId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
    return json_encode($getResult[0]);
}

function _get_information_category_details($conn, $categoryId){
    $getQuery = "SELECT * FROM INFORMATION_CATEGORY_TAB WHERE categoryId = ?";
    $getParams=[$categoryId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
    return ($getResult[0]);
}


function _action_performed_by($conn, $staffId){
    $getQuery = "SELECT CONCAT(firstName,' ',lastName) AS fullname, emailAddress FROM STAFF_TAB WHERE staffId = ?";
    $getParams=[$staffId];
    $getResult = selectQuery($conn, $getQuery, 's', $getParams);
    return ($getResult[0]);
}