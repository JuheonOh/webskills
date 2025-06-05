<?php
	
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$_POST['pw'] = md5($_POST['pw']);
	
	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch(2);
	
	if($idchk == NULL){
		die("아이디와 비밀번호를 확인해주세요.");
	} else {
		$_SESSION['userid'] = $idchk['userid'];
		$_SESSION['username'] = $idchk['username'];
		$_SESSION['email'] = $idchk['email'];
		$_SESSION['gender'] = $idchk['gender'];
		$_SESSION['year'] = $idchk['year'];
		$_SESSION['lv'] = $idchk['lv'];
	}