<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php"); ?>
<div class="main">
	<div class="login_box">
    	<h3>Members Login</h3>
        <?php if(!isset($_SESSION['userid'])){ ?>
    	<form id="login_frm" action="/" method="post" onSubmit="return frmChk(this, 'userid', 'pw');">
        	<div>
            	<input type="hidden" name="action" value="login">
            </div>
            <ul class="login_box_area">
            	<li><input type="text" name="userid" id="userid" title="아이디" value=""  placeholder="User ID"></li>
                <li><input type="password" name="pw" id="pw" title="비밀번호" value=""  placeholder="Password"></li>
            </ul>
            <ul class="login_box_util">
            	<li><input type="submit" title="로그인" value="LOGIN"></li>
                <li><input type="button" title="회원가입" value="◀ JOIN" onClick="link('/join/x/');"></li>
            </ul>
        </form>
        <?php } else { ?>
        	<ul class="logout_box_area" style="position:relative;">
            	<li><?php echo $_SESSION['userid']; ?>님 환영합니다.</li>
                <li style="position:absolute; right:0; top:90px; line-height:0px;"><a href="/edit/x/" title="회원정보수정">회원정보수정</a></li>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="main5_box">
    	<h3>■ 커뮤니티</h3>
        <p><a href="/main5/x/" title="커뮤나티">+more</a></p>
    	<ul class="main5_box_area">
        	<?php for($i=1; $i<=6; $i++){ ?>
        	<li><a href="/main5/x/" title="커뮤니티">커뮤니티 게시글입니다.</a><span>[2015-04-09]</span></li>
            <?php } ?>
        </ul>
    </div>
    <div class="main3_box">
    	<h3>■ 체험신청</h3>
        <p class="link"><a href="/main3/x/" title="체험신청">바로가기</a></p>
        <p class="date">◀ 2015년 4월 ▶</p>
        <ul class="main3_box_area">
        	<li><a href="/main3/x/" title="체험신청"><img src="/image/main3_img1.png" title="main3_img1" alt="main3_img1"><span>국화 그리기</span></a></li>
            <li><a href="/main3/x/" title="체험신청"><img src="/image/main3_img2.png" title="main3_img2" alt="main3_img2"><span>국화 따기</span></a></li>
            <li><a href="/main3/x/" title="체험신청"><img src="/image/main3_img3.png" title="main3_img3" alt="main3_img3"><span>국화 디자인</span></a></li>
        </ul>
    </div>
    <div class="main1_box">
    	<h3>■ 축제안내</h3>
        <div><a href="/main1/x/" title="축제안내"><img src="/image/img_eventhall_1.jpg" alt="img_eventhall_1" title="img_eventhall_1" width="200" height="130"></a></div>
    </div>
</div>