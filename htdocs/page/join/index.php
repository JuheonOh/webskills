<?php
access(!isset($_SESSION['userid']), "로그아웃 후 이용할 수 있습니다.");
?>
<div class="join_page">
	<form id="join_frm" action="/join/x" method="post" onSubmit="return frmChk(this, 'userid', 'pw', 'username', 'email', 'code');">
    	<div>
        	<input type="hidden" name="action" value="action">
            <input type="hidden" name="action" value="join">
        </div>
        <div class="join_page_area">
            <ul>
            	<li><label for="userid" onClick="javascript:$('input[name=userid]').focus();">아이디</label></li>
	            <li><input type="text" name="userid" title="아이디" id="userid" placeholder="아이디를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="pw" onClick="javascript:$('input[name=pw]').focus();">비밀번호</label></li>
	            <li><input type="password" name="pw" title="비밀번호" id="pw" placeholder="비밀번호를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="username" onClick="javascript:$('input[name=cellular]').focus();">성명</label></li>
	            <li><input type="text" name="username" title="성명" id="username" placeholder="성명를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="email" onClick="javascript:$('input[name=email]').focus();">이메일</label></li>
	            <li><input type="text" name="email" title="이메일" id="email" placeholder="이메일를 입력해주세요."></li>
            </ul>
            <ul style="position:relative;">
            	<li style="width:100px; height:80px; line-height:70px; "><label style="padding:5px;" for="code" onClick="javascript:$('input[name=code]');">자동가입방지</label></li>
                <li style="position:absolute; left:210px; top:0px;"><input style="width:100px;" type="button" title="새로고침" value="새로고침" onClick="document.getElementById('captchaimg').src='/include/captcha.php?'+Math.random();"></li>
                <li style="position:absolute; left:115px; top:5px;"><img src="/include/captcha.php" alt="captchaimg" title="captchaimg" id="captchaimg"></li>
                <li style="position:absolute; left:110px; top:40px;"><input type="text" title="자동가입방지" name="code" id="code" placeholder="자동가입방지를 입력해주세요." ></li>
            </ul>
            <div class="join_page_util">
            	<input type="submit" title="제출하기" value="제출하기">
                <input type="button" title="취소" value="취소" onClick="link('/');">
            </div>
        </ul>
    </form>
</div>