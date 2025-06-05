<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$pdo->query("delete from rsv where idx='{$_POST['idx']}'");