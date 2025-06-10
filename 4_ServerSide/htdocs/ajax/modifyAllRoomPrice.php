<?php 
	include_once("../include/lib.php");

	$pdo->query("update room set price='{$_POST['price']}'");