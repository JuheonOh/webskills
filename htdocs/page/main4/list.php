<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
if($_POST['idx'] == ""){
	$reserve_list = $pdo->query("select reserve_list.*, reserve.title from reserve_list inner join reserve on reserve_list.ridx = reserve.idx order by edate desc");
} else {
	$reserve_list = $pdo->query("select reserve_list.*, reserve.title from reserve_list inner join reserve on reserve_list.ridx = reserve.idx where ridx='{$_POST['idx']}' order by edate desc");
}
$count = $reserve_list->rowCount();
if($count){
while($list = $reserve_list->fetch()){
?>
<tr>
	<td><?php echo $list['title']; ?></td>
    <td><?php echo $list['number']; ?>명</td>
    <td><?php echo $list['edate']; ?></td>
    <td><?php echo $list['date']; ?></td>
    <td><?php echo $list['userid']; ?></td>
</tr>
<?php } } else { ?>
<tr>
	<td colspan="5" class="no-have-reserve-list">체험신청 목록이 비어있습니다.</td>
</tr>
<?php } ?>