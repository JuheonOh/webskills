<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'login' :
			$member_info = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
			if($member_info == NULL){
				echo "아이디와 비밀번호를 확인해주세요.";
			}
			
			$_SESSION['userid'] = $member_info['userid'];
			$_SESSION['username'] = $member_info['username'];
			$_SESSION['lv'] = $member_info['lv'];
		break;
	}
	$cancel = "action/";
	$column = column($_POST, $cancel);
	q("select", "member", $column);
}