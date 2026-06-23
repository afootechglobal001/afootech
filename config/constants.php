<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
	$websiteAutoUrl =(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$appName='AfooTECH Global';
	
	//$websiteUrl='https://afootech.com';
	$websiteUrl='http://localhost/afootech/afootech';

	//$websitePath = $_SERVER['DOCUMENT_ROOT'];
	$websitePath = $_SERVER['DOCUMENT_ROOT'].'/afootech/afootech'; //dirname(__FILE__);
	$codeVersion= date('Ymdhis'); /// System Code Version
?>
<?php
$userOsBrowser = $_SERVER['HTTP_USER_AGENT'];

/////////////////////////////////////////////////////////////////////////////////
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$userIpAddress =getUserIP();

/////////////////////////////////////////////////////////////////////////////////
function getBrowserId() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';  // Browser and OS info
    $acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';  // Language
    // Combine all data and create a hash
    $browserId = hash('sha256', $userAgent . $acceptLanguage);
    return $browserId;
}
$userDeviceId=getBrowserId();
?>

<script>
var websiteUrl = "<?php echo $websiteUrl;?>";
var apiKey = '0cda191ec51136e7e3d60195ec753d30'; /// For API Key //
var endPoint = 'https://afootechglobal.com/api/training/dev'; /// Server End Point url
var userOsBrowser = "<?php echo $userOsBrowser;?>"; /// For User OS Browser //
var userIpAddress = "<?php echo $userIpAddress;?>"; /// For User IP Address //
var userDeviceId = "<?php echo $userDeviceId;?>"; /// For User Device Id //

/// Site Middleware Urls ///
var siteMiddlewareUrl = websiteUrl + '/config/code'; //// For Site Middleware url

/// Training Middleware Urls ///
var trainingMiddlewareUrl = websiteUrl + '/training/config/code'; //// For Training Middleware url

/// Training Middleware Urls ///
var registerUrl = websiteUrl + '/training/register'; //// For Institution Url

///// Passport Path //////
var passportPath=websiteUrl+'/uploaded_files/passport'; /// For Passport Path ///
</script>