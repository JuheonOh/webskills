<div id="sub">
	<div id="sub-top">
    	<h2 class="sub-title">· <?php echo $main['title']; ?></h2>
    	<ul class="sub-font">
        	<li><a href="javascript:zoom(20);" title="글자확대">글자확대</a></li>
        	<li><a href="javascript:zoom(100);" title="글자표준">글자표준</a></li>
        	<li><a href="javascript:zoom(-20);" title="글자축소">글자축소</a></li>
           	<li><a href="javascript:print();" title="프린트">프린트</a></li>
        </ul>
        <ul class="sub-page">
        	<li><a href="/" title="HOME">HOME</a>&nbsp;&gt;&nbsp;</li>
            <li><a href="/<?php echo $main['child']; ?>" title="<?php echo $main['title']; ?>"><?php echo $main['title']; ?></a></li>
        </ul>
    </div>
    <div id="text-content">
    	<?php
			$include_file = isset($sidx) ? $sidx : $main['type'];
	        include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$midx}/{$include_file}.php");
		?>
    </div>
</div>