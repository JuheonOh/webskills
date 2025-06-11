<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

if(!isset($_SESSION['userid'])){
	die("로그인 후 이용해주세요.");
}

if($_POST['number'] == 0){
	die("예약인원은 최소 1명 이상 입력해주세요.");
}

if(date("Y-m-d") > $_POST['edate']){
	die("예약일자를 경과하였습니다.");
}

$reserve = $pdo->query("select * from reserve where idx='{$_POST['ridx']}'")->fetch();
$reserve_list = $pdo->query("select sum(number) as number from reserve_list where ridx='{$_POST['ridx']}' and edate='{$_POST['edate']}'")->fetch();

if($reserve['number'] - $reserve_list['number'] - $_POST['number'] < 0){
	die("예약인원을 초과했습니다.");
}

$pdo->query("insert into reserve_list set ridx='{$_POST['ridx']}', userid='{$_SESSION['userid']}', number='{$_POST['number']}', edate='{$_POST['edate']}', date=now();")->fetch();