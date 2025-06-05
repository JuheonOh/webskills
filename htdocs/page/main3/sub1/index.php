<?php access(isset($_SESSION['userid'])) ?>
<div id="main3sub1">
	<table class="table">
    	<colgroup>
        	<col width="15%">
            <col width="40%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>강좌코드</th>
                <th>강좌제목</th>
                <th>개강일</th>
                <th>종강일</th>
                <th>취소</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$list_r = $pdo->query("select * from educate_list where userid='{$_SESSION['userid']}' order by code");
				$count = $list_r->rowCount();
				if($count != 0){
				while($list = $list_r->fetch(2)){
			?>
            <tr>
            	<td><?php echo $list['code']; ?></td>
                <td><?php echo $list['title']; ?></td>
                <td><?php echo $list['st_date']; ?></td>
                <td><?php echo $list['en_date']; ?></td>
                <td><button type="button" title="수강취소" onClick="main3sub1_remove(this, '<?php echo $list['idx']; ?>')">수강취소</button></td>
            </tr>
            <?php } } else { ?>
            <tr>
            	<td colspan="5">신청 내역이 존재하지 않습니다.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
function main3sub1_remove(self, idx){
	$.ajax({
		type : "POST",
		url : "/page/main3/sub1/delete.php",
		data : { idx : idx },
		success : function(data){
			$(self).parent().parent().remove();
			if($(".table tbody tr").length == 0) $(".table tbody").append("<tr><td colspan='5'>신청 내역이 존재하지 않습니다.</td></tr>");
		}
	});
}
</script>