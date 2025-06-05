<?php
if(isset($_POST['action']) && isset($_POST['table'])){
	if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
	switch($_POST['action']){
		case 'insert' :
			switch($_POST['table']){
				case 'member' :
					$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
					if($idchk > 0){
						echo "존재하는 아이디입니다.";
						return false;
					}
				break;
			}
		break;
		case 'update' :
		break;
		case 'delete' :
		break;
	}
	$cancel .= "action/table";
	$column = column($_POST, $cancel);
	q($_POST['action'], $_POST['table'], $column.$add_sql);
}
?>