<?php
		
	// Database Connection
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=20150712", "root", "");
	
	// timezone setting
	date_default_timezone_set("Asia/Seoul");
	
	// Language
	header("content-type:text/html; charset=utf-8");
	
	// session start
	session_start();
	
	
	// Address Save
	if(!isset($_GET['page'])){
		$current = "main";
		$var_array = explode("/", $_SERVER['REQUEST_URI']);
		$menu_arr = array("midx", "sidx", "action", "idx", "parent", "child");
		foreach($menu_arr as $key=>$val){
			$$val = isset($var_array[$key]) ? $var_array[$key] : NULL;
		}
	} else {
		$current = "sub";
		$var_array = explode("/", $_GET['page']);
		$menu_arr = array("midx", "sidx", "action", "idx", "parent", "child");
		foreach($menu_arr as $key=>$val){
			$$val = isset($var_array[$key]) ? $var_array[$key] : NULL;
		}
	}
	
	// message output
	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}
	
	// page move
	function move($url){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}');" : "history.back();";
		echo "</script>";
		exit();
	}
	
	// page access
	function access($bool, $msg="로그인 후 이용할 수 있습니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	// Column
	function column($arr, $cancel){
		$cancel = explode("/", $cancel);
		
		foreach($arr as $key=>$val){
			if(!in_array($key, $cancel)) $column[] = "{$key}='{$val}'";
		}
		
		$column = implode(",", $column);
		return $column;
	}	
	// Query
	function q($type, $table, $column){
		global $pdo;
		
		switch($type){
			case 'insert' :
				$pdo->query("insert into {$table} set {$column}");
			break;
			case 'update' :
				$pdo->query("update {$table} set {$column}");
			break;
			case 'delete' :
				$pdo->query("delete from {$table} {$column}");
			break;
			case 'select' :
				return $pdo->query("select * from {$table}");
			break;
			default :
				return;
			break;
		}
	}
	
	// var save
	$url = isset($url) ? $url : false;
	$cancel = isset($cancel) ? $cancel : "";
	$add_sql = isset($add_sql) ? $add_sql : "";
	
	// SESSION save
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;