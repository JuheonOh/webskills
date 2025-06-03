<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if($_SESSION['captcha_code'] != $_POST['code']){
	echo "자동가입방지를 정확히 입력해주세요.";
}
if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'join' :
			$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
			if($idchk > 0){
				echo "존재하는 아이디입니다.";
				return false;
			}
		break;
		default : 
			die("Table Error");
		break;
	}
	$cancel = "action/";
	$column = column($_POST, $cancel);
	q("insert", "member", $column);
}