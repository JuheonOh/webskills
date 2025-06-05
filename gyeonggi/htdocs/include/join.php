<div class="join">
	<form id="join_frm" action="#" method="post" onSubmit="return frmChk(this, 'userid', 'pw', 'username');">
    	<div>
        	<input type="hidden" name="action" value="insert">
            <input type="hidden" name="table" value="member">
        </div>
        <ul class="join_box">
        	<li><label for="userid">아이디</label><input type="text" name="userid" id="userid" title="아이디" placeholder="아이디를 입력해주세요."></li>
            <li><label for="pw">비밀번호</label><input type="password" name="pw" id="pw" title="비밀번호" placeholder="비밀번호를 입력해주세요."></li>
            <li><label for="username">이름</label><input type="text" name="username" id="username" title="이름" placeholder="이름을 입력해주세요."></li>
        </ul>
        <ul class="join_button">
            <li><input type="submit" title="회원가입" value="회원가입"></li>
            <li><input type="button" title="취소" value="취소" onClick="javascript:dialogRemove(this);"></li>
        </ul>
    </form>
</div>