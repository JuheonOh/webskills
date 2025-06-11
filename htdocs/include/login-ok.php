<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);

$member_info = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
if($member_info == 0){
	echo "아이디와 비밀번호를 확인해주세요.";
	return false;
} else {
	$_SESSION['userid'] = $member_info['userid'];
	$_SESSION['cellular'] = $member_info['cellular'];
	$_SESSION['email'] = $member_info['email'];
	$_SESSION['lv'] = $member_info['lv'];
}