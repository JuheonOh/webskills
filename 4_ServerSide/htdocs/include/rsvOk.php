<?php 
	include_once("lib.php");

	$rsv = $pdo->query("select * from rsv where midx='{$_SESSION['idx']}'");
	while($rs = $rsv->fetch(2)){
		if($rs['time_start'] > $_POST['time_start'] && $rs['time_end'] < $_POST['time_end']){
			die("대여가 종료되지 않은 예약이 존재합니다.");
		}
	}
	$invalid = $pdo->query("select * from rsv where cidx='{$_POST['cidx']}' and (time_start > '{$_POST['time_start']}') and (time_end < '{$_POST['time_end']}')")->fetch(2);

	if($invalid){
		die("이미 예약된 차량입니다.");
	}

	$pdo->query("insert into rsv set cidx='{$_POST['cidx']}', time_start='{$_POST['time_start']}', time_end='{$_POST['time_end']}', location_start='{$_POST['location_start']}', location_end='{$_POST['location_end']}', midx='{$_SESSION['idx']}'");