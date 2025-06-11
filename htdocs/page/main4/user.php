<?php
	$reserve_list = $pdo->query("select reserve_list.*, reserve.title from reserve_list inner join reserve on reserve_list.ridx = reserve.idx where userid='{$_SESSION['userid']}' order by edate desc");
	$count = $reserve_list->rowCount();
?>
<h3>▶ <?php echo $_SESSION['userid']; ?> 님의 체험 신청 목록입니다.</h3>
<table class="table">
	<colgroup>
    	<col width="25%">
    	<col width="15%">
    	<col width="20%">
    	<col width="20%">
    	<col width="20%">
    </colgroup>
	<thead>
    	<tr>
        	<th>체험명</th>
        	<th>예약인원</th>
            <th>예약일자</th>
            <th>신청일자</th>
            <th>기능</th>
        </tr>
    </thead>
    <tbody>
    	<?php
			if($count){
			while($list = $reserve_list->fetch()){
		?>
    	<tr>
        	<td><?php echo $list['title']; ?></td>
            <td><?php echo $list['number']; ?></td>
            <td><?php echo $list['edate']; ?></td>
            <td><?php echo $list['date']; ?></td>
            <?php if($list['edate'] > date("Y-m-d")){ ?>
            <td><button title="예약취소" onClick="reserveDelete(this, <?php echo $list['idx']; ?>);">예약취소</button></td>
            <?php } else { ?>
            <td><button title="예약취소 불가능" class="reserve-delete-impossible" disabled>예약취소 불가능</button></td>
            <?php } ?>
        </tr>
        <?php } } else { ?>
        <tr>
        	<td colspan="5" class="no-have-reserve-list">예약하신 내역이 존재하지 않습니다.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<script>
function reserveDelete(self, idx){
	$.ajax({
		type : "POST",
		url : "/include/main4-delete.php",
		data : { idx : idx },
		success : function(data){
			$(self).parent().parent().remove();
			if($(".table > tbody > tr").length == 0){
				$(".table > tbody").append("<tr><td colspan='5' class='no-have-reserve-list'>예약하신 내역이 존재하지 않습니다.</td></tr>");
			}
		}
	});
}
</script>