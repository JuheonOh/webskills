<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<div class="main4">
	<div class="main4_search">
    </div>
	<table style="width:100%">
    	<colgroup>
            <col width="25%">
            <col width="10%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>체험명</th>
                <th>예약인원</th>
                <th>예약일자</th>
                <th>신청일자</th>
                <th>취소여부</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="ep_list">
        <form id="ep_list_frm" action="/main4/x/" method="post" onSubmit="return frmChk(this, 'idx', 'title', 'number', 'edate', 'date', 'userid');">
			<?php
			$ep_list = $pdo->query("select * from ep_list where userid='{$_SESSION['userid']}'");
			while($list = $ep_list->fetch()){
			?>
        	<div>
            	<input type="hidden" name="idx" value="<?php echo $list['idx']; ?>">
                <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
            </div>
                <ul>
                    <li><input type="text" title="체험명" id="title" name="title" readonly value="<?php echo $list['title']; ?>"></li>
                    <li><input type="text" title="예약인원" id="number" name="number" readonly value="<?php echo $list['number']; ?>"></li>
					<li><input type="text" title="예약일자" id="edate" name="edate" readonly value="<?php echo $list['edate']; ?>"></li>
					<li><input type="text" title="신청일자" id="date" name="date" readonly value="<?php echo $list['date']; ?>"></li>
                    <?php if($list['edate'] > date("Y-m-d")){?>
                    <li><input type="submit" title="취소" value="취소"></li>
                    <?php } else { ?>
                    <li><input type="submit" title="취소불가능" value="취소불가능" disabled></li>
                    <?php } ?>        
                 </ul>
        	<?php } ?>
        </form>
    </div>
</div>
<script>
function epListDelete(){
	var idx = $(this).index();
	$("table > tbody > tr").each(function(){
		$("table > tbody > tr").eq(idx).remove();
	});
}
</script>