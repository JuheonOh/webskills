<?php
	
	// PHP DATA OBJECT
	$pdo = new PDO("mysql:host=mysql;charset=utf8;dbname=web101", "root", "");

	// SESSION Start
	session_start();

	// Default Date Set
	date_default_timezone_set("Asia/Seoul");

	// Language
	header("content-type:text/html;charset=utf-8");

	// 메시지 상자
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	// URL 이동
	function move($url){
		echo "<script>document.location.replace('{$url}')</script>";
	}

	// 세션 초기화
	$_SESSION['idx'] = isset($_SESSION['idx']) ? $_SESSION['idx'] : NULL;
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;