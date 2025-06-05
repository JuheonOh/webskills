// 글자 크기 조절
var size = 100;
function zoom(n){
	var textArea = document.getElementById("text_content");
	size = n == 100 ? 100 : size + n;
	textArea.style.fontSize = size + "%";
}

// link 
function link(url){
	document.location.href = url;
}

// 폼 체크
function frmChk(frm){
	function regChk(obj){
		var msg = false;
		var reg;
		
		switch(obj.name){
			default : 
				if(obj.value.length == 0) msg = obj.title + "(을)를 입력해주세요.";
			break;
		}
		return msg;
	}
	
	var is0k = new Array();
	var arg;
	var argLen = arguments.length -1;
	
	for(var i = argLen; i >= 1; i--){
		arg = arguments[i];
		is0k[arg] = regChk(frm[arg]);
		
		if(is0k[arg]){
			frm[arg].style.backgroundColor = "#FCC";
			frm[arg].style.border = "1px solid #f00";
			frm[arg].style.color = "#333";
			frm[arg].focus();
		} else {
			frm[arg].style.backgroundColor = "#FFF";
			frm[arg].style.border = "1px solid #999";
			frm[arg].style.color = "#333";
		}
	}
	
	for(var i = 1; i <= argLen; i++){
		arg = arguments[i];
		if(is0k[arg]){
			alert(is0k[arg]);
			return false;
		}
	}
	
	if(frm.id == "join_frm"){
		$.post(
			"/include/ajax_ok.php",
			$(frm).serialize(),
			function(data){
				if(data){
					alert(data);
				} else {
					alert("회원가입이 완료되었습니다.");
					link("/");
				}
			}
		);
		return false;
	}
	return true;
}

/* 폼 전송 */
function frmSubmit(frm, idx){
	var frm = document.forms[frm];
	frm.idx.value = idx;
	frm.submit();
}

// 회원가입 다이얼로그
function join_open(title){
	$("<div title="+title+"></div>").dialog({
		modal : true,
		width : 800,
		close : function(){
			$(this).remove();
		}
	}).load("/page/default/join/index.php");
}

// Back To Top
function backtotop(){
	window.scrollTo(0,0);
}

// 차량 예약 목록 삭제
function main3delete(self, midx){
	var self = $(self);
	$.post(
		"/page/main3/sub2/delete.php",
		{ midx : midx },
		function(data){
			self.parent().parent().remove();
			if($(".main3sub2").children("tr").length === 0){
				$(".main3sub2").append('<tr><td colspan="7" class="tac" style="line-height:70px; font-size:1.1em; border-bottom:1px solid #999;">예약된 차량이 존재하지 않습니다.</td></tr>');
			}
		}
	)
}

// 슬라이드 애니메이션
$(document).ready(function(){
    // 변수 초기화
	var slide = $("#slide");
	var slides = $("#slide > li");
	var slideCount = slides.length;
	var slideWidth = slides.width();
	var slideUIWidth = slideCount * slideWidth;
	var slideCurrent = 0;
	
	// 초기 세팅
	$("#slide").css({ width : slideUIWidth });
	var html = '<li><a href="javascript:void(0);" title="이전" id="slide_prev">◀</a></li>';
	for(var i = 1; i <= slideCount; i++){
		html += '<li class="slide_number"><a href="javascript:void(0);" title="'+i+'" class="slide_number">●</a></li>';
	}
	html += '<li><a href="javascript:void(0);" title="다음" id="slide_next">▶</a></li>';
	$("#slide_control").html(html);
	
	// 슬라이드 스위치
	var slider = {
		on : function(){
			this.slideTimer = setInterval(function(){
				animation('next');
			}, 3000);
		},
		off : function(){
			clearInterval(this.slideTimer);
		}
	}
	
	// 슬라이드 효과
	function animation(type){
		$("#slide").stop();
		
		// slide.stop();
		switch(type){
			case 'next' :
				slideCurrent++
			break;
			case 'prev' :
				slideCurrent--
			break;
		}
		
		if(slideCurrent === -1){
			slideCurrent = slideCount-1;
		} else {
			slideCurrent = slideCurrent % slideCount;
		}
		
		var left = -slideWidth * slideCurrent;
		
		slide.animate(
			{ "left" : left }, 1000,
			function(){
				$(".slide_number > a").css({"color" : "#FFF"});
				$(".slide_number > a").eq(slideCurrent).css({"color" : "#F00"});
			}
		);
	}
	
	// 슬라이드 컨트롤
	$("#slide_next").click(function(){
		slider.off();
		animation("next");
		slider.on();
	});
	
	$("#slide_prev").click(function(){
		slider.off();
		animation("prev");
		slider.on();
	});
	
	$(".slide_number").click(function(){
		slider.off();
		var destination = $(this).index() - 1;
		if(slideCurrent < destination){
			slideCurrent = destination - 1;
			animation('next');
		} else if(slideCurrent > destination){
			slideCurrent = destination + 1;
			animation('prev');
		}
		slider.on();
	});
	
	// 슬라이드 시작
	animation("next");
	slider.on();
});