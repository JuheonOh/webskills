/* 글자 크기 조절 */
var size = 100;
function zoom(n){
	var textArea = document.getElementById("text_content");
	size = n == 100 ? 100 : size + n;
	textArea.style.fontSize = size + "%";
}

// Link
function link(url){
	document.location.href = url;
}

/* 폼 체크 */
function frmChk(frm){
	function regChk(obj){
		var msg = false;
		var reg;
		
		switch(obj.name){
			case 'userid' :
				if(frm.id == "join_frm"){
					var m = obj.value.match(/[a-z]/g);
					if(m !== null && m.length >= 4) break;
					msg = obj.title + "을(를) 영소문자 4글자 이상 입력해주세요.";
				} else {
					if(obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
				}
			break;
			default :
				if(obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
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
		 
		if(!is0k[arg]){
			frm[arg].style.backgroundColor = "#FFF";
			frm[arg].style.border = "1px solid #aaa";
			frm[arg].style.color = "#000";
		} else {
			frm[arg].style.backgroundColor = "#FCC";
			frm[arg].style.border = "1px solid #f00";
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
	
	switch(frm.id){
		case 'login_frm' :
			$.post(
				"/include/ajax_ok.php",
				$(frm).serialize(),
				function(data){
					if(data){
						alert(data);
					} else {
						alert("로그인 되었습니다.");
						link("/");
					}
				}
			);
			return false;
		break;
		case 'join_frm' :
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
		break;
		case 'main4_del' :
			$.post(
				"/include/delete.php",
				$(frm).serialize(),
				function(data){
					if(data){
						alert(data);
					} else {
						alert("삭제되었습니다.");
						link("/main4");
					}
				}
			);
		break;
		default : 
			return true;
		break;
	}
	return true;
}

// 다이얼로그
function dialog(title, src, width, height){
	$("<div id=\"dialog\" title="+title+"></div>").dialog({
		modal : true,
		resizable : false,
		width : width,
		height : height,
		close : function(){
			$(this).remove();
		}
	}).load(src);
}

// 다이얼로그 닫기
function dialogRemove(who){
	$("#dialog").remove();
}

//	페이지 새창으로 열기
function window_open(url, title){
	window.open(url, title);
}

/* 클립보드로 복사 후 저작권 표시 */
function copyRight(){
	var copyrightText = "\r\n\r\n\r\n[출처] - 맛과 분위기가 살아있는 최고의 레스토랑 Quiabiero";

	if(navigator.clipboard){
		navigator.clipboard.readText().then((originalText) => {
			var outputText = originalText + copyrightText;
			navigator.clipboard.writeText(outputText);
		});
	} else {
		alert("이 브라우저에서는 클립보드 기능이 지원되지 않습니다.")
	}
}

/* 메뉴 목록 */
function menuList(){
	var menuList = new Array();
	
	$.ajax({
		url : "/data/xml/foodlist.xml",
		dataType : "xml",
		async : false,
		success : function(xml){
			/* 데이터 조회 */
			var menus = $(xml).find("food");
			menus.each(function(){
				var menu = $(this);
				var menuinfo = {
					title : menu.find("title").text(),
					description : menu.find("description").text(),
					image : menu.find("image").text(),
					type : menu.find("type").text(),
					cost : parseInt(menu.find("cost").text(), 10)
				};
				menuList.push(menuinfo);
			});
		}
	});
	
	return menuList;
}

/* 룸 목록 */
function roomList(){
	var roomList = new Array();
	
	$.ajax({
		url : "/data/xml/roomlist.xml",
		dataType : "xml",
		async : false,
		success : function(xml){
			// 데이터 조회
			var rooms = $(xml).find("room");
			rooms.each(function(){
				var room = $(this);
				var roominfo = {
					image : room.find("image").text(),
					title : room.find("title").text(),
					cleanday : room.find("cleanday").text(),
					cost : parseInt(room.find("cost").text().replace("원", ""), 10)
				}
				roomList.push(roominfo);
			});
		}
	});
	
	return roomList;
}

var cut = 0;
// 슬라이드 버튼
var btn = {
	on : function(){
		this.timer = setInterval(function(){
			animation('next');
		}, 3000);
	},
	off : function(){
		clearInterval(this.timer);
	}
}

// 슬라이드 종료
function animation(type){
	$("#slide").stop();
	btn.off();
	
	switch(type){
		case 'next' : 
			cut = cut === 2 ? 0 : cut+1;
		break;
		case 'prev' :
			cut = cut === 0 ? 2 : cut-1;
		break;
		default :
			cut = type;
		break;
	}
	
	var left = (-100 * cut)+ "%";
	
	$("#slide").animate( { "margin-left" : left }, 1000, function(){
			$("#slide_btn > li").css({ "border-radius" : "100%" , "background-color" : "#aaa" });
			$("#slide_btn > li").eq(cut).css({ "border-radius" : "0" ,"background-color" : "#e10701" });
			btn.on();
		}
	)
	
}

$(function(){
	// 텍스트 복사
	$("body").on("copy", function(){
		setTimeout(copyRight, 25);
	});
	
	animation("next");
	
});