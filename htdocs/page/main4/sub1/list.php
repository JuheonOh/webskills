<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	$list_r = $pdo->query("select * from notice order by idx desc limit {$_POST['line']}, 5");
	while($list = $list_r->fetch(2)){
?> 
<tr>
	<td><?php echo $list['idx']; ?></td>
    <td><a href="javascript:void(0);" class="list_title" data-idx="<?php echo $list['idx']; ?>"><?php echo $list['title']; ?></a></td>
    <td><?php echo $list['username']; ?></td>
    <td><?php echo $list['date']; ?></td>
</tr>
<?php } ?>