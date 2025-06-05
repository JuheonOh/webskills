<div id="main4">
	<?php if($_SESSION['lv'] == "admin"){ ?>
    <div class="write_btn"><button type="button" title="글쓰기" onClick="dialog('글쓰기', '/page/main4/sub1/write.php', '500', '450')">글쓰기</button></div>
    <?php } ?>
    <table class="table">
    	<colgroup>
        	<col width="10%">
            <col width="45%">
            <col width="25%">
            <col width="20%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>연번</th>
                <th>제목</th>
                <th>작성자</th>
                <th>날짜</th>
            </tr>
        </thead>
        <tbody class="ajax">
        </tbody>
    </table>
    <p class="no_have">글이 존재하지 않습니다.</p>
</div>
<script>
$(function(){
	var first_limit = 0;
	
	$.ajax({
		type : "POST",
		url : "/page/main4/sub1/list.php",
		data : { line : first_limit },
		success : function(data){
			$(".ajax").html(data);
			first_limit += 5;
			if(data == "") $(".no_have").show();
		}
	});
	
	$(window).scroll(function(){
		if($(document).height() <= $(window).scrollTop() + $(window).height()){
			$.ajax({
				type : "POST",
				url : "/page/main4/sub1/list.php",
				data : { line : first_limit },
				success : function(data){
					$(".ajax").append(data);
					first_limit += 5;
					if(data == ""){
						$(".no_have").text("글이 더이상 존재하지 않습니다.");
						$(".no_have").show();
					}
				}
			});
		}
	});

	$(".ajax").on("click", ".list_title", function(){
		var self = $(this);
		var idx = $(this).data("idx");
		
		$.ajax({
			type : "POST",
			url : "/page/main4/sub1/view.php",
			data : { idx : idx },
			success : function(data){
				$(".view_tr").remove();
				$(self).parent().parent().after(data);
			}
		});
	});
});
</script>