<?php access(isset($_SESSION['userid'])) ?>
<div id="main3sub2">
	<table class="table">
    	<colgroup>
        	<col width="20%">
            <col width="40%">
            <col width="20%">
            <col width="20%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>강좌코드</th>
                <th>강좌제목</th>
                <th>개강일</th>
                <th>종강일</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$list_r = $pdo->query("select * from educate_list where userid='{$_SESSION['userid']}' order by code");
				$count = $list_r->rowCount();
				if($count != 0){
				while($list = $list_r->fetch(2)){
					$educate = $pdo->query("select * from educate where code='{$list['code']}'")->fetch(2);
			?>
				<?php if($list['en_date'] >= date("Y-m-d") && $list['st_date'] <= date("Y-m-d")){ ?>
                        <tr>
                            <td>
                                <a href="javascript:educate_info('<?php echo $educate['idx']; ?>')" title="<?php echo $list['code']; ?>"><?php echo $list['code']; ?></a>
                            </td>
                            <td>
                                <a href="javascript:educate_info('<?php echo $educate['idx']; ?>')" title="<?php echo $list['title']; ?>"><?php echo $list['title']; ?></a>
                            </td>
                            <td><?php echo $list['st_date']; ?></td>
                            <td><?php echo $list['en_date']; ?></td>
                        </tr>
                <?php } ?>
			<?php } } else { ?>
            <tr>
            	<td colspan="5">신청 내역이 존재하지 않습니다.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
function educate_info(idx){
	$.ajax({
		type : "POST",
		url : "/page/main3/sub2/info.php",
		data : { idx : idx },
		success : function(data){
			$("<div id='dialog'></div>").dialog({
				title : "수강강좌",
				modal : true,
				resizable : false,
				width : 300,
				height : 400, 
				close : function(){
					$(this).remove();
				}
			}).html(data);
		}
	});
}

$(function(){
	if($(".table tbody tr").length == 0) $(".table tbody").append("<tr><td colspan='4'>신청 내역이 존재하지 않습니다.</td></tr>");
});
</script>