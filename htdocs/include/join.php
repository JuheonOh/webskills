<div id="join">
	<form id="join_frm" method="post" onSubmit="return frmSubmit(this, '/include/join_ok.php', <?php if(isset($_POST['idx'])){ ?> '수강 신청이 완료되었습니다.', '/main3/sub1'<?php } else { ?>'회원가입이 완료되었습니다.' ,'/'<?php } ?>);">
    	<?php if(isset($_POST['idx'])){ ?>
        <input type="hidden" name="idx" value="<?php echo $_POST['idx']; ?>">
        <?php } ?>
        <div class="join">
        	<p><span class="red">■</span> 필수항목</p>
            <ul>
            	<li><label for="userid">아이디</label></li>
                <li><input type="text" name="userid" id="userid" title="아이디" value="" placeholder="아이디" required></li>
            </ul>
            <ul>
	            <li><label for="pw">비밀번호</label></li>
                <li><input type="password" name="pw" id="pw" title="비밀번호" value="" placeholder="비밀번호" required></li>
            </ul>
            <ul>
            	<li><label for="username">성명</label></li>
                <li><input type="text" name="username" id="username" title="성명" value="" placeholder="성명" required></li>
            </ul>
            <p class="choise"><span class="blue">■</span> 선택항목</p>
            <ul class="email">
            	<li><label for="email">이메일</label></li>
                <li><input type="text" name="email" id="email" title="이메일" value="" placeholder="이메일 아이디"></li>
                <li>@</li>
                <li><input type="text" name="domain" id="domain" title="메일 주소" value="" placeholder="메일 주소"></li>
            </ul>
            <ul class="gender">
            	<li>성별</li>
            	<li><label for="man"><input type="radio" name="gender" id="man" title="남자" value="남성">남성</label></li>
                <li><label for="woman"><input type="radio" name="gender" id="woman" title="여자" value="여성">여성</label></li>
            </ul>
            <ul class="year">
            	<li><label for="year">출생년도</label></li>
                <li>
                	<select id="year" name="year">
                    	<option value="">선택안함</option>
                    	<?php for($i = 1916; $i < 2016; $i++){ ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?>년</option>
                        <?php } ?>
                    </select>
                </li>
            </ul>
            <div class="join_control">
            	<ul>
                    <li><button type="submit" title="회원가입">회원가입</button></li>
                    <li><button type="button" title="닫기" onClick="$('#dialog').remove()">닫기</button></li>
                </ul>            	
            </div>
        </div>
    </form>
</div>