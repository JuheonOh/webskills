<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$_POST['memo'] = $pdo->quote($_POST['memo']);
	$_POST['memo'] = substr($_POST['memo'], 1);
	$_POST['memo'] = substr($_POST['memo'], 0, -1);
	
	$_POST['title'] = $pdo->quote($_POST['title']);
	$_POST['title'] = substr($_POST['title'], 1);
	$_POST['title'] = substr($_POST['title'], 0, -1);

	$date = date('Y-m-d H:i:s');
	
	$pdo->query("insert into notice set title='{$_POST['title']}', memo='{$_POST['memo']}', username='{$_SESSION['username']}', date=now(), count=0");