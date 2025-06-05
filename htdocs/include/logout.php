<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
session_destroy();
move("/");
?>