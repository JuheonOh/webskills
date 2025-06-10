<?php 
	$pdo = new PDO("mysql:host=mysql; charset=utf8; dbname=web132", "root", "");

	session_start();

	date_default_timezone_set("Asia/Seoul");

	header("content-type:text/html; charset=utf-8");

	function alert($msg){
		echo "<script>alert('{$msg}')</script>";
	}

	function move($url){
		echo "<script>document.location.replace('{$url}')</script>";
	}

	function access($bool, $msg="접근이 제한된 페이지입니다.", $url="/"){
		if($bool){
			alert($msg);
			move($url);
		}
	}

	function addRoom(){
		global $pdo;

		$floorArr = [ 1, 2, 3, 4, 5 ];
		$numberArr = [ "01", "03", "05", "07", "09", "11", "13", "15", "17", "19", "02", "04", "06", "08", "10", "12", "14", "16", "18", "20" ];

		$pdo->query("truncate room");
		foreach($floorArr as $floor){
			foreach($numberArr as $number){
				$roomNumber = $floor.$number;
				$roomFloor = $floor;
				$roomPrice = $floor * 10000;
				$roomSide = "육지";

				if($roomNumber % 2 == 1){
					$roomPrice = $roomPrice + 5000;
					$roomSide = "바다";
				}

				$pdo->query("insert into room set number='{$roomNumber}', floor='{$roomFloor}', price='{$roomPrice}', side='{$roomSide}'");
			}
		}
	}

	function encryption($midx){
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
	    $plaintext = $midx;
	    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
	    $ciphertext = $iv . $ciphertext;
	    $ciphertext_base64 = base64_encode($ciphertext);

	    return $ciphertext_base64;
	}

	function decryption($hex){
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
		$ciphertext_base64 = $hex;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$ciphertext_dec = base64_decode($ciphertext_base64);
	    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
	    $ciphertext_dec = substr($ciphertext_dec, $iv_size);
	    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

	    return $plaintext_dec;
	}

	$_SESSION['midx'] = isset($_SESSION['midx']) ? $_SESSION['midx'] : NULL;
	$_SESSION['userid'] = isset($_SESSION['userid']) ? $_SESSION['userid'] : NULL;
	$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
	$_SESSION['lv'] = isset($_SESSION['lv']) ? $_SESSION['lv'] : NULL;

	$_COOKIE['login'] = isset($_COOKIE['login']) ? $_COOKIE['login'] : NULL;
?>