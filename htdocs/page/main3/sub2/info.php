<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$list = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
?>
<div id="educate_info">
	<img src="/data/main2/<?php echo $list['image']; ?>" alt="<?php echo $list['title']; ?>" title="<?php echo $list['title']; ?>">
</div>