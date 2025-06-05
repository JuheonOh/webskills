<div id="sub">
	<div id="text_content">
    	<?php
			$include_file = isset($action) ? $action : $sub['type'];
			include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$midx}/{$sidx}/{$include_file}.php");
		?>
    </div>
</div>