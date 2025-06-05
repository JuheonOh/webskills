<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$_POST['comment'] = $pdo->quote($_POST['comment']);
$_POST['comment'] = substr($_POST['comment'], 1);
$_POST['comment'] = substr($_POST['comment'], 0, -1);

$pdo->query("insert into comment set nidx='{$_POST['nidx']}', username='{$_SESSION['userid']}', comment='{$_POST['comment']}', date=now()");
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
    </ul>
    <?php } ?>
</div>