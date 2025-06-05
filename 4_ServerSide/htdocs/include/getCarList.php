<?php 
	include_once("lib.php");

	$list = $pdo->query("select * from car where location='{$_POST['currentLocation']}'");
	while($rs = $list->fetch(2)){
		$rsvChk = $pdo->query("select * from rsv where cidx='{$rs['idx']}' and (time_start >= now())")->fetch(2);
?>
	<tr>
		<td>
	    	<img src="<?php echo $rs['image']; ?>" title="<?php echo $rs['number']; ?>" alt="<?php echo $rs['number']; ?>">
	        <p>EV Serial No. - <?php echo $rs['number']; ?></p>
	    </td>
		<td>
	        <select name="location_end">
		            <option value="">도착지선택</option>
	        	<?php if($rsvChk){ ?>
	        		<option value="<?php echo $rs['currentLocation']; ?>"><?php echo $rs['currentLocation']; ?></option>
	        	<?php } else { ?>
		            <option value="강북구">강북구</option>
		            <option value="강남구">강남구</option>
		            <option value="서대문구">서대문구</option>
		            <option value="성동구">성동구</option>
		            <option value="양천구">양천구</option>
		            <option value="관악구">관악구</option>
	        	<?php } ?>
	        </select>
	        
	        <select name="time_start" data-cidx='<?php echo $rs['idx']; ?>'>
	            <option value="">대여시간</option>
	            <?php
	            	$year = date("Y");
	            	$month = date("m");
	            	$day = date("d");

	            	$hour = date("H");
	            	$minute = date("i") < 30 ? 0 : 30;


	            	for($i = 1; $i <= 48; $i++){
	            		$j = $i * 30;

	            		$today = mktime($hour, $minute+$j, 0, $month, $day, $year);
	            		$date = date("Y-m-d H:i", $today);
	            ?>
	            	<option value="<?php echo $date; ?>"><?php echo date("Y/m/d H:i", $today); ?></option>
	            <?php } ?>
	        </select>	
	        
	        <select name="time_end" disabled>
	        	<option value="">반납시간</option>
	        </select>
	    </td>
		<td>
			<?php 
				if($rsvChk){
					echo "왕복";
				} else {
	    			echo "왕복 / 편도";
				}
			?>
	    </td>
		<td>
	    	<button type="button" class="rsvBtn" data-cidx="<?php echo $rs['idx']; ?>">예약하기</button>
	    </td>
	</tr>
<?php } ?>