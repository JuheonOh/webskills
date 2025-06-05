<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
$id_chk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
if($id_chk < 1){
	q("insert", "member", column($_POST, ""));
} else {
	echo "존재하는 아이디입니다.";
	exit();
}