<div id="main2">
    <ul class="view_list">
    </ul>
</div>
<script>
$.ajax({
	type :"POST",
	url :"/page/main2/sub1/list.php",
	success : function(data){
		if(data){
			$(".view_list").html(data);
		} else {
			alert("error");
		}
	}
});

$(function(){
	$(".view_list > li > a").hover(function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeIn(200);
	}, function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeOut(200);
	});
});
</script>3