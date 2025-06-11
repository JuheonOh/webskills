<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$date = $_POST['date'] !== "" ? $_POST['date'] : date('Y-m-d', strtotime(date('Y-m-d')) + 60 * 60 * 24 * 1);
$arr = $arr_arr1 = $arr_arr2 = $arr_arr3 = array();

// 달력
$a = $pdo->query("select date, sum(seat_number) as total from rsv group by date");
while($list = $a->fetch()){
	if($list['total'] >= 120){
		$arr_arr1[] = $list['date'];
	}
}
$arr[0] = $arr_arr1;

// 시간
if(isset($_POST['time'])){
	$time = $_POST['time'];
	$b1 = $pdo->query("select sum(seat_number) as total from rsv where date='{$date}' and time='{$time}' and hall='European Hall'")->fetch();
	$b2 = $pdo->query("select sum(seat_number) as total from rsv where date='{$date}' and time='{$time}' and hall='Japanese Hall'")->fetch();
	$b3 = $pdo->query("select sum(seat_number) as total from rsv where date='{$date}' and time='{$time}' and hall='Chinese Hall'")->fetch();
	$arr_arr2[] = 20 - $b1['total'];
	$arr_arr2[] = 20 - $b2['total'];
	$arr_arr2[] = 20 - $b3['total'];
}
$arr[1] = $arr_arr2;

// 좌석
if(isset($_POST['hall'])){
	$hall = $_POST['hall'];
	$c = $pdo->query("select * from rsv where date='{$date}' and time='{$time}' and hall='{$hall}'");
	while($list = $c->fetch()){
		$arr_arr3 = array_merge($arr_arr3, json_decode($list['seat']));
	}
}
$arr[2] = $arr_arr3;

echo json_encode($arr);