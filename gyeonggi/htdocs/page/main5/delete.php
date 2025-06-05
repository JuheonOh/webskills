<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$idx = $_POST['idx'];
q("delete", "rsv", "where idx='{$idx}'");
q("delete", "food", "where ridx='{$idx}'");