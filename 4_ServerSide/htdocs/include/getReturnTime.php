<option value="">반납시간</option>
<?php 
	include_once("lib.php");

	$year = $_POST["Y"];
	$month = $_POST["m"];
	$day = $_POST["d"];

	$hour = $_POST["H"];
	$minute = $_POST["i"] < 30 ? 0 : 30;

	for($i = 1; $i <= 48; $i++){
		$j = $i * 30;

		$today = mktime($hour, $minute+$j, 0, $month, $day, $year);
		$date = date("Y-m-d H:i", $today);
?>
	<option value="<?php echo $date; ?>"><?php echo date("Y/m/d H:i", $today)?></option>
<?php } ?>