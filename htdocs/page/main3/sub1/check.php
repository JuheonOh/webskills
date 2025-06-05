<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$carname = $_POST['carname'];
$color = $_POST['color'];
$fuel = $_POST['fuel'];
$userid = $_POST['userid'];
$st_date = $_POST['st_date'];
$en_date = $_POST['en_date'];
$car = $pdo->query("select * from car where carname='{$carname}' and color='{$color}' and fuel='{$fuel}'")->fetch();
$car_check = $pdo->query("select * from main3sub1 where carnumber='{$car['carnumber']}' and (('{$st_date}' between st_date and en_date) or ('{$en_date}' between st_date and en_date) or (st_date between '{$st_date}' and '{$en_date}') or (en_date between '{$st_date}' and '{$en_date}'))")->rowCount();
if($car_check < 1){
	echo $car['carnumber'];
}