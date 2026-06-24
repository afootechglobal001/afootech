<?php include '../../config/constants.php';?>
<?php
$action=$_POST['action'];
switch ($action){

	case 'get_form':
		$page=$_POST['page'];
		$id=$_POST['id'];
		$modalLayer=$_POST['modalLayer'];
		require_once('content-page.php');
	break;	

	case 'get_page':
		$page=$_POST['page'];
		$ids = $_POST['ids'];
		require_once('content-page.php');
	break;	

	case 'uploadStudentPassport':
		$newPassport = $_POST['newPassport'] ?? '';
		$passport = $_POST['passport'] ?? '';
	
		///// Validate Student Passport /////
		if (!empty($passport)) {
    		$passport = preg_replace('#^data:image/\w+;base64,#i', '', $passport);
			$passport = str_replace(' ', '+', $passport);
			$passport = base64_decode($passport);
		}
		
		//// Upload Student Passport ////
		$uploadStudentPassportDir = "../../uploaded_files/studentPassport/";

		//// Create Directory If Not Exists ////
		if(!empty($newPassport)){
			file_put_contents($uploadStudentPassportDir . $newPassport, $passport);
		}
    break;
}?>