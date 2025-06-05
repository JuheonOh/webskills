<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	access(isset($_SESSION['userid']));
?>
<div class="main2sub2">
    <div id="card">
        <img src="/image/membership_card.png" alt="card" title="card">
        <p id="card_number">4825 1495 3276 4255</p>
        <p id="card_ko_name">홍길동<p id="card_en_name">(GIL DONG HONG)</p></p>
    </div>
    <div id="card_input">
        <h3>카드 생성 필수 입력 사항</h3>
        <form id="card_frm" action="#" method="post" onSubmit="return card(this);" enctype="multipart/form-data">
            <ul>
                <li><input type="text" name="ko_name" id="ko_name" title="한글이름을 입력해주세요." placeholder="한글이름을 입력해주세요." value="홍길동"></li>
                <li><input type="text" name="en_name" id="en_name" title="영문이름을 입력해주세요." placeholder="영문이름을 입력해주세요." value="GIL DONG HONG"></li>
            </ul>
            <div><input type="submit" title="카드 생성" value="카드 생성"></div>
        </form>
    </div>
    <div id="print">
        <a href="javascript:print();" title="프린트">프린트</a>
    </div>
</div>
