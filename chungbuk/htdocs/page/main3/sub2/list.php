<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$list_q = $pdo->query("select * from rsv where date='{$_POST['date']}'");
if($list_q->rowCount()){
	while($list = $list_q->fetch()){
?>
<tr>
	<td><?php echo $list['userid']; ?></td>
    <td><?php echo $list['hall']; ?></td>
    <td><?php echo $list['date']."/"; echo $list['time'] == "lunch" ? "점심" : "저녁"; ?></td>
    <td>
    	<?php
			$echo = "";
			foreach(json_decode($list['seat']) as $key=>$val){
				if($key > 0) $echo .= ", ";
				$int = (int)($val/5);
				$alphabet = chr(65+$int);
				$echo .= $alphabet.(($val-($int*5))+1);
			}
			echo $echo;
		?>
    </td>
    <td>
    	<?php
			$menu = explode(",", $list['menu']);
			$echo = "";
			foreach($menu as $key=>$val){
				if($key > 0) $echo .= "<br>";
				$md = explode("l", $menu[$key]);
				$echo .= $md[0]." / ".$md[1]."개";
				
			}
			echo $echo;
		?>
    </td>
    <td><?php echo number_format($list['price'])."원"; ?></td>
    <td>
	<?php if(date("Y-m-d") < $list['date']){ ?>
    <button title="취소" onClick="cancel(this, <?php echo $list['idx']; ?>, '<?php echo $list['date']; ?>');">취소</button>
    <?php } else { ?>
    <button title="취소불가능" onClick="cancel(this, <?php echo $list['idx']; ?>, '<?php echo $list['date']; ?>');" disabled>취소불가능</button>
    <?php } ?>
    </td>
</tr>
<?php } } else { ?>
<tr>
	<td colspan="100%">예약내역이 존재하지 않습니다.</td>
</tr>
<?php } ?>