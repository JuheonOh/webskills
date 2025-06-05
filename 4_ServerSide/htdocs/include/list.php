<?php 
	include_once("lib.php");

	$location = "";

	if($_POST['currentLocation'] != "전체보기"){
		$location = $_POST['currentLocation'];
	}
?>

<?php 
    $car = $pdo->query("select * from car where currentLocation like '%{$location}%' order by currentLocation");
    $rowspanChk = 0;
    while($rs = $car->fetch(2)){
        $rowspan = $pdo->query("select * from car where currentLocation='{$rs['currentLocation']}'")->rowCount();
        $rsv = $pdo->query("select * from rsv where cidx='{$rs['idx']}' order by idx desc limit 1")->fetch(2);
?>
<tr>
    <?php if($rowspanChk == 0){ ?>
	<td rowspan="<?php echo $rowspan; ?>" class="wordOffice">
       <strong><?php echo $rs['currentLocation']; ?></strong>
  	</td>
    <?php } ?>
    <td>
        <img src="<?php echo $rs['image']; ?>" title="<?php echo $rs['number']; ?>" alt="<?php echo $rs['number']; ?>">
        <p>EV Serial No. - <?php echo $rs['number']; ?></p>
    </td>
    <td>
        <?php if($rsv){ ?>
    	<p><strong>출발지</strong> : <?php echo $rsv['location_start']; ?> -> <strong>도착지</strong> : <?php echo $rsv['location_end']; ?></p>
        <p><strong>대여시간</strong> : <?php echo str_replace("-", "/", $rsv['time_start']); ?> ~ <strong>반납시간</strong> : <?php echo str_replace("-", "/", $rsv['time_end']); ?></p>
        <?php } else { ?>
        -
        <?php } ?>
        
    </td>
    <td>
        <?php if($rsv && $rsv['location_start'] == $rsv['location_end']){ ?>
            왕복
        <?php } else if($rsv && $rsv['location_start'] != $rsv['location_end']){ ?>
            편도
        <?php } else { ?>
            -
        <?php } ?>
    </td>
    <td>
        <?php 
            if($rsv){
                if($rsv['time_end'] > date("Y-m-d H:i")){
                    echo "예약차량";
                } else if($rsv['time_end'] < date("Y-m-d H:i")){
                    echo "대여종료";
                }
            } else {
                echo "예약대기";
            }
        ?>
    </td>
    <td>
        <select <?php if($rsv) echo "disabled"; ?>>
            <option value="">이동지역선택</option>
            <option value="강북구">강북구</option>
            <option value="강남구">강남구</option>
            <option value="서대문구">서대문구</option>
            <option value="성동구">성동구</option>
            <option value="양천구">양천구</option>
            <option value="관악구">관악구</option>
        </select>
        <button class="moveLocation" data-cidx='<?php echo $rs['idx'] ?>'>이동하기</button>
    </td>
</tr>
<?php $rowspanChk++; if($rowspan == $rowspanChk) $rowspanChk = 0; } ?>