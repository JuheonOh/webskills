<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$seat_number = count($_POST['seat']);
$seat = json_encode($_POST['seat']);
$cancel .= "seat";
$column = column($_POST, $cancel);
$add_sql = ", seat='{$seat}', seat_number='{$seat_number}', d=now()";
q("insert", "rsv", $column.$add_sql);