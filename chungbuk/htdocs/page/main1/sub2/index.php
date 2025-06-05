<div id="main1sub2">
	<nav>
    	<ul>
            <li><button title="레스토랑 소개" onClick="btnScroll('introduction');" class="pointer">레스토랑 소개</button></li>
            <li><button title="레스토랑 연혁" onClick="btnScroll('history');" class="pointer">레스토랑 연혁</button></li>
        </ul>
    </nav>
    <div class="banner">
    	<ul class="after">
        	<li><img src="/image/intropic1.jpg" alt="intropic1" title="intropic1"></li>
            <li><img src="/image/intropic2.jpg" alt="intropic2" title="intropic2"></li>
            <li><img src="/image/intropic3.jpg" alt="intropic3" title="intropic3"></li>
            <li><img src="/image/intropic4.jpg" alt="intropic4" title="intropic4"></li>
        </ul>
    </div>
    <section id="introduction">
    	<h3>레스토랑 소개</h3>
        <div>
        	<img src="/image/introduction.jpg" alt="introduction" title="introduction" width="350">
            <p>Quiabeiro 레스토랑은 즉석에서 선보이는 다양한 라이브 섹션의 일품요리를 마음껏 즐길 수 있는 </p>
            <p>‘Live buffet’와 5성급호텔 총주방장 출신의 쉐프가 제안하는 코스요리를 취향에 따라 선택할 수 있는 </p>
            <p>‘Private dining’이 결합되어 신개념 다이닝 문화를 선보이는 부띠크 레스토랑입니다.</p>
            <br>
            <p>레스토랑 ‘Quiabeiro’는 기품있고 정제된 인테리어로 매장을 방문하는 고객에게 깊은 감동으로 다가갑니다.</p>
            <p>7.5m층고의 공간감을 극대화 시켜주는 조형물은 레스토랑 내 각 홀에서 모두 조망할 수 있도록 디자인되어</p>
            <p> 홀에서 즐기는 ‘Live Buffet’를 한층 더 품격있게 만들어 줍니다. </p>
            <p>또한 ‘private dining’을 위한 별도의 공간으로 최고의 게스트를 위한 VIP room과 각각 개성이 </p>
            <p>다른 5개 room이 마련되어 있습니다. </p>
            <p>룸 마다 별도의 코트체크와 서비스가 가능하며 룸의 조명을 고객 취향에 따라 원하시는 조도로 </p>
            <p>조절하실 수 있도록 설계되었습니다 </p>
        </div>
    </section>
    <section id="history">
    	<h3>레스토랑 연혁</h3>
        <table class="table1">
        	<thead>
            	<tr>
                	<th>날짜</th>
                    <th>연혁</th>
                </tr>
            </thead>
            <tbody id="history_list">
				<?php
                    $history_txt = iconv("EUC-KR", "UTF-8", file_get_contents("{$_SERVER['DOCUMENT_ROOT']}/data/txt/history.txt"));
                    $arr = explode("\r\n", $history_txt);
                    
                    foreach($arr as $key=>$val){
                        $td = explode(" - ", $val);
                        $year = substr($td[0], 0, 4);
                        $month = substr($td[0], 5, 2);
                        $day = substr($td[0], 8, 2);
                        $tarr[] = $year."년".$month."월".$day."일//".$td[1];
                    }
                    sort($tarr);
                    
                    foreach($tarr as $key=>$val){
                        $list = explode("//", $val);
                ?>
                <tr>
                    <td><?php echo $list[0]; ?></td>
                    <td align="left"><?php echo $list[1]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>
<script>
function btnScroll(type){
	$("html, body").animate(
		{ scrollTop : $("#"+type).offset().top },1000);
}
</script>