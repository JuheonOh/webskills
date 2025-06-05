<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<div class="comment">
	<?php
		$comment_r = $pdo->query("select * from comment where nidx='{$_POST['nidx']}'");
		while($list = $comment_r->fetch(2)){
			$list['comment'] = str_replace("\r\n", "<br>", $list['comment']);
	?>
	<ul>
    	<li>
        	<div class="username"><?php echo $list['username']; ?></div>
		    <div class="date"><?php echo $list['date']; ?></div>
        </li>
        <li>
        	<div class="contents"><?php echo $list['comment']; ?></div>
        </li>
        <li class="delete_btn"><button></button></li>
    </ul>
    <?php } ?>
</div>