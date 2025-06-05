<?php

	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$_POST['info'] = $pdo->quote($_POST['info']);
	$_POST['info'] = substr($_POST['info'], 1);
	$_POST['info'] = substr($_POST['info'], 0, -1);
	
	
	$pdo->query("update educate set title='{$_POST['title']}', info='{$_POST['info']}', teacher='{$_POST['teacher']}', st_date='{$_POST['st_date']}', en_date='{$_POST['en_date']}' where idx='{$_POST['idx']}'");