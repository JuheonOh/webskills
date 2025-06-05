<?php
	include_once("lib.php");

	$member = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch(2);

	if($member){
		$_SESSION['idx'] = $member['idx'];
		$_SESSION['userid'] = $member['userid'];
		$_SESSION['lv'] = $member['lv'];
	} else {
		die("아이디와 비밀번호를 다시 확인해주세요.");
	}