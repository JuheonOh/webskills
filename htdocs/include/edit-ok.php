<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);

$pdo->query("update member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', cellular='{$_POST['cellular']}', email='{$_POST['email']}'")->fetch();

$member_info = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
$_SESSION['userid'] = $member_info['userid'];
$_SESSION['cellular'] = $member_info['cellular'];
$_SESSION['email'] = $member_info['email'];
$_SESSION['lv'] = $member_info['lv'];
