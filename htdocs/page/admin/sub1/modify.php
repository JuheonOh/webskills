<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$list = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
$sum = $pdo->query("select * from educate_list where code='{$list['code']}'")->rowCount();

?>
<div id="educate_modify">
	<form id="educate_frm" method="post" onSubmit="return frmSubmit(this, '/page/admin/sub1/modify_ok.php', '강좌 수정이 완료되었습니다.', '/admin/sub1')">
    	<input type="hidden" name="st_date" value="<?php echo $list['st_date']; ?>">
    	<input type="hidden" name="idx" value="<?php echo $list['idx']; ?>">
    	<div class="modify">
       	  <h2>강좌 제목 : <input type="text" name="title" id="title" title="강좌 제목" value="<?php echo $list['title']; ?>" placeholder="강좌 제목" required></h2>
            <p>강좌 코드 : <?php echo $list['code']; ?></p>
            <ul>
            	<li>개강일 : </li>
                <li><input type="text" name="st_date" id="st_date" title="개강일" value="<?php echo $list['st_date']; ?>" placeholder="개강일" required readonly></li>
                <li>종강일 : </li>
                <li><input type="text" name="en_date" id="en_date" title="종강일" value="<?php echo $list['en_date']; ?>" placeholder="종강일" required readonly></li>
            </ul>
            </ul>
            <p class="number">수강신청자 수 : <?php echo $sum; ?> 명</p>
            <p class="teacher">강사명 : <input type="text" name="teacher" id="teacher" title="강사명" value="<?php echo $list['teacher'] ?>" placeholder="강사명"></p>
            <div>
            	<textarea id="info" name="info" title="설명" required><?php echo $list['info']; ?></textarea>
            </div>
        </div>
        <ul class="btn">
        	<li><button type="submit" title="확인">확인</button></li>
            <li><button type="button" title="취소" onClick="$('#dialog').remove()">취소</button></li>
            <li><button type="button" id="delete_btn" title="삭제">삭제</button></li>
        </ul>
    </form>
</div>
<script>
$(function(){
	var st_date = $("input[name=st_date]").val();
	var date = "";
	var en_date = "";
	
	date = new Date(st_date);
	en_date = date.getFullYear()+"-"+0+(date.getMonth()+1)+"-"+(date.getDate()+6);
	
	$("#en_date").datepicker("option", "minDate", st_date);
	$("#en_date").datepicker("option", "maxDate", en_date);

	
	$("#st_date").datepicker({
		changeYear : true,
		changeMonth : true,
		dateFormat : "yy-mm-dd",
		onSelect : function(thisdate){
			st_date = thisdate;
			
			date = new Date(st_date);
			en_date = date.getFullYear()+"-"+0+(date.getMonth()+1)+"-"+(date.getDate()+6);
			
			$("#en_date").datepicker("option", "minDate", date);
			$("#en_date").datepicker("option", "maxDate", en_date);
		}
	});
	
	$("#en_date").datepicker({
		changeYear : true,
		changeMonth : true,
		dateFormat : "yy-mm-dd",
		minDate : st_date,
		maxDate : en_date
	});
	
	$("#delete_btn").click(function(){
		var idx = $("input[name=idx]").val();
		
		if(confirm("정말 삭제하시겠습니까?") == true){
			$.ajax({
				type : "POST",
				url : "/page/admin/sub1/delete.php",
				data : { idx : idx },
				success : function(data){
					if(data){
						alert(data);
					} else {
						alert("삭제가 완료되었습니다.");
						list();
						link("/admin/sub1");
					}
				}
			});
		}
	});
});
</script>