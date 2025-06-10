<?php 
	include_once("../include/lib.php");

	$pdo->query("insert into faq set midx='{$_SESSION['midx']}', memo='{$_POST['memo']}', wdate=now()");