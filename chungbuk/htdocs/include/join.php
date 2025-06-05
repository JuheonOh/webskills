<script>
// 시/도 선택
function city(val){
	$("#district").html('<option value="">시/군/구 선택</option>');
	$.ajax({
		type : "POST",
		cacah : false,
		url : "/include/join_city.php",
		dataType : "JSON",
		success : function(data){
			var cnt = 0;
			var city = "";
			for(key in data){
				var text = $.trim(data[key]);
				if(text == "") continue;
				if(text == "--------------"){
					cnt += 1;
					continue;
				}
				
				if(cnt % 2){
					city = text;
					if(val === undefined) $("#city").append('<option value="'+city+'">'+city+'</option>');
				} else if(city === val){
					$("#district").append('<option value="'+text+'">'+text+'</option>');
				}
			}
		}
	});
}

// 폼 전송
function joinSubmit(frm){
	var bool = frmChk(frm, 'userid', 'pw', 'username', 'city', 'district', 'cellular', 'email');
	
	if(bool){
		$.post(
			"/include/join_ok.php",
			$(frm).serialize(),
			function(data){
				if(data !== ""){
					alert(data);
				} else {
					alert("회원가입이 완료되었습니다.");
					$("#dialog").remove();
				}
			}
		);
	}
	
	return false;
}

$(function(){
	city();
	
	$("#city").change(function(){
		city($(this).val());
	});
});
</script>
<div class="join">
	<form id="join_frm" action="/include/join_ok.php" method="post" onSubmit="return joinSubmit(this);">
    	<ul class="join_box">
        	<li><label for="userid">아이디</label><input type="text" name="userid" id="userid" title="아이디" placeholder="아이디를 입력해주세요."></li>
            <li><label for="pw">비밀번호</label><input type="password" name="pw" id="pw" title="비밀번호" placeholder="비밀번호를 입력해주세요."></li>
            <li><label for="username">이름</label><input type="text" name="username" id="username" title="이름" placeholder="이름을 입력해주세요."></li>
            <li><label for="city">시/도 선택</label><select id="city" title="시/도 선택" name="city"><option value="">시/도 선택</option></select><select id="district" name="district" title="시/군/구 선택"><option value="">시/군/구 선택</option></select></li>
            <li><label for="cellular">휴대폰 번호</label><input type="text" name="cellular" id="cellular" title="휴대폰 번호" value="" placeholder="휴대폰 번호 ex) 000-0000-0000"></li>
            <li><label for="email">이메일</label><input type="text" name="email" id="email" title="전자 우편" value="" placeholder="전자 우편을 입력해주세요. ex)example@example.com"></li>
        </ul>
        <ul class="join_button">
            <li><input type="submit" title="회원가입" value="회원가입"></li>
            <li><input type="button" title="취소" value="취소" onClick="javascript:dialogRemove(this);"></li>
        </ul>
    </form>
</div>