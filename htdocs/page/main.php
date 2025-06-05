<div id="main">
	<?php if(isset($_SESSION['userid'])){ ?>
    <div id="logout_box">
    	<h3>Members Info</h3>
        <ul class="logout_box">
        	<li><b><?php echo $_SESSION['userid']; ?></b> 님 환영합니다.</li>
            <li><button type="button" title="로그아웃" onClick="link('/include/logout.php')">로그아웃</button></li>
        </ul>
    </div>
    <?php } else { ?>
    <div id="login_box">
        <h3>Members Login</h3>
        <div class="login_box">
            <form id="login_box_frm" method="post" onSubmit="return frmSubmit(this, '/include/login_ok.php', '로그인을 성공했습니다.', '/');">
                <ul>
                    <li><label for="userid"><input type="text" name="userid" id="userid" title="아이디" value="" placeholder="아이디" required></label></li>
                    <li><label for="pw"><input type="password" name="pw" id="pw" title="비밀번호" value="" placeholder="비밀번호" required></label></li>
                </ul>
                <div class="login_btn"><button type="submit" title="로그인">로그인</button></div>
                <div class="join_btn"><button type="button" title="회원가입" onClick="dialog('회원가입', '/include/join.php', '500', '620')">회원가입</button></div>
            </form>
        </div>
    </div>
    <?php } ?>
    <div id="mooc_info">
        <h3>MOOC 소개<button type="button" title="바로가기" onClick="link('/main1/sub1/');">바로가기</button></h3>
        <ul>
            <li><a href="/main1/sub1" title="MOOC 소개"><img src="/image/main_info_image.jpg" alt="main_info_image.jpg" title="main_info_image.jpg"	></a></li>
            <li>
                <a href="/main1/sub1" title="MOOC 소개">
                    무크(MOOC)는 학습자가 수동적으로 듣기만 
                    하던 기존의 온라인 학습동영상과 달리 교수자
                    와 학습자, 학습자와 학습자간 질의응답, 토론,
                    퀴즈, 과제 제출 등 양방향 학습이 가능한 새로
                    운 교육 환경을 제공합니다. 아울러 수강인원의
                    제한없이 누구나 수강이 ...
                </a>
            </li>
        </ul>
    </div>
    <div id="mooc_notice">
        <h3>공지사항<button type="button" title="바로가기" onClick="link('/main4/sub1');">바로가기</button></h3>
        <ul>
        	<?php
				$list_r = $pdo->query("select * from notice order by idx desc limit 0, 5");
                $count = $list_r->rowCount();
                if($count == 0){
                ?>
                <li class="no_have">글이 존재하지 않습니다.</li>
                <?php
                } else {
				while($list = $list_r->fetch(2)){
                    $date = explode(" ", $list['date']);
			?>
            <li><a href="/main4/sub1" title="<?php echo $list['memo']; ?>"><?php echo $list['title']; ?></a><span>[<?php echo $date[0]; ?>]</span></li>
            <?php } } ?>
        </ul>
    </div>
</div>
