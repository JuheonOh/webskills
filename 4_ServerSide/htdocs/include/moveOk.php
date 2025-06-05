<?php 
	include_once("lib.php");
	$pdo->query("update car set location='{$_POST['location']}', currentLocation='{$_POST['location']}' where idx='{$_POST['cidx']}'");