<script>
function loginSubmit(frm){
	var bool = frmChk(frm, 'userid', 'pw');
	
	if(bool){
		$.ajax({
			type : "POST",
			url : "/include/login_ok.php",
			data : $(frm).serialize(),
			async : false,
			success : function(data){
				if(data !== ""){
					alert(data);
				} else {
					alert("로그인 되었습니다.");
					link("/");
				}
			}
		});
	}
	
	return false;
}
</script>
<div class="login">
    <form id="login_frm" action="/include/login_ok.php" method="post" onSubmit="return loginSubmit(this);">
        <ul class="login_box">
        	<li><label for="userid"><input type="text" name="userid" id="userid" title="아이디" placeholder="아이디"></label></li>
            <li><label for="pw"><input type="password" name="pw" id="pw" title="비밀번호" placeholder="비밀번호"></label></li>
        </ul>
        <div class="submit"><input type="submit" title="로그인" value="로그인"></div>
    </form>
</div>