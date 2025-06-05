// 글자 크기 조절
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

// 팝업창
function dialog(title, where, xsize, ysize){
	$("<div title="+title+"></div>").dialog({
		modal : true,
		resizable : false,
		width : xsize,
		height : ysize,
		close : function(){
			$(this).remove();
		}
	}).load(where);
}

function menuType(type){
	if(typeof(Storage) !== "undefined") {
		localStorage.setItem("menu", type);
	} else {
		alert("스토리지 지원을 하지 않습니다.");
	}
}

// 폼 체크
function frmChk(frm){
	function regChk(obj){
		var msg = false;
		var reg;
		
		switch(obj.name){
			case 'userid' :
				if(obj.id == "join_userid"){
					reg = RegExp(/^[a-zA-Z0-9]+$/);
					if(reg.test(obj.value) === false) msg = obj.title + "을(를) 영문과 숫자로만 입력해주세요.";
				} else {
					if(obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
				}
			break;
			case 'check' :
				if(!obj.checked) msg = "개인 정보 수집에 동의해 주세요.";
			break;
			case 'tel' :
				reg = RegExp(/^([0-9]{4})-([0-9]{4})-([0-9]{4})$/);
				if(!reg.test(obj.value)) msg = obj.title + "을(를) 0000-0000-0000 형식으로 입력해주세요.";
			break;
			case 'food_name' :
				if(obj.value.length > 49 ) msg = obj.title + "을(50)자 이내로 입력해주세요.";
				if(obj.value.length === 0) msg = obj.title + "을(를) 입력해주세요.";
			break;
			case 'pw' :
			case 'pw_check' : 
				if(obj.id == "join_pw" || obj.id == "join_pw_check"){
					reg = RegExp(/^[a-zA-Z0-9\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"$]+/);
					if(reg.test(obj.value) === false) msg = obj.title + "을(를) 영문과 숫자, 그리고 특수문자만 입력해주세요.";
				} else {
					if(obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
				}
			break;
			break;
			default :
				if(obj.id === "main3sub1_name"){
					reg = RegExp(/^[가-힣]+$/);
					if(!reg.test(obj.value)) msg = obj.title + "을(를) 한글로만 입력해주세요.";
				}
				
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
			frm[arg].style.border= "1px solid #aaa";
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
	
	if(frm.id == "login_frm"){
		$.post(
			"/include/member_ok.php",
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

/* 주문 현황판 */
function dashboard(){
	window.open("/page/main4/sub1/index.php", "주문 현황판", "width=1024, height=768, toolbar=no, menubar=no, scrollbars=no, resizable=no");
}

/* 카드 */
function card(frm){
	var ko_name = frm['ko_name'].value.replace(/\s/gi, "");
	var en_name = frm['en_name'].value
	
	var ko_name_chk = ko_name.replace(/\s/gi, "");
	var en_name_chk = en_name.replace(/\s/gi, "");
	
	if(ko_name_chk.length <= 0){
		alert("한글이름을 입력해주세요.");
		return false;
	} else if(!RegExp(/^[가-힣]+$/).test(ko_name_chk)){
		alert("완성된 한글 단어로만 입력해주세요.");
		return false;
	}
	
	if(en_name_chk.length <= 0){
		alert("영문이름을 입력해주세요.");
		return false;
	} else if(!RegExp(/^[a-zA-Z]+$/).test(en_name_chk)){
		alert("영어로만 입력해주세요.");
		return false;
	}
	
	function cardNumber(){
		function rd(){
			var chars = "0123456789";
			var result = "";
			for(var i = 0; i < 4; i++){
				var rd = Math.floor(Math.random() * chars.length);
				result += chars.substring(rd, rd+1);
			}
			return result;
		}
		return rd()+" "+rd()+" "+rd()+" "+rd();
	}
	$("#card_number").html(cardNumber());
	$("#card_ko_name").html(ko_name);
	$("#card_en_name").html("("+en_name+")");
	return false;
}

/* xml Load */
function getXmlList(){
	var menuList = new Array();
	
	$.ajax({
		type : "GET",
		dataType : "xml",
		url : "/data/xml/menu.xml",
		async : false,
		success : function(xml){
			
			/* 종류(구분) */
			var kinds = $(xml).find("kind");
			var kindArray = {};
			kinds.each(function(){
				var kind = $(this);
				kindArray[kind.attr("code")] = kind.text();
			});
			
			/* 데이터 조회 */
			var menus = $(xml).find("menu");
			menus.each(function(){
				var menu = $(this);
				var menuInfo = {
					kind : menu.attr("kind"),
					kindName : kindArray[menu.attr("kind")],
					menuCode : menu.attr("menuCode"),
					name : menu.find("name").text(),
					orderQy : parseInt(menu.find("orderQy").text(), 10),
					imgWidth : menu.find("img").attr("width"),
					imgHeight : menu.find("img").attr("height"),
					imgType : menu.find("img").attr("type"),
					imgContents : menu.find("imgContents").text()
				};
				menuList.push(menuInfo);
			});
		}
	});
	
	return menuList;
}

/* 예약 */
function main3sub1frm(frm){
	var bool = frmChk(frm, 'name', 'tel', 'number', 'redate', 'time', 'minute', 'check');
	if(bool){
		if($(".main3sub1_tbody > tr").length == 0){
			alert("메뉴를 적어도 한개이상 선택해주세요.");
			return false;
		}
	}
	return bool;
}