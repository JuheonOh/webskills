<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$week = array("일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일");
$date = $_POST['date'];
$room = $_POST['room'];
$cleanday = $_POST['cleanday'];
$image = $_POST['image'];

?>
<table class="table2">
	<colgroup>
    	<col width="50%">
    </colgroup>
    <thead>
    	<tr>
        	<th>사진 및 명칭</th>
            <th>시간대별 예약 리스트</th>
        </tr>
    </thead>
    <tbody>
    	<?php
			if(date("w", strtotime($date)) != 5){
				foreach($room as $key=>$val){
		?>
        <tr>
        	<td>
            	<figure>
                	<div>
                    	<img src="/image/<?php echo $image[$key] ?>" alt="<?php echo $image[$key] ?>" title="<?php echo $image[$key] ?>">
                    </div>
                    <figcaption>
                    	<p><?php echo $val; ?></p>
                    </figcaption>
                </figure>
            </td>
            <td>
            	<ul class="list_style">
                	<?php
						if($week[date("w", strtotime($date))] != $cleanday[$key]){
							for($i = 9; $i <= 20; $i += 3){
								$st_time = date("H:i:s", strtotime($i.":00".":00"));
								$en_time = date("H:i:s", strtotime(($i+2).":00".":00"));
					?>
                    <li class="mt10">
                    	<?php
							$count = $pdo->query("select * from rsv where date='{$date}' and room='{$val}' and st_time='{$st_time}' and en_time='{$en_time}'")->fetch();
							if($count != NULL){
						?>
                        <p><?php echo date("H:i", strtotime($st_time))." ~ ".date("H:i", strtotime($en_time)); ?> [ 예약있음 ] <button onClick="dialog('예약내역', '/page/main5/member_info.php?idx=<?php echo $count['idx']; ?>', '600')" title="회원주문정보">회원주문정보</button>
                        <?php
							$date = date("Y-m-d H:i:s", strtotime($count['date']." ".$count['st_time']));
							if(date("Y-m-d H:i:s") < $date){
						?>
                        <button title="예약내역취소" onClick="del(this, <?php echo $count['idx']; ?>)">예약내역취소</button>
                        <?php } else { ?>
                        <span>예약내역 취소 불가</span>
                        <?php } ?>
                        </p>
                        <?php } else { ?>
                        <p><?php echo date("H:i", strtotime($st_time))." ~ ".date("H:i", strtotime($en_time)); ?> [ 예약없음 ]</p>
                        <?php } ?>
                    </li>
                    <?php } } else { ?>
                    <li>청소요일입니다.</li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
        <?php } } else { ?>
        <tr>
        	<td colspan="2" class="tac">휴업일입니다.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>