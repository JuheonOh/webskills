<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$midx = $_POST['midx'];
q("delete", "main3sub1", " where midx='{$midx}'");