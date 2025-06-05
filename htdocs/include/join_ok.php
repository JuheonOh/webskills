<?php

	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	$idchk = $pdo->query("select * from member where binary(userid)='{$_POST['userid']}'")->rowCount();
	
	if($idchk == 0){
		$_POST['pw'] = md5($_POST['pw']);
		
		$gender = "";
		
		if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
		}
		
		if($_POST['email'] != ""){
			if($_POST['domain'] == ""){
				die("메일 서버 주소를 입력해주세요.");
			}
		}
		
		if($_POST['domain'] != ""){
			if($_POST['email'] == ""){
				die("이메일 아이디를 입력해주세요.");
			}
		}
		
		if($_POST['email'] != "" && $_POST['domain'] != ""){
			$email = $_POST['email']."@".$_POST['domain'];
		}
		
		if(isset($_POST['idx'])){
			$list = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
			$pdo->query("insert into educate_list set code='{$list['code']}', title='{$list['title']}', st_date='{$list['st_date']}', en_date='{$list['en_date']}', username='{$_POST['username']}', userid='{$_POST['userid']}', edate=now()");
			
			$_SESSION['userid'] = $_POST['userid'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['lv'] = "user";
			
		}
		
		$pdo->query("insert into member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', username='{$_POST['username']}', email='{$_POST['email']}', gender='{$gender}', year='{$_POST['year']}', lv='user'");
		
	} else {
		die("이미 존재하는 아이디 입니다.");
	}	