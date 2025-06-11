<?php
access(isset($_SESSION['userid']));
?>
<div id="main4">
	<?php
    if($_SESSION['lv'] == "관리자"){
		include_once("{$_SERVER['DOCUMENT_ROOT']}/page/main4/admin.php");
    } else {
		include_once("{$_SERVER['DOCUMENT_ROOT']}/page/main4/user.php");
    }
	?>
</div>