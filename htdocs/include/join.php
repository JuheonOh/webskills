<div id="dialog-join">
	<form id="dialog-join-frm" onSubmit="return frmSubmit(this, '/include/join-ok.php', '회원가입이 완료되었습니다.');">
    	<div class="dialog-join-box">
        	<ul>
            	<li><label for="dialog-userid">아이디</label></li>
                <li><input type="text" name="userid" id="dialog-userid" title="아이디" value="" placeholder="아이디" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-pw">비밀번호</label></li>
                <li><input type="password" name="pw" id="dialog-pw" title="비밀번호" value="" placeholder="비밀번호" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-cellular">전화번호</label></li>
                <li><input type="text" name="cellular" id="dialog-cellular" title="전화번호" value="" placeholder="전화번호" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-email">이메일</label></li>
                <li><input type="text" name="email" id="dialog-email" title="이메일" value="" placeholder="이메일" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-captcha">자동가입방지</label></li>
                <li class="captcha">
                	<input type="text" name="captcha" id="dialog-captcha" title="자동가입방지" value="" placeholder="자동가입방지" required>
                    <img src="/include/captcha.php" title="captcha" alt="captcha" id="captcha">
                    <input type="button" title="새로고침" value="새로고침" onClick="document.getElementById('captcha').src = '/include/captcha.php?'+Math.random();">
                </li>
            </ul>
        </div>
        <div class="dialog-join-confirm"><input type="submit" title="회원가입" value="회원가입"></div>
    </form>
</div>