<?php include '../../../../config/constants.php';?>
<script src="<?php echo $websiteUrl?>/admin/portal/js/session_validation.js"></script>

<?php
$action=$_POST['action'];

switch ($action){

	case 'get_page':
		$page=$_POST['page'];
		$ids=$_POST['ids'];
		$pageCategory=$_POST['pageCategory'];
		require_once('dashboard-content.php');
		require_once('staff-content.php');
		require_once('student-content.php');
		require_once('settings-content.php');
		require_once('role-content.php');
	break;

	case 'get_form':
		$page=$_POST['page'];
		$id=$_POST['id'];
		$pageCategory=$_POST['pageCategory'];
		$modalLayer=$_POST['modalLayer'];
		require_once('dashboard-content.php');
		require_once('staff-content.php');
		require_once('student-content.php');
		require_once('settings-content.php');
		require_once('role-content.php');
	break;
}
?>