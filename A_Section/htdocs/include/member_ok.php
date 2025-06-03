<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'login' :
			$member_info = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
			access($member_info != NULL, "아이디와 비밀번호를 확인해주세요.");
			
			$_SESSION['userid'] = $member_info['userid'];
			$_SESSION['cellular'] = $member_info['cellular'];
			$_SESSION['email'] = $member_info['email'];
			$_SESSION['lv'] = $member_info['lv'];
			
			move("/");
		break;
	}
	$cancel = "action/table";
	$column = column($_POST, $cancel);
	q("select", "member", $cancel.$add_sql);
}