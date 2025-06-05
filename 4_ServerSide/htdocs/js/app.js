/*app.js*/

// link move
function link(url){
	document.location.href = url;
}

// document ready
$(function(){
	$(".deleteBtn").click(function(e){
		e.preventDefault();
			
		if(confirm("정말로 글을 삭제하시겠습니까?")){
			var idx = $(this).data("idx");
			link('include/deleteOk.php?idx='+idx);
		}
	});

	$(".searchBtn").click(function(e){
		if($("#search").val() == ""){
			e.preventDefault();
		}
	});
});