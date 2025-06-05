<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$educate = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
$list = $pdo->query("select * from educate_list where code='{$educate['code']}'")->rowCount();

if($list == 0){
	$pdo->query("delete from educate where idx='{$_POST['idx']}'");
} else {
	die("한 명의 회원 이상이 해당 강좌를 신청했으므로 삭제를 할 수 없습니다.");
}