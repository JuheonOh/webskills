<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$name = $_POST['name'];
$count = 0;
$menu = $pdo->query("select * from r_menu where name='{$name}'");
while($list = $menu->fetch()){
	$rsv = $pdo->query("select * from rsv where idx='{$list['ridx']}'")->fetch();
	if($rsv['type'] == "x"){
		$count += intval($list['number']);
	}
}
echo $count;