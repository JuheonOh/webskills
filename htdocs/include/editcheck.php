<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
$cancel = "action/";
$column = column($_POST, $cancel);
q("update", "member", $column."where userid='{$_SESSION['userid']}'");
$member_info = $pdo->query("select * from member where userid='{$_SESSION['userid']}'")->fetch();
$_SESSION['username'] = $member_info['username'];
$_SESSION['email'] = $member_info['email'];