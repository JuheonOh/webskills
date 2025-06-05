<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'ep_list' :
			echo "체험신청";
		break;
		default : 
			die("Table Error");
		break;
	}
	$cancel = "action/";
	$column = column($_POST, $cancel);
	q("insert", "ep_list", $column);
}