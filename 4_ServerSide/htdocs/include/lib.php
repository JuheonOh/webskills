<?php 
	
	// PHP DATA OBJECT
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=web101", "root", "");

	// HEADER
	header("content-type:text/html; charset=utf-8");

	// SESSION START
	session_start();

	// DEFAULT DATE SET
	date_default_timezone_set("Asia/Seoul");


	// ALERT
	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	// MOVE PAGE
	function move($url){
		echo "<script>";
			echo $url ? "document.location.replace('{$url}')" : "document.location.replace('index.php')";
		echo "</script>";
	}

	function access($bool, $msg="로그인 후 이용할 수 있습니다.", $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}

	function addJSON(){
		global $pdo;

		$json = json_decode(file_get_contents("json/evCarList.json"));
		$location = [ "강북구", "서대문구", "성동구", "양천구", "관악구", "강남구" ];

		$pdo->query("truncate car");

		foreach($json->CarList as $key=>$val){
			$num = floor($key / 5);
			$pdo->query("insert into car set number='{$val->CarNumber}', image='{$val->Carimage}', currentLocation='{$location[$num]}', location='{$location[$num]}'");
		}
	}

	// SESSION VARIABLE
	$_SESSION['idx'] = isset($_SESSION['idx']) ? $_SESSION['idx'] : NULL;
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;