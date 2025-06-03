<div class="join_page">
	<form id="join_frm" action="/join/x" method="post" onSubmit="return frmChk(this, 'userid', 'pw', 'cellular', 'email');">
    	<div>
        	<input type="hidden" name="action" value="insert">
        </div>
        <div class="join_page_area">
            <ul>
            	<li><label for="아이디">아이디</label></li>
	            <li><input type="text" name="userid" title="아이디" id="userid" placeholder="아이디를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="비밀번호">비밀번호</label></li>
	            <li><input type="password" name="pw" title="비밀번호" id="pw" placeholder="비밀번호를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="전화번호">전화번호</label></li>
	            <li><input type="text" name="cellular" title="전화번호" id="cellular" placeholder="전화번호를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="이메일">이메일</label></li>
	            <li><input type="text" name="email" title="이메일" id="email" placeholder="이메일를 입력해주세요."></li>
            </ul>
            <div class="join_page_util">
            	<input type="submit" title="회원가입" value="회원가입">
                <input type="button" title="취소" value="취소" onClick="link('/');">
            </div>
        </ul>
    </form>
</div>