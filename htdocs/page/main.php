<div id="main">
	<?php if(!isset($_SESSION['userid'])){ ?>
	<div class="content-box-1-1">
    	<h3 class="main-title"><span class="circle"></span>회원 로그인</h3>
    	<form id="login-frm" onSubmit="return frmSubmit(this, '/include/login-ok.php', '로그인이 완료되었습니다.');">
        	<ul class="login-box">
            	<li><label for="userid"><input type="text" id="userid" name="userid" title="아이디" value="" placeholder="아이디" required></label></li>
                <li><label for="pw"><input type="password" id="pw" name="pw" title="비밀번호" value="" placeholder="비밀번호" required></label></li>
            </ul>
            <div class="login-confirm"><input type="submit" title="로그인" value="로그인"></div>
            <div class="join-confirm"><input type="button" title="회원가입" value="저는 회원이 아니에요.." onClick="dialog('회원가입', '/include/join.php');"></div>
        </form>
    </div>
    <?php } else { ?>
    <div class="content-box-1-2">
    	<h3 class="main-title"><span class="circle"></span>내 정보</h3>
    	<div class="logout-box">
        	<div class="welcome">환영합니다. <?php echo $_SESSION['userid']; ?> 님</div>
            <div class="modify-button"><input type="button" title="회원정보 수정" value="회원정보 수정" onClick="dialog('회원정보&nbsp;수정', '/include/edit.php');"></a></div>
        	<div class="logout-confirm"><input type="button" title="로그아웃" value="로그아웃" onClick="link('/include/logout.php');"></div>
        </div>
    </div>
    <?php } ?>
    <div class="content-box-2">
    	<h3 class="main-title"><span class="circle"></span>축제안내</h3>
    	<div class="content-box-2-area">
            <div><a href="/main1" title="축제안내"><img src="/image/content-box-2.jpg" title="드림파크 소개 이미지" alt="드림파크 소개 이미지"></a></div>
            <span><a href="/main1" title="축제안내">국화축제행사장과 이어지는 경인아라뱃길에서 즐거움이 있는 유람선관광, 낭만이 넘치는 요트관광, 신나는 자전거 관광으로 사랑하는 가족, 연인, 친구와의..</a></span>
        </div>
        <div class="content-box-2-button"><input type="button" title="더 알아보기" value="더 알아보기" onClick="link('/main1')"></div>
    </div>
    <div class="content-box-3">
    	<h3 class="main-title"><span class="circle"></span>지나간 축제</h3>
        <ul>
        	<li><a href="/main3" title="체험신청">
            	<figure class="flip">
                	<div class="front"><img src="/image/c3_1.png" title="지나간 체험 사진 1" alt="지나간 체험 사진 1"></div>
                    <figcaption class="back"><p>2015) 국화축제</p></figcaption>
                </figure>
                </a>
            </li>
            <li><a href="/main3" title="체험신청">
                <figure class="flip">
                	<div class="front"><img src="/image/c3_2.png" title="지나간 체험 사진 2" alt="지나간 체험 사진 2"></div>
                    <figcaption class="back"><p>2015) 공룡축제</p></figcaption>
                </figure>
                </a>
            </li>
            <li><a href="/main3" title="체험신청">
	            <figure class="flip">
                	<div class="front"><img src="/image/c3_3.png" title="지나간 체험 사진 3" alt="지나간 체험 사진 3"></div>
                    <figcaption class="back"><p>2015) 동화축제</p></figcaption>
                </figure>
                </a>
            </li>
        </ul>
    </div>
</div>