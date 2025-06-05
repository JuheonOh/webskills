<?php

	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$list = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
	
	if($list['st_date'] > date("Y-m-d")) die("개강된 강좌가 아닙니다.");
	if($list['en_date'] < date("Y-m-d")) die("종강된 강좌입니다.");
	
	
	$pdo->query("insert into educate_list set code='{$list['code']}', title='{$list['title']}', st_date='{$list['st_date']}', en_date='{$list['en_date']}', userid='{$_SESSION['userid']}', username='{$_SESSION['username']}', edate=now()");