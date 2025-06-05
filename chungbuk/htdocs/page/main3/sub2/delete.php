<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if(date("Y-m-d") < $_POST['date']){
	q("delete", "rsv", " where idx='{$_POST['idx']}'");
} else {
	echo "예약취소는 예약일 하루 전까지 취소할 수 있습니다.";
}