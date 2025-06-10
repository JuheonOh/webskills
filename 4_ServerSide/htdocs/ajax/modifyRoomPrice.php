<?php 
	include_once("../include/lib.php");

	foreach($_POST['number'] as $number){
		$pdo->query("update room set price='{$_POST['price']}' where number='{$number}'");
	}