<?php 
	include_once("../include/lib.php");

	$stdate = $_POST['stdate'];
	$endate = $_POST['endate'];

	$room_r = $pdo->query("select * from room order by number asc");
	while($room = $room_r->fetch(2)){
		$appChk = $pdo->query("select * from application where ridx='{$room['ridx']}' and ((stdate between '{$stdate}' and '{$endate}') or (endate between '{$stdate}' and '{$endate}'))")->rowCount();

		if($appChk == 0){
			echo "<option value='{$room['number']}'>{$room['number']}</option>";
		}
	}