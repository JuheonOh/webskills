// 글자 크기 조절
var size = 100;
function zoom(n){
	var textArea = $("#text-content");
	size = (n == 100) ? 100 : size + n;
	/*
	if(n == 100){
		size = 100;
	} else {
		size += n;
	}
	*/
	textArea.css({ "fontSize" : size + "%" });
}

// 링크 이동
function link(url){
	document.location.href = url;
}

// 다이얼로그
function dialog(title, where){
	$.ajax({
		type : "POST",
		url : where,
		success : function(data){
			$("<div title="+title+"></div>").html(data).dialog({
				modal : true,
				resizable : false,
				width : "auto",
				height : "auto",
				close : function(){
					$(this).remove();
				}
			});
		},
		error : function(){
			alert("파일의 경로를 찾을 수 없습니다.");
		}
	});
}

// 애니메이션
var cut = 0;
var btn = {
	on : function(){
		this.timer = setInterval(function(){
			animation('next');
		}, 5500);
	},
	off : function(){
		clearInterval(this.timer);
	}
}

// 애니메이션 종료
function animation(type){
	$("#slide").stop();
	btn.off();
	
	switch(type){
		case 'next' :
			cut = cut == 2 ? 0 : cut+1;
		break;
		case 'prev' :
			cut = cut == 0 ? 2 : cut-1;
		break;
		default :
			cut = type;
		break;
	}
	
	var left = (-100 * cut) + "%";
	
	$("#slide").animate({ "margin-left" : left }, 500, function(){
		$("#slide-btn > li").css({ "background-color" : "#aaa" });
		$("#slide-btn > li").eq(cut).css({ "background-color" : "#ff5900" });
		btn.on();
	});
}

function frmSubmit(frm, where, msg, move){
	
	$.ajax({
		type : "POST",
		url : where,
		data : $(frm).serialize(),
		success : function(data){
			if(data){
				alert(data);
			} else {
				alert(msg);
				if(move == null){
					link("/");
				} else {
					link(move);
				}
			}
		}
	});
	
	return false;
}

$(function(){
	animation('next');
});