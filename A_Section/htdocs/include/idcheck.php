<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
	
	if($idchk > 0){
		alert("이미 존재하는 아이디입니다.");
	}