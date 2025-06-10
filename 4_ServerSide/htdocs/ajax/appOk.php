<?php 
	include_once("../include/lib.php");

	$stdate = $_POST['stdate'];
	$endate = $_POST['endate'];
	$number = $_POST['number'];
	$price = str_replace(",", "", $_POST['price']);

	if($stdate && $endate && $number && $price){
		$member = $pdo->query("select * from member where midx='{$_SESSION['midx']}'")->fetch(2);

		if($member['point'] < $price){
			die("포인트가 부족합니다.");
		}

		
		$numberArr = explode(",", $number);
		foreach($numberArr as $number){
			$room = $pdo->query("select * from room where number='{$number}'")->fetch(2);
			$pdo->query("insert into application set ridx='{$room['ridx']}', midx='{$_SESSION['midx']}', stdate='{$stdate}', endate='{$endate}'");
		}

		$pdo->query("update member set point=point-{$price} where midx='{$_SESSION['midx']}'");

	} else {
		die("예약을 다시 진행해주세요.");
	}