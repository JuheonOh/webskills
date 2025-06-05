<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$idx = $_POST['idx'];
q("delete", "review", "where idx='{$idx}'");
