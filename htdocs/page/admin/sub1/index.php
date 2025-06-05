<?php
access($_SESSION['lv'] == "admin", "접근이 제한된 페이지 입니다.");
?>
<div id="admin">
	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/admin/sub1/file_download_code.php"); ?>
    <div id="btn_control">
    	<div class="download_control">
        	<div id="educate_add_btn"><button type="button" title="강좌추가" id="add_btn" onClick="dialog('강좌추가', '/page/admin/sub1/write.php', '400', '720')">강좌추가</button></div>
            <div id="download_select">
                <select id="download">
                    <option value="txt">TXT</option>
                    <option value="csv">CSV</option>
                    <option value="xml">XML</option>
                </select>
            </div>
            <div id="down_btn"><button type="button" title="다운로드" class="down_btn">다운로드</button></div>
        </div>
    </div>
    <ul class="view_list">
    </ul>
</div>
</div>
<script>
$.ajax({
	type :"POST",
	url :"/page/admin/sub1/list.php",
	success : function(data){
		if(data){
			$(".view_list").html(data);
		} else {
			alert("error");
		}
	}
});
    
function educate_modify(idx){
	$.ajax({
		type : "POST",
		url : "/page/admin/sub1/modify.php",
		data : { idx : idx },
		success : function(data){
			$("<div id='dialog'></div>").dialog({
				title : "강좌 수정",
				modal : true,
				resizable : false,
				width : 400,
				height : 700,
				close : function(){
					$(this).remove();
				}
			}).html(data);
		}
	});
}

$(function(){
	$(".view_list > li > a").hover(function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeIn(200);
	}, function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeOut(200);
	});
	
	$(".down_btn").click(function(){
		var type = $("#download").val();
		
		link('http://localhost/download.php?file='+type+'.'+type);
	});
});
</script>