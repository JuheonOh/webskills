<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$cancel = "action/";
$column = column($_POST, $cancel);
q("delete", "ep_list", $column);