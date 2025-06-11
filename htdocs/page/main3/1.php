<?php
	access(isset($_SESSION['userid']));
	$reserve = $pdo->query("select * from reserve where idx='{$sidx}'")->fetch();
?>
<div id="main3-reserve">
	<form id="main3-1-frm" onSubmit="return frmSubmit(this, '/include/main3-ok.php', '체험신청이 완료되었습니다.', '/main4')">
	    <h2 class="main3-title">체험명 : <?php echo $reserve['title']; ?></h2>
        <div class="main3-reserve-box">
        	<div>
            	<input type="hidden" name="ridx" value="<?php echo $sidx ?>">
            </div>
            <ul>
            	<li><label for="datepicker">예약일자</label></li>
                <li><input type="text" id="datepicker" name="edate" title="날짜 선택하기" value="" placeholder="클릭하여 날짜를 선택해주세요." readonly required></li>
            </ul>
            <ul>
            	<li><label>체험가능인원</label></li>
                <li class="number">예약일자를 선택해주세요.</li>
            </ul>
            <ul>
            	<li><label for="number">예약인원</label></li>
                <li><input type="text" id="number" name="number" title="예약인원" value="" placeholder="예약인원" readonly required></li>
            </ul>
        </div>
        <div class="main3-reserve-submit"><input type="submit" title="예약하기" value="예약하기"></div>
    </form>
</div>
<script>
$(function(){
	var idx = $("input[name=ridx]").val();
	var number;
	
	$("#datepicker").datepicker({
		dateFormat : "yy-mm-dd",
		minDate : 0,
		onSelect : function(date){
			$.ajax({
				type : "POST",
				url : "/include/main3-number.php",
				data : { idx : idx, date : date },
				success : function(data){
					number = data;
					$("#number").val("");
					$(".number").html(data + " 명");
				}
			});
		}
	});
	$("#number").spinner({
		min : 0,
		stop : function(){
			var val = parseInt($(this).val(), 10);
			if(!isNaN(val)){
				if($("#datepicker").val() === ""){
					$(this).val("");
					$("#datepicker").focus();
					alert("예약일자를 입력해주세요.");
				} else {
					if(number - val < 0){
						alert("예약가능인원을 초과하였습니다.");
						$(".number").html(number + " 명");
						$(this).val("");
					} else {
						$(".number").html((number - val) + " 명");
					}
				}
			}
		},
		icons : {
			up : "ui-icon-plus",
			down : "ui-icon-minus"
		}
	});
});
</script>