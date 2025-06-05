<?php

	// Database Connection
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=20150617;", "root", "");
	
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
		$menu_arr = array("midx", "sidx", "action", "idx", "parent");
		foreach($menu_arr as $key=>$val){
			$$val = isset($var_array["$key"]) ? $var_array["$key"] : NULL;
		}
	} else {
		$current = "sub";
		$var_array = explode("/", $_GET['page']);
		$menu_arr = array("midx", "sidx", "action", "idx", "parent");
		foreach($menu_arr as $key=>$val){
			$$val = isset($var_array["$key"]) ? $var_array["$key"] : NULL;
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
	function access($bool, $msg="로그인 후 이용가능합니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	// Column
	function column($arr, $cancel){
		$cancel = explode("/", $cancel);
		$column = "";
		foreach($arr as $key=>$val){
			if(!in_array($key, $cancel)) $column .= ", {$key}='{$val}'";
		}	
		return substr($column, 2);
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
	
	// Highlight
	function hit($str, $replace){
		$str = str_replace($replace, "<span class=\"search_txt\">{$replace}</span>", $str);
		return $str;
	}
	
	// File Upload
	function file_upload($file, $dir, $type="img"){
		if(is_uploaded_file($file['tmp_name'])){
			access(is_uploaded_file($file['tmp_name']), "파일이 정상적으로 업로드되지 않았습니다.");
			$ex_name_file = explode(".", strtolower($file['name']));
			$ex_name = array_pop($ex_name_file);
			
			if($type == "img"){
				$ex_name_chk = array("png", "jpg", "gif");
				access(in_array($ex_name, $ex_name_chk), "png, jpg, gif 확장자만 업로드가 가능합니다.");
			}
			
			$date = date("Ymd");
			$rand = rand();
			$upload_name = "{$date}_{$rand}.{$ex_name}";
			
			move_uploaded_file($file['tmp_name'], "{$_SERVER['DOCUMENT_ROOT']}/data/{$dir}/{$upload_name}");
			return $upload_name;
		}
	}
	
	// var save
	$url = isset($url) ? $url : false;
	$cancel = isset($cancel) ? $cancel : "";
	$add_sql = isset($add_sql) ? $add_sql : "";
	
	// session save
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email'] : NULL;
	$_SESSION['cellular'] = isset($_SESSION['cellular']) ? $_SESSION['cellular'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;