<div id="write">
	<form id="write_frm" method="post" onSubmit="return frmSubmit(this, '/page/main4/sub1/write_ok.php', '글쓰기가 완료되었습니다.', '/main4/sub1')">
        <div class="write">
        	<ul>
            	<li><label for="title"><input type="text" name="title" id="title" title="제목" value="" placeholder="제목을 입력해주세요." required></label></li>
                <li><textarea id="memo" name="memo" title="내용" placeholder="내용" required></textarea></li>
            </ul>
            <div class="write_btn"><button type="submit" title="글쓰기">글쓰기</button></div>
        </div>
    </form>
</div>