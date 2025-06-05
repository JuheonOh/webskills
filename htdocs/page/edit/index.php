<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
access(isset($_SESSION['userid']));
?>
<div class="join_page">
	<form id="edit_frm" action="/edit/x" method="post" onSubmit="return frmChk(this, 'userid', 'pw', 'username', 'email');">
    	<div>
        	<input type="hidden" name="action" value="edit">
        </div>
        <div class="join_page_area">
            <ul>
            	<li><label for="userid" onClick="javascript:$('input[name=userid]').focus();">아이디</label></li>
	            <li><input type="text" name="userid" title="아이디" id="userid" value="<?php echo $_SESSION['userid']; ?>" readonly onClick="alert('아이디는 변경 할 수 없습니다.');" placeholder="아이디를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="pw" onClick="javascript:$('input[name=pw]').focus();">비밀번호</label></li>
	            <li><input type="password" name="pw" title="비밀번호" id="pw" value="" placeholder="비밀번호를 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="username" onClick="javascript:$('input[name=cellular]').focus();">성명</label></li>
	            <li><input type="text" name="username" title="성명" id="username" value="<?php echo $_SESSION['username']; ?>" placeholder="성명을 입력해주세요."></li>
            </ul>
            <ul>
            	<li><label for="email" onClick="javascript:$('input[name=email]').focus();">이메일</label></li>
	            <li><input type="text" name="email" title="이메일" id="email" value="<?php echo $_SESSION['email']; ?>" placeholder="이메일를 입력해주세요."></li>
            </ul>
            <div class="join_page_util" style="margin-top:20px;">
            	<input type="submit" title="수정" value="수정">
                <input type="button" title="취소" value="취소" onClick="link('/');">
            </div>
        </ul>
    </form>
</div>