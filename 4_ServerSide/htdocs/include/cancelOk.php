<?php 
	include_once("lib.php");

	$pdo->query("delete from rsv where idx='{$_POST['ridx']}'");