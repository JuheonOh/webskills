<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$room = $_POST['room'];
$redate = $_POST['redate'];
$time = explode("~", $_POST['time']);
$st_time = date("H:i:s", strtotime($time[0]));
$en_time = date("H:i:s", strtotime($time[1]));


$count = $pdo->query("select * from rsv where room='{$room}' and redate='{$redate}'")->rowCount();
$count2 = $pdo->query("select * from rsv where room='{$room}' and redate='{$redate}' and st_time='{$st_time}' and en_time='{$en_time}'")->rowCount();
if($count >= 4){
	echo "다른 예약일을 선택해주세요.";
	exit();
} else if($count2 >= 1){
	echo "다른 시간대를 선택해주세요";
	exit();
}