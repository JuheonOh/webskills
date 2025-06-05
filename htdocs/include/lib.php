<?php

	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=20160407", "root", "");
	
	date_default_timezone_set("Asia/Seoul");
	
	session_start();
	
	header("content-type:text/html; charset=utf-8");
	
	if(!isset($_GET['page'])){
		$current = "main";
		$var_array = explode("/", $_SERVER['REQUEST_URI']);
	} else {
		$current = "sub";
		$var_array = explode("/", $_GET['page']);
	}
	
	$menu_arr = array("midx", "sidx", "action", "idx", "parent");
	foreach($menu_arr as $key=>$val){
		$$val = isset($var_array[$key]) ? $var_array[$key] : NULL;
	}
	
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}
	
	function move($url){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}')" : "history.back();";
		echo "</script>";
		exit();
	}
	
	function access($bool, $msg="로그인 후 이용할 수 있습니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
	$_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email'] : NULL;
	$_SESSION['gender'] = isset($_SESSION['gender']) ? $_SESSION['gender'] : NULL;
	$_SESSION['year'] = isset($_SESSION['year']) ? $_SESSION['year'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;