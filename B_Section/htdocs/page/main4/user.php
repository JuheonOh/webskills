<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$ep_list = $pdo->query("select * from ep_list")->fetch();
?>
<div class="main4">
	<div class="main4_search">
    	<form id="main4_frm" action="/main4/x/" method="post" onSubmit="return false;">
        	<ul class="main4_search_area">
            	
            </ul>
        </form>
    </div>
	<table style="width:100%">
    	<colgroup>
        	<col width="10%">
            <col width="25%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>번호</th>
            	<th>체험명</th>
                <th>예약인원</th>
                <th>예약일자</th>
                <th>신청일자</th>
                <th>취소여부</th>
            </tr>
        </thead>
        <tbody>
        	<?php
			$list = $pdo->query("select * from ep_list where userid='{$_SESSION['userid']}'")->fetch();
			$ep_list_idx = $pdo->query("select * from ep_list where userid='{$_SESSION['userid']}'")->rowCount();
			for($i = 1; $i <= $ep_list_idx; $i++){ ?>
            <tr>
            	<td><?php echo $i; ?></td>
                <td><?php echo $list['title'] ?></td>
                <td><?php echo $list['number']; ?></td>
                <td><?php echo $list['edate']; ?></td>
                <td><?php echo $list['date']; ?></td>
                <?php if($list['edate'] > date("Y-m-d")){?>
                <td><button title="취소" onClick="epListDelete();" >취소</button></td>
                <?php } else { ?>
                <td><button title="취소불가능" disabled>취소불가능</button></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
function epListDelete(){
	var idx = $(this).index();
	$("table > tbody > tr").each(function(){
		$("table > tbody > tr").eq(idx).remove();
	});
}
</script>