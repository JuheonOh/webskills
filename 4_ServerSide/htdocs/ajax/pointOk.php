<?php 
	include_once("../include/lib.php");

	if(!filter_var($_POST['userid'], FILTER_VALIDATE_EMAIL)){
		die("아이디를 이메일 형식으로 입력해주세요\nex)sample@worldskill.co.kr");
	}

	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->fetch(2);
	if($idchk){
		$pdo->query("update member set point=point+{$_POST['point']} where midx='{$idchk['midx']}'");
	} else {
		die("존재하지 않는 아이디입니다.");
	}