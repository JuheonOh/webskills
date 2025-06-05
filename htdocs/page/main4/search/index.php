<script>
$(document).ready(function(){
    // Get Local
	var getLocal = localStorage.getItem("search") !== null ? JSON.parse(localStorage.getItem("search")) : [];
	
	// Variable Reset
	var searchTable = $("#search_table");
	var key = getLocal[0] !== undefined ? getLocal[0] : $("#search_key").val();
	var line = getLocal[1] !== undefined ? getLocal[1] - 5 : 0;
	var scroll_ = getLocal[2] !== undefined ? getLocal[2] : $(window).scrollTop();
	
	// Search List
	function searchList(first){
		$.post(
			"/page/main4/search/list.php",
			{ key : key, line : line },
			function(data){
				searchTable.html(data);
				if(first){
					$(window).scrollTop(scroll_);
					line = $("#search_table > table > tbody > tr:last-child").index();
				} else {
					line = $("#search_table > table > tbody > tr:last-child").index();
					// line = $("#search_table > ul:last-child").index();
					searchSave();
				}
			}
		);
	}
	
	// Search Key
	$("#search_key").keyup(function(){
		key = $("#search_key").val();
		line = 0;
		searchList();
	});
	
	// Scroll Function
	$(window).scroll(function(){
		var end = $(document).height() === $(window).scrollTop() + $(window).height();
		if(end){
			searchList();
		} else {
			scroll_ = $(window).scrollTop();
			searchSave();
		}
	});
	
	// Storage Save
	function searchSave(){
		var arr = [key, line, scroll_];
		localStorage.setitem("search", JSON.stringify(arr));
	}
	
	$("#search_key").val(key);
	searchList("true");
});
</script>
<div class="search">
	<form action="/main4/search" method="post" onSubmit="return false;">
    	<ul>
        	<li><input type="text" name="search_key" id="search_key" title="키워드" value="" placeholder="검색어를 입력해주세요."></li>
        </ul>
    </form>
</div>
<p class="tt searchresult">■ 검색 결과</p>
<div class="table" id="search_table"></div>
<div class="end_title">모든 결과가 출력되었습니다.</div>