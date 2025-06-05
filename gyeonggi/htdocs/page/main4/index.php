<div id="main4">
	<p class="tar"><button title="글작성" onClick="link('/main4/write')">글작성</button></p>
    <form id="main4_frm" action="/include/ok.php" method="post" onSubmit="return false;">
    	<table class="table1">
        	<tbody>
            	<tr>
                	<td><label for="main4_search">검색어</label></td>
                    <td><input type="text" id="main4_search" name="search_key" title="검색어" value="" placeholder="검색어를 입력해주세요."></td>
                    <td>
                    	<select id="main4_type" name="type" title="검색조건">
                        	<option value="and">AND</option>
                            <option value="or">OR</option>
						</select>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php if($_SESSION['lv'] == "관리자"){ ?>
    <table class="table2">
    	<colgroup>
        	<col width="30%">
            <col width="60%">
            <col width="10%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>룸 후기 이미지</th>
                <th>룸 후기</th>
                <th>기능</th>
            </tr>
        </thead>
        <tbody id="review_list">
        </tbody>
    </table>
    <?php } else { ?>
    <table class="table2">
        <colgroup>
        	<col width="30%">
            <col width="70%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>룸 후기 이미지</th>
                <th>룸 후기</th>
            </tr>
        </thead>
        <tbody id="review_list">
        </tbody>
    </table>
    <?php } ?>
    <p id="scroll_end" class="tac dn">더 이상 보여줄 후기가 존재하지 않습니다.</p>
</div>
<script>
function ajax(is){
	var key = $("#main4_search").val();
	var type = $("#main4_type").val();
	var len = is === 0 ? 0 : $("#review_list > tr").length;
	
	$.ajax({
		type : "POST",
		url : "/page/main4/list.php",
		data : { key : key, type : type, len : len },
		async : false,
		success : function(data){
			if(data !== ""){
				if(is === 0){
					$("#review_list").html(data);
				} else {
					$("#review_list").append(data);
				}
				$("#scroll_end").hide();
			} else {
				if(is === 0){
					$("#review_list").html('<tr><td colspan="3" class="tac">검색 결과가 존재하지 않습니다.</td></tr>');
				} else {
					$("#scroll_end").show();
				}
			}
		}
	});
}

$(function(){
	ajax(0);
	
	$("#main4_search").keyup(function(){
		ajax(0);
	});
	
	$("#main4_type").change(function(){
		ajax(0);
	});
	
	$(window).scroll(function(){
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		if(((scrollHeight - scrollPosition) / scrollHeight) === 0){
			ajax(1);
		}
	});
});

function del(self, idx){
	$.post(
		"/page/main4/delete.php",
		{ idx : idx },
		function(data){
			alert("후기가 삭제되었습니다.");
			$(".table2 tbody > tr").remove();
			if($(".table2 tbody tr").length == 0){
				$("#review_list  tr").html('<tr><td colspan="3" class="tac">검색 결과가 존재하지 않습니다.</td></tr>');
			}
		}
	);
}
</script>