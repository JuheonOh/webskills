<?php
	$where = $_SESSION['userid'] == "admin" ? "" : " where userid='{$_SESSION['userid']}'";
	if($_SESSION['userid'] == "admin"){
?>
<form id="main3sub2_frm" action="/" method="post" onSubmit="return false;">
	<table class="table2">
    	<colgroup>
        	<col width="50%">
            <col width="50%">
        </colgroup>
    	<tbody>
        	<tr>
            	<td align="right"><label for="main3sub2_key">예약일 검색</label></td>
                <td align="left"><input type="text" id="main3sub2_key" name="search_key" title="예약일" value="예약일" readonly></td>
            </tr>
        </tbody>
    </table>
</form>
<?php } ?>
<div id="main3sub2">
	<table class="table1 w100p tac">
    	<colgroup>
	    <?php if($_SESSION['lv'] == "관리자"){ ?>
        	<col width="10%">
        <?php } ?>
	        <col width="10%">
            <col width="20%">
            <col width="20%">
            <col width="20%">
            <col width="10%">
        </colgroup>
    	<thead>
        	<tr>	
            	<?php if($_SESSION['lv'] == "관리자"){ ?>
                <th>아이디</th>
                <?php } ?>
                <th>홈이름</th>
                <th>예약일/이용시간</th>
                <th>좌석번호</th>
                <th>신청메뉴/수량</th>
                <th>결제금액</th>
                <th>예약취소</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$list_q = $pdo->query("select * from rsv{$where}");
				if($list_q->rowCount()){
					while($list = $list_q->fetch()){
			?>
            <tr>
            	<?php if($_SESSION['lv'] == "관리자"){ ?>
            	<td><?php echo $list['userid']; ?></td>
                <?php } ?>
                <td><?php echo $list['hall']; ?></td>
                <td><?php echo $list['date']."/"; echo $list['time'] == "lunch" ? "점심" : "저녁"; ?></td>
                <td>
                	<?php
						$echo = "";
						foreach(json_decode($list['seat']) as $key=>$val){
							if($key > 0) $echo .= ", ";
							$int = (int)($val/5);
							$alphabet = chr(65+$int);
							$echo .= $alphabet.(($val-($int*5))+1);
						}
						echo $echo;
					?>
                </td>
                <td>
                	<?php
						$menu = explode(",", $list['menu']);
						$echo = "";
						foreach($menu as $key=>$val){
							if($key > 0) $echo .= "<br>";
							$md = explode("l", $menu[$key]);
							$echo .= $md[0]." / ".$md[1]."개";
							
						}
						echo $echo;
					?>
                </td>
                <td><?php echo number_format($list['price'])."원"; ?></td>
                <td>
                <?php if(date('Y-m-d') < $list['date']){ ?>
                <button title="취소" onClick="cancel(this, <?php echo $list['idx']; ?>, '<?php echo $list['date']; ?>');">취소</button>
                <?php } else { ?>
                <button title="취소불가능" disabled>취소불가능</button>
                <?php } ?>
                </td>
            </tr>
            <?php } } else { ?>
            <tr>
            	<td colspan="7">예약내역이 존재하지 않습니다.</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
function cancel(self, idx, date){
	$.post(
		"/page/main3/sub2/delete.php",
		{ idx : idx, date : date },
		function(data){
			if(data !== ""){
				alert(data);
			} else {
				$(self).parents("tr").remove();
				if($("#main3sub2 tbody > tr").length === 0) $("#main3sub2 tbody").html('<tr><td colspan="100%">예약내역이 존재하지 않습니다.</td></tr>');
			}
		}
	);
}

$(function(){
	$("#main3sub2_key").datepicker({
		dateFormat : "yy-mm-dd",
		onSelect : function(date){
			$.post(
				"/page/main3/sub2/list.php",
				{ date : date },
				function(data){
					$("#main3sub2 tbody").html(data);
				}
			);
		}
	});
});
</script>