// 글자 크기 조절
var size = 100;
function zoom(n){
	var txtArea = document.getElementById("text_content");
	size = n == 100 ? 100 : size + n;
	txtArea.style.fontSize = size + "%";
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
				if(obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
			break;
		}
		return msg;
	}
	
	var isok = new Array();
	var arg;
	var argLen = arguments.length-1;
	
	
	for(var i = argLen; i >= 1; i--){
		arg = arguments[i];
		isok[frm] = regChk(frm[arg]);
		
		if(isok[frm]){
			frm[arg].style.backgroundColor = "#FCC";
			frm[arg].style.border = "1px solid #F00";
			frm[arg].style.color = "#333";
			frm[arg].focus();
		} else {
			frm[arg].style.backgroundColor = "#FFF";
			frm[arg].style.border = "1px solid #999";
		}
	}
	
	for(var i = 1; i <= argLen; i++){
		arg = arguments[i];
		if(isok[frm]){
			alert(isok[frm]);
		}
	}
	
	if(frm.id == "join_frm"){
		$.post(
			"/include/idcheck.php",
			$(frm).serialize(),
			function(data){
				if(data){
					alert(data);
				} else {
					alert("회원가입이 완료되었습니다.");
					link('/');
				}
			}
		);
		return false;
	}
	return true;
}