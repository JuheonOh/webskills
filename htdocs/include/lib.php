<?php

	// 데이터베이스 접근
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=20160126;", "root", "");
	
	// MIME 타입 설정
	header("content-type:text/html; charset=utf-8;");
	
	// 세션 사용 시작
	session_start();
	
	// 서버 시간 설정
	date_default_timezone_set("Asia/Seoul");
	
	
	// 주소 저장
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
	
	// 메시지 박스
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}
	
	// 페이지 이동
	function move($url){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}')" : "history.back();";
		echo "</script>";
		exit();
	}
	
	// 페이지 접근 권한
	function access($bool, $msg="로그인 후 이용할 수 있습니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	// 데이터 가공
	function column($arr, $cancel){
		$cancel = explode("/", $cancel);
		$column = "";
		foreach($arr as $key=>$val){
			if(!in_array($key, $cancel)) $column .= ", {$key}='{$val}'";
		}
		
		return substr($column, 2);
	}
	
	// 쿼리 축소
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
		}
	}
	
	// highright
	function hit($str, $key){
		return str_replace($key, "<span class=\"search-text\">{$key}</span>", $str);
	}
	
	$cancel = $add_sql = "";
	
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
	$_SESSION['cellular'] = isset($_SESSION['cellular']) ? $_SESSION['cellular'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;