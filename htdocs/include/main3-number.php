<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$reserve = $pdo->query("select * from reserve where idx='{$_POST['idx']}'")->fetch();
$reserve_list = $pdo->query("select sum(number) as number from reserve_list where ridx='{$_POST['idx']}' and edate='{$_POST['date']}'")->fetch();
echo $reserve['number'] - $reserve_list['number'];