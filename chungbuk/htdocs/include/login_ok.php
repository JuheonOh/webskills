<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
$member = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
if($member != NULL){
	$_SESSION['userid'] = $member['userid'];
	$_SESSION['username'] = $member['username'];
	$_SESSION['city'] = $member['city'];
	$_SESSION['district'] = $member['district'];
	$_SESSION['cellular'] = $member['cellular'];
	$_SESSION['email'] = $member['email'];
	$_SESSION['lv'] = $member['lv'];
} else {
	echo "아이디와 비밀번호를 확인해주세요.";
	exit();
}