<div id="dialog-login">
	<form id="dialog-login-frm" onSubmit="return frmSubmit(this, '/include/login-ok.php', '로그인이 완료되었습니다.');">
    	<ul class="dialog-login-box">
        	<li><label for="dialog-userid"><input type="text" name="userid" id="dialog-userid" title="아이디" value="" placeholder="아이디" required></label></li>
            <li><label for="dialog-pw"><input type="password" name="pw" id="dialog-pw" title="비밀번호" value="" placeholder="비밀번호" required></label></li>
        </ul>
        <div class="dialog-login-confirm"><input type="submit" title="로그인" value="로그인"></div>
    </form>
</div>