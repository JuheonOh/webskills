<?php 
	include_once("../include/lib.php");

	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch(2);

	if($idchk){
		if(isset($_POST['autologin'])){
			setcookie("login", encryption($idchk['midx']), time()+time()*60*60*24*7, "/");
		}

		$_SESSION['midx'] = $idchk['midx'];
		$_SESSION['userid'] = $idchk['userid'];
		$_SESSION['pw'] = $idchk['pw'];
		$_SESSION['username'] = $idchk['username'];
		$_SESSION['lv'] = $idchk['lv'];
	} else {
		die("아이디와 비밀번호를 다시 확인해주세요.");
	}