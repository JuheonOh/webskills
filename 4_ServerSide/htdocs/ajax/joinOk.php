<?php 
	include_once("../include/lib.php");

	if(!filter_var($_POST['userid'], FILTER_VALIDATE_EMAIL)){
		die("아이디를 이메일 형식으로 입력해주세요\nex)sample@worldskill.co.kr");
	}

	if($_POST['pw'] != $_POST['pw2']){
		die("비밀번호 입력값과 비밀번호 확인 입력값이 서로 같게 입력해주세요.");
	}


	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
	if($idchk){
		die("이미 가입한 아이디입니다.");
	} else {
		$pdo->query("insert into member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', username='{$_POST['username']}', point=5000000");
	}