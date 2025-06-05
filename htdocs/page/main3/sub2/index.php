<?php access(isset($_SESSION['userid']));
if($_SESSION['lv'] == "관리자"){
	$main3 = $pdo->query("select * from main3sub1");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/main3/sub2/admin.php");
} else {
	$main3 = $pdo->query("select * from main3sub1 where userid='{$_SESSION['userid']}'");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/main3/sub2/user.php");
}