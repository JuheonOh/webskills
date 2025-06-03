<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
access(isset($_SESSION['userid']));
$ep = $pdo->query("
	select * from ep 
	
");
?>
<div class="main3">
	<form id="ep_frm" action="/main3/x/" method="post" onSubmit="return frmChk(this, 'edate', 'number');">
    	<div>
        	<input type="hidden" name="ep_list" value="insert">
        </div>
        <ul class="ep_area">
        	<li><select>
            	<option value="">선택하세요</option>
            	<?php $ep_r = $pdo->query("select * from ep");
				while($ep_list = $ep_r->fetch()){?>
                <option value="<?php echo $ep_list['idx']; ?>"><?php echo $ep_list['title']; ?></option>
				<?php } ?>
            </li></select>
        	<li>체험명 : </li>
        	<li><input type="text" name="edate" id="edate" title="예약인원" placeholder="날짜를 선택하려면 이곳을 클릭해주세요." readonly></li>
            <li>예약인원 : &nbsp;<input type="text" name="number" id="number" value="0" min="0" title="인원수"></li>
        </ul>
    </form>
</div>
<script>
$(function(){
	$("input[name=edate]").datepicker(function(){
		minDate : date("Y-m-d");
	});
	
	
	$("input[name=number]").spinner(function(){
		var maxnumber = 5;
		if($(this).val() > maxnumber){
			
			alert("최대 인원수보다 많이 신청할 수 없습니다.");
			$(this).val(5);
		}
	});
	
	$("li > select").select(function(){
		
	});	

});
</script>