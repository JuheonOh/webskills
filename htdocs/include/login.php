<div id="login">
	<form id="login_frm" method="post" onSubmit="return frmSubmit(this, '/include/login_ok.php', '로그인을 성공했습니다.', '/');">
        <div class="login">
        	<ul>
	            <li><label for="userid"><input type="text" name="userid" title="아이디" id="userid" value="" placeholder="아이디"></label></li>
                <li><label for="pw"><input type="password" name="pw" id="비밀번호" value="" placeholder="비밀번호"></label></li>
            </ul>
            <div class="login_btn"><button type="submit" title="로그인">로그인</button></div>
            <div class="join_btn"><button type="button" title="회원가입">회원가입</button></div>
        </div>
    </form>
</div>
<script>
$(".join_btn button").click(function(){
	$("#dialog").remove();
	dialog('회원가입', '/include/join.php', '500', '620');
});
</script>