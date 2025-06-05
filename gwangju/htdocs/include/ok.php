<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['action']) || isset($_POST['table'])){
	if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
	if(isset($_POST['pw_check'])) $_POST['pw_check'] = md5($_POST['pw_check']);
	switch($_POST['action']){
		case 'insert' :
			switch($_POST['table']){
				case 'member' :
					$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
					if($idchk > 0){
						echo "이미 존재하는 아이디입니다.";
						return false;
					}
					if($_POST['pw'] != $_POST['pw_check']){
						echo "비밀번호가 일치하지 않습니다.";
						return false;
					}
					$pdo->query("insert into member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', username='{$_POST['username']}'")->fetch();
				break;
				default :
					return;
				break;
			}
		break;
		case 'update' :
			switch($_POST['table']){
				default :
				break;
			}
		break;
		case 'delete' :
			switch($_POST['table']){
				default :
				break;
			}
		break;
		case 'main3sub1_frm' :
			/*
			$add_sql .= ",time='".$_POST['time'].":".$_POST['minute'].":00'";
			$cancel .= "action/number/time/minute";
			$column = column($_POST, $cancel);
			q("insert", "rsv", $column.$add_sql);
			*/
			$pdo->query("insert into rsv set name='{$_POST['name']}', tel='{$_POST['tel']}', number='{$_POST['number']}', date='{$_POST['redate']}', time='".$_POST['time'].":".$_POST['minute'].":00'")->fetch();
			
			$rsv = $pdo->query("select * from rsv order by idx desc")->fetch(2);
			$idx = $rsv['idx'];
			
			foreach($_POST['menunumber'] as $key=>$val){
				$pdo->query("insert into r_menu set ridx='{$idx}', name='{$key}', number='{$val}'");
			}
			
			alert("예약이 완료되었습니다.");
			move("/main3/sub1");
		break;
		default :
			echo "Action Erorr!";
			exit();
		break;
	}
	$cancel = "action/table";
	$column = column($_POST, $cancel);
	q($_POST['action'], $_POST['table'], $column.$add_sql);
	
	if(isset($msg)) alert($msg);
	if(isset($url)) move($url);
}