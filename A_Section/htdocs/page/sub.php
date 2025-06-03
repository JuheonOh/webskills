<div class="sub">
	<div class="sub_logo">
    	<div class="sub_logo_art"></div>
        <h2><?php echo $main['title']; ?></h2>
    </div>
	<div class="sub_top">
    	<h3>■ <?php echo $main['title']; ?></h3>
        <ul class="sub_font">
        	<li><button title="글자확대" onClick="javascript:zoom(20);">글자확대</button></li>
            <li><button title="글자표준" onClick="javascript:zoom(100);">글자표준</button></li>
            <li><button title="글자축소" onClick="javascript:zoom(-20);">글자축소</button></li>
            <li><a href="javascript:print();" title="프린트">프린트</a></li>
        </ul>
        <ul class="sub_page">
        	<li><a href="/" title="HOME">HOME</a>&nbsp;&gt;&nbsp;</li>
            <li><a href="/<?php echo $main['child']; ?>" title="<?php echo $main['title']; ?>"><?php echo $main['title']; ?></a></li>
        </ul>
    </div>
    <div id="text_content">
    	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$midx}/index.php"); ?>
    </div>
</div>