<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$number = $pdo->query("select * from ep where number")->fetch();