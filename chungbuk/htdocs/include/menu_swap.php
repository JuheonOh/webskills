<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$midx = $_POST['midx'];
$sidx = $_POST['sidx'];
// 메인 메뉴
foreach($midx as $key=>$val){
	// $pdo->query("update menu set turn={$key} where idx={$val} and parent='0'");
	alert($midx);
	q("update", "menu", "turn={$key} where idx={$val} and parent='0'");	
	
	// 서브 메뉴
	$arr = explode(",", $sidx[$key]);
	foreach($arr as $key2=>$val2){
		// $pdo->query("update menu set turn='{$key}' where idx='{$val}'");
		q("update", "menu", "turn='{$key2}' where idx='{$val2}'");
	}
}