<?php
/////// developed by Mike Afolabi on 19-02-2025//////////////////////
$appName="Get Food Stuffs";
$appDescription="As a Nigerian student, juggling school, assignments, and daily life can be overwhelming. That’s why Get Food Stuffs is here—to make your life easier by delivering fresh, affordable raw food straight to your hostel, dorm, or apartment.";

////////////////////////////////////////////////////////////////////////
$userOsBrowser = isset($_SERVER['HTTP_USEROSBROWSER']) ? $_SERVER['HTTP_USEROSBROWSER'] : null;
$userIpAddress = isset($_SERVER['HTTP_USERIPADDRESS']) ? $_SERVER['HTTP_USERIPADDRESS'] : null;
$userDeviceId = isset($_SERVER['HTTP_USERDEVICEID']) ? $_SERVER['HTTP_USERDEVICEID'] : null;
$frontEndApiKey = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : null;
////////////////////////////////////////////////////////////////////////

/// all constance
// $websiteUrl='http://localhost/projects/WebListStudio-GetFoodStuffs';
$websiteUrl='https://getfoodstuffs.com';
$backEndApiKey='b58b8bf717120383cd5e13d247beb6b9'; //getFoodStuffsApiKey@2025


// Read the raw JSON input
$json = file_get_contents('php://input');
// Decode the JSON into an associative array
$data = json_decode($json, true);

$checkBasicSecurity=true;
///// check for API security
if ($frontEndApiKey!=$backEndApiKey){/// start if 1
    $checkBasicSecurity=false;
}

///// check for userOsBrowser security
if (empty($userOsBrowser)){/// start if 1
    $checkBasicSecurity=false;
}

///// check for userIpAddress security
if (empty($userIpAddress)){/// start if 1
    $checkBasicSecurity=false;
}

///// check for userDeviceId security
if (empty($userDeviceId)){/// start if 1
    $checkBasicSecurity=false;
}