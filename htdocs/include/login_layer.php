<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php"); ?>
<?php if(!isset($_SESSION['userid'])){ ?>
<form action="/" method="post" onSubmit="return frmChk(this, 'userid', 'pw');">
	<div>
    	<input type="hidden" name="action" value="login">
    </div>
    <ul class="login_box">
    	<li><input type="text" id="userid" name="userid" title="아이디" placeholder="아이디"></li>
        <li><input type="password" id="pw" name="pw" title="비밀번호" placeholder="비밀번호"></li>
        <li><input type="submit" title="로그인" value="login"></li>
        <li><input type="button" title="회원가입" value="join" onClick="javascript:join_open('회원가입');"></li>
    </ul>
</form>
<?php } else { ?>
<ul class="logout_box">
	<li><?php echo $_SESSION['userid']; ?> 님 환영합니다.</li>
    <li><a href="/include/logout.php" title="로그아웃">logout</a></li>
</ul>
<?php } ?>