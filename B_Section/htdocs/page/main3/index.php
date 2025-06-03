<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
access(isset($_SESSION['userid']));
?>
<div class="main3">
	<form id="ep_frm" action="/main3/x/" method="post" onSubmit="return frmChk(this, 'edate', 'number');">
    	<div>
        	<input type="hidden" name="table" value="insert">
        </div>
        <ul class="ep_area">
        	<li>체험명 : 국화축제</li>
        	<li><input type="text" name="edate" id="edate" title="예약인원" placeholder="날짜를 선택하려면 이곳을 클릭해주세요." readonly></li>
            <li><input type="text" name="number" id="number" value="0" min="0" title="인원수"></li>
        </ul>
    </form>
</div>
<script>
$("input[name=edate]").datepicker(function(){
	dateFormat : "yy-mm-dd";
	minDate : 0;
});

$("input[name=number]").spinner(function(){
	
});
</script>