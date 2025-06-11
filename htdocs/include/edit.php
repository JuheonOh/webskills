<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<div id="dialog-edit">
	<form id="dialog-edit-frm" onSubmit="return frmSubmit(this, '/include/edit-ok.php', '회원정보 수정이 완료되었습니다.');">
    	<div class="dialog-edit-box">
        	<ul>
            	<li><label for="dialog-userid">아이디</label></li>
                <li><input type="text" name="userid" id="dialog-userid" title="아이디" value="<?php echo $_SESSION['userid']; ?>" placeholder="아이디" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-pw">비밀번호</label></li>
                <li><input type="password" name="pw" id="dialog-pw" title="비밀번호" value="" placeholder="비밀번호" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-cellular">전화번호</label></li>
                <li><input type="text" name="cellular" id="dialog-cellular" title="전화번호" value="<?php echo $_SESSION['cellular']; ?>" placeholder="전화번호" required></li>
            </ul>
        	<ul>
            	<li><label for="dialog-email">이메일</label></li>
                <li><input type="text" name="email" id="dialog-email" title="이메일" value="<?php echo $_SESSION['email']; ?>" placeholder="이메일" required></li>
            </ul>
        </div>
        <div class="dialog-edit-confirm"><input type="submit" title="회원정보 수정" value="회원정보 수정"></div>
    </form>
</div>