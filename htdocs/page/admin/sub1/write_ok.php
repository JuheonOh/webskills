<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	$dir = "../../../data/main2/";
	$filename = "";
	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){
		$filename = $_FILES['file']['name'];
		$filename = date("Ymd-His")."_".$filename;
		$dst = $dir.$filename;
	
		if(!move_uploaded_file($_FILES['file']['tmp_name'], $dst)){
			die("파일이 지정된 폴더에 저장되지 않았습니다.");
		}
	}
	
	$chk = $pdo->query("select * from educate");
	$code = "W";
	$code .= substr(str_shuffle("QWERTYUIOPQASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789"), 0, 4);
	
	while($chk_list = $chk->fetch(2)){
		if($chk_list['code'] == $code){
			$code = "W";
			$code .= substr(str_shuffle("QWERTYUIOPQASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789"), 0, 4);
		}
	}
	
	$_POST['info'] = $pdo->quote($_POST['info']);
	$_POST['info'] = substr($_POST['info'], 1);
	$_POST['info'] = substr($_POST['info'], 0, -1);

	$pdo->query("insert into educate set title='{$_POST['title']}', info='{$_POST['info']}', teacher='{$_POST['teacher']}', code='{$code}', st_date='{$_POST['st_date']}', en_date='{$_POST['en_date']}', image='{$filename}'");

	alert("강좌 추가가 완료되었습니다.");
	move("/admin/sub1");	