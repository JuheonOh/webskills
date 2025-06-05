<div class="sub">
	<div class="sub_top">
    	<h2 title="<?php echo $sidx == "" ? $main['title'] : $sub['title']; ?>"><?php echo $sidx == "" ? $main['title'] : $sub['title']; ?></h2>
    	<ul class="sub_font">
        	<li><button title="프린트" onClick="print();">프린트</button></li>
            <li><button title="글자확대" onClick="zoom(20);">글자확대</button></li>
            <li><button title="글자표준" onClick="zoom(100);">글자표준</button></li>
            <li><button title="글자축소" onClick="zoom(-20);">글자축소</button></li>
        </ul>
    	<ul class="sub_page">
        	<li><a href="/" title="홈">HOME</a>&nbsp;&gt;&nbsp;</li>
            <li><a href="/<?php echo $midx."/".$page['child']; ?>" title="<?php echo $main['title']; ?>"><?php echo $main['title']; ?></a>&nbsp;&gt;&nbsp;</li>
            <li><a href="/<?php echo $midx."/".$sidx; ?>" title="<?php echo $sub['title']; ?>"><?php echo $sub['title']; ?></a></li>
        </ul>
    </div>
    <div id="text_content">
    	<?php
			include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$midx}/{$sidx}/{$include_file}.php");
		?>
    </div>
</div>