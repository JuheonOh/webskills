<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if($_SESSION['captcha'] != $_POST['captcha']){
	echo "자동가입방지를 다시 확인해주세요.";
} else {	
	if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
	
	$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
	if($idchk == NULL){
		$pdo->query("insert into member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', cellular='{$_POST['cellular']}', email='{$_POST['email']}', lv='사용자'")->fetch();
	} else {
		echo "이미 존재하는 아이디입니다.";
	}
}