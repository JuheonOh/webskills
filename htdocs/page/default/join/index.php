<div class="join">
	<form id="join_frm" action="/" method="post" onSubmit="return frmChk(this, 'userid', 'pw', 'cellular', 'email');">
    	<div>
        	<input type="hidden" name="action" value="insert">
            <input type="hidden" name="table" value="member">
        </div>
        <ul>
        	<li><label for="userid">아이디</label></li>
            <li><input type="text" name="userid" id="userid" title="아이디" placeholder="아이디(을)를 입력해주세요."></li>
        </ul>
        <ul>
        	<li><label for="pw">비밀번호</label></li>
            <li><input type="password" name="pw" id="pw" title="비밀번호" placeholder="비밀번호(을)를 입력해주세요."></li>
        </ul>
        <ul>
        	<li><label for="cellular">전화번호</label></li>
            <li><input type="text" name="cellular" id="cellular" title="전화번호" placeholder="전화번호(을)를 입력해주세요."></li>
        </ul>
        <ul>
        	<li><label for="email">이메일</label></li>
            <li><input type="text" name="email" id="email" title="이메일" placeholder="이메일(을)를 입력해주세요."></li>
        </ul>
        <div><input type="submit" title="회원가입" value="회원가입"></div>
    </form>
</div>