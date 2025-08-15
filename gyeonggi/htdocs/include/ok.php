<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(isset($_POST['action'])){
	if(isset($_POST['pw'])) $_POST['pw'] = md5($_POST['pw']);
	switch($_POST['action']){
		case 'insert' :
			switch($_POST['table']){
				case 'member' :
					$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();
					if($idchk > 0){
						echo "이미 존재하는 아이디입니다.";
					}
				break;
				case 'rsv' :
					$room = $_POST['room'];
					$redate = $_POST['redate'];
					$time = explode("~", $_POST['time']);
					$st_time = date("H:i:s", strtotime($time[0]));
					$en_time = date("H:i:s", strtotime($time[1]));
					
					
					$count = $pdo->query("select * from rsv where room='{$room}' and redate='{$redate}'")->rowCount();
					$count2 = $pdo->query("select * from rsv where room='{$room}' and redate='{$redate}' and st_time='{$st_time}' and en_time='{$en_time}'")->rowCount();
					if($count >= 4){
						echo "다른 예약일을 선택해주세요.";
						exit();
					} else if($count2 >= 1){
						echo "다른 시간대를 선택해주세요.";
						exit();
					}
					
					$cancel .= "action/table/time/name/cost/number/";
					$column = column($_POST, $cancel);
					$add_sql = ", st_time='{$st_time}', en_time='{$en_time}'";
					
					q($_POST['action'], $_POST['table'], $column.$add_sql);
					
					$idx = $pdo->query("select * from rsv order by idx desc")->fetch();
					foreach($_POST['name'] as $key=>$val){
						q("insert", "food", "ridx={$idx['idx']}, name='{$val}', number={$_POST['number'][$key]}, cost={$_POST['cost'][$key]}");
					}
					exit();
				break;
				case 'review' :
					$pdo->query("update rsv set review=1 where idx='{$_POST['ridx']}'");
					$msg = "작성이 완료되었습니다.";
					$url = "/main4";
				break;
				default : 
					echo "테이블 에러!";
					exit();
				break;
			}
		break;
		case 'update' :
			switch($_POST['table']){
				default : 
					echo "테이블 에러!";
					exit();
				break;
			}
		break;
		case 'delete' :
			switch($_POST['table']){
				default : 
					echo "테이블 에러!";
					exit();
				break;
			}
		break;
		case 'login' :
			$member = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch();
			if($member == NULL){
				echo "아이디와 비밀번호를 확인해주세요.";
				exit();
			}
			
			$_SESSION['userid'] = $member['userid'];
			$_SESSION['username'] = $member['username'];
			$_SESSION['lv'] = $member['lv'];
		break;
		default : 
			echo "액션 에러!";
			exit();
		break;
	}
	$cancel .= "action/table";
	$column = column($_POST, $cancel);
	q($_POST['action'], $_POST['table'], $column.$add_sql);
	
	if(isset($msg)) alert($msg);
	if(isset($url)) move($url);
}