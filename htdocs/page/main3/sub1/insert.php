<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$carname = $_POST['carname'];
$color = $_POST['color'];
$fuel = $_POST['fuel'];
$userid = $_POST['userid'];
$st_date = $_POST['st_date'];
$en_date = $_POST['en_date'];
$car = $pdo->query("select * from car where carname='{$carname}' and color='{$color}' and fuel='{$fuel}'")->fetch();
$column = column($_POST, "");
q("insert", "main3sub1", "{$column}, carnumber='{$car['carnumber']}', date=now()");