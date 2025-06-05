// 글자 크기 조절
var size = 100;
function zoom(n){
	size = n == 100 ? 100 : size + n;
	$("#text_content").css({ "font-size" : size+"%" });
}


// link
function link(url){
	document.location.href = url;
}

// educate
function educate(idx){
	$.ajax({
		type : "POST",
		url : "/page/main2/sub1/educate.php",
		data : { idx : idx },
		success : function(data){
			$("<div id='dialog'></div>").dialog({
				title : "수강신청",
				modal : true,
				resizable : false,
				width : 400,
				height : 650, 
				close : function(){
					$(this).remove();
				}
			}).html(data);
		}
	});
}

// 다이얼로그
function dialog(title, url, width, height){
	$.ajax({
		type : "POST",
		url : url,
		success : function(data){
			$("<div id='dialog'></div>").dialog({
				title : title,
				modal : true,
				resizable : false,
				width : width,
				height: height,
				close : function(){
					$(this).remove();
				}
			}).html(data);
		}
	});
}

// 폼 전송
function frmSubmit(frm, url, msg, move){
	$.ajax({
		type : "POST",
		url : url,
		data : $(frm).serialize(),
		success : function(data){
			if(data){
				alert(data);
			} else {
				if(msg != '') alert(msg);
				if(move != '') link(move);
			}
		}
	});
	
	return false;
}

// 애니메이션
var cut = 0;
var btn = {
	on : function(){
		this.timer = setInterval(function(){
			animation('next');
		}, 500);
	},
	off : function(){
		clearInterval(this.timer);
	}
}

function animation(type){
	$("#slide").stop();
	btn.off();
	
	switch(type){
		case 'next':
			cut = cut == $("#slide li").eq(-1).index() ? $("#slide li").eq(0).index() : cut + 1;
		break;
		case 'prev':
			cut = cut == $("#slide li").eq(0).index() ? $("#slide li").eq(-1).index() : cut - 1;
		break;
		default : 
			cut = type;
		break;
	}
	
	var left = (-100 * cut) + "%";
	
	$("#slide").animate({ "margin-left" : left }, 500, function(){
		$("#slide_btn > li").css({ "background-color" : "#bfbfbf" });
		$("#slide_btn > li").eq(cut).css({ "background-color" : "#09f" });
		btn.on();
	});
}

$(function(){
	var slideLength = $("#slide li").length;
	for(var i = 0; i < slideLength; i++){
		$("#slide_btn").append("<li onclick='animation("+i+")'></li>");
	}
	$("#slide").css({ "width" : 100 * slideLength+"%" });
	$("#slide li").css({ "width" : 100 / slideLength+"%" });
	
	animation('next');
	
	$(".main_view > li > a").hover(function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeIn(200);
	}, function(){
		$(this).find(".details").stop();
		$(this).find(".details").fadeOut(200);
	});
	
	$(".menu > li:nth-child(3)").hover(function(){
		$(this).children("ul").show();
	}, function(){
		$(".menu > li:not(:nth-child(3))").hover(function(){
			$(".menu > li:nth-child(3)").children("ul").hide();
		});
	});
	
	$(".menu > li:nth-child(3) a").focus(function(){
		$(this).parent().children("ul").show();
	});
	
	$(".menu > li:nth-child(3) > ul > li:last-child > a").blur(function(){
		$(".menu > li:nth-child(3) > ul").hide();
	});
	
	$(".menu > li").css({ "width" : 100 / $(".menu > li").length + "%" });
});