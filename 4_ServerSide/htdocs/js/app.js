// JavaScript Documen
$(function(){
	$("#number").change(function(){
		$(".hotel-view").find("td").not(".bg-primary").attr("class","");
		var num = $("#number").val();
		for(var f = 0; f < num.length; f++){
			$(".hotel-view").find("td:contains("+num[f]+")").addClass("bg-info");
		}
	});
});

function frmSubmit(frm, url, msg = "", move = ""){
	$.ajax({
		type : "POST",
		url : url,
		data : $(frm).serialize(),
		success : function(data){
			if(data){
				alert(data);
			} else {
				if(msg != "") alert(msg);
				if(move != "") link(move);
			}
		}
	});

	return false;
}

function link(url){
	document.location.href = url;
}