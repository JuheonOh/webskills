<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php"); ?>
<div id="educate_add">
	<form id="educate_add_frm" action="/page/admin/sub1/write_ok.php" method="post" enctype="multipart/form-data">
    	<div class="educate_add">
        	<div class="image">
            	<input type="file" name="file" id="file" title="이미지 파일">
            </div>
       		<h2>강좌 제목 : <input type="text" name="title" id="title" title="강좌 제목" value="" placeholder="강좌 제목" required></h2>
            <ul>
            	<li>개강일 : </li>
                <li><input type="text" name="st_date" id="st_date" title="날짜 형식에 맞춰 입력해주세요. ex) 0000-00-00" value="" placeholder="개강일" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required></li>
                <li>종강일 : </li>
                <li><input type="text" name="en_date" id="en_date" title="날짜 형식에 맞춰 입력해주세요.  ex) 0000-00-00"  value="" placeholder="종강일" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required></li>
            </ul>
            <p class="teacher">강사명 : <input type="text" name="teacher" id="teacher" value="" title="강사명" placeholder="강사명" required></p>
            <div>
            	<textarea id="info" name="info" title="설명" required></textarea>
            </div>
        </div>
        <ul class="btn">
        	<li><button type="submit" title="신규등록">신규등록</button></li>
            <li><button type="button" title="취소" onClick="$('#dialog').remove()">취소</button></li>
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
			en_date = date.getFullYear()+"-"+0+(date.getMonth()+1)+"-"+(date.getDate()+7);
			
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
						link("/admin/sub1");
					}
				}
			});
		}
	});
});
</script>