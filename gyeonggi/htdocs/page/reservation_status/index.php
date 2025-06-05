<div id="reservation_status">
	<p class="mb10">■ <?php echo $_SESSION['username']."(".$_SESSION['userid'].")"; ?>의 예약현황입니다.</p>
    <table class="table2 tac">
    	<thead>
        	<tr>
            	<th>예약정보</th>
                <th>예약내역</th>
                <th>예약취소</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$list_q = $pdo->query("select * from rsv where userid='{$_SESSION['userid']}'");
				if($list_q->rowCount()){
					while($list = $list_q->fetch()){
			?>
            <tr>
            	<td class="tal">
                	<ul class="list_style">
                    	<li>예약 룸 : <?php echo $list['room']; ?></li>
                        <li>예약 날짜 : <?php echo $list['date']; ?></li>
                        <li>예약 시간 : <?php echo date("H:i", strtotime($list['st_time']))."~".date("H:i", strtotime($list['en_time'])); ?></li>
                    </ul>
                </td>
                <td>
                	<button title="예약내역" onClick="dialog('예약내역', '/page/main5/member_info.php?idx=<?php echo $list['idx']; ?>', '600')">예약내역</button>
                </td>
                <td>
                	<?php
						$date = strtotime(date("Y-m-d H:i:s")) + (24*60*60);
						$redate = strtotime($list['redate']." ".$list['st_time']);
						if($date < $redate){
					?>
                    <button title="예약취소" onClick="del(this, <?php echo $list['idx']; ?>)">예약취소</button>
                    <?php } else { ?>
                    <p>취소불가</p>
                    <?php } ?>
                </td>
            </tr>
            <?php } } else { ?>
            <tr>
            	<td colspan="3" class="tac">예약된 정보가 존재하지 않습니다.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
// 삭제
function del(self, idx){
	$.post(
		"/page/reservation_status/delete.php",
		{ idx : idx },
		function(data){
			alert("예약이 취소되었습니다.");
			$("#reservation_status table tbody > tr").remove();
		}
	);
}
</script>