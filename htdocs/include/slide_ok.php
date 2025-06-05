<?php
if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'insert' :
			$file = file_upload($_FILES['file'], "slide");
			
			$cancel .= "action/file/";
			$column = column($_POST, $cancel);
			$add_sql .= "file={$file}";
			/* q($_POST['action'], "slide", $column.$add_sql); */
			$pdo->query("insert into slide set file='{$file}', type='0'");
			
			$msg = "추가 되었습니다.";
			$url = "/admin/slide";
		break;
		case 'update' :
			q($_POST['action'], "slide", "type=0");

			foreach($_POST['type'] as $key){
				q($_POST['action'], "slide", "type=1 where sidx={$key}");
			}

			$msg = "수정 되었습니다.";
			$url = "/admin/slide";
		break;
	}
	
	if(isset($msg)) alert($msg);
	move($url);
}
?>