<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$pdo->query("update rsv set type='x' where idx='{$_POST['idx']}'");