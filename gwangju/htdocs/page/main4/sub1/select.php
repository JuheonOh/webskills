<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	$rsv = $pdo->query("select * from rsv where date='{$_POST['date']}' and type='' order by time desc");
	if($rsv->rowCount()){
		while($list = $rsv->fetch()){
			$arr = NULL;
			$r_menu = $pdo->query("select * from r_menu where ridx='{$list['idx']}'");
?>
<tr>
	<td><?php echo $list['name']; ?></td>
    <td align="left">
    	<?php
			while($menu_list = $r_menu->fetch()){
				$arr[] = $menu_list['name']."[".$menu_list['number']."]";
			}
			$arr = implode(", ", $arr);
			echo $arr;
		?>
    </td>
    <td><?php echo $list['time']; ?></td>
    <td>
    	<button title="주문" onClick="rsvLocal(this, '<?php echo $list['idx']; ?>', '<?php echo $arr; ?>', '<?php echo $list['time']; ?>', '<?php echo $list['date']; ?>')">주문</button>
        <button title="삭제" onClick="rsvDelete(this, <?php echo $list['idx']; ?>);">삭제</button>
    </td>
</tr>
<?php } } else { ?>
<tr>
	<td colspan="4">검색결과가 존재하지 않습니다.</td>
</tr>
<?php } 