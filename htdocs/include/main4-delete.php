<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$pdo->query("delete from reserve_list where idx='{$_POST['idx']}'")->fetch();