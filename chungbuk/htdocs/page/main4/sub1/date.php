<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$arr = array();
foreach($_GET['date'] as $key=>$val){
	$time = "";
	$s_time = date("U")-strtotime($val);
	if(floor($s_time/60)<60){
		$time .= floor($s_time/60)."분전 ";
	} else if(floor($s_time/(60 * 60)) < 24){
		$time .= floor($s_time/(60*60))."시간전 ";
	} else {
		$time .= floor($s_time/(60*60*24))."일전";
	}
	$arr[] = $time;
}
echo json_encode($arr);
?>