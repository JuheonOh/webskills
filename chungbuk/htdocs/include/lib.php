<?php

	// Database Connector
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=20150826", "root", "");
	
	// Timezone Setting
	date_default_timezone_set("Asia/Seoul");
	
	// Language
	header("content-type:text/html; charset=utf-8");
	
	// Session Start
	session_start();
	
	// Save Address
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
	
	// Message Box
	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}
	
	// Page Move
	function move($url){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}')" : "history.back();";
		echo "</script>";
		exit();
	}
	
	// Page Accesss
	function access($bool, $msg="로그인 후 이용할 수 있는 서비스입니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	// Column
	function column($arr, $cancel){
		$cancel = explode("/", $cancel);
		
		foreach($arr as $key=>$val){
			if(!in_array($key, $cancel)){
				$column[] = "{$key}='{$val}'";
			}
		}
		
		$column = implode(",", $column);
		return $column;
	}
	
	// Query
	function q($type, $table, $column){
		global $pdo;
		
		switch($type){
			case "insert" :
				$query[] = "insert into {$table} set ";
			break;
			case "update" :
				$query[] = "update {$table} set ";
			break;
			case "delete" :
				$query[] = "delete from {$table} ";
			break;
			default :
				return;
			break;
		}
		
		$query[] = $column;
		$query = implode("", $query);
		$pdo->query($query);
	}
	
	// variable save
	$cancel = $add_sql = "";
	
	// SESSION save
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
	$_SESSION['city'] = isset($_SESSION['city']) ? $_SESSION['city'] : NULL;
	$_SESSION['district'] = isset($_SESSION['district']) ? $_SESSION['district'] : NULL;
	$_SESSION['cellular'] = isset($_SESSION['cellular']) ? $_SESSION['cellular'] : NULL;
	$_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;
	