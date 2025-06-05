<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$key = isset($_POST['key']) ? $_POST['key'] : "";
$end = isset($_POST['line']) ? $_POST['line']+5 : 5;
$car = $pdo->query("select * from car where carname like '%{$key}%' order by carname, color, fuel, carnumber asc limit 0, {$end}");
?>
<table class="main4search">
	<colgroup>
    	<col width="30%">
        <col width="20%">
        <col width="20%">
        <col width="30%">
    </colgroup>
	<thead>
    	<tr>
        	<th>차량명</th>
            <th>차량색상</th>
            <th>차량연료</th>
            <th>차량번호</th>
        </tr>
    </thead>
    <tbody>
    	<?php
        	if($car->rowCount()){
			while($list = $car->fetch()){
		?>
    	<tr>
        	<td class="tac"><?php echo hit($list['carname'], $key); ?></td>
            <td class="tac"><?php echo $list['color']; ?></td>
            <td class="tac"><?php echo $list['fuel']; ?></td>
            <td class="tac"><?php echo $list['carnumber']; ?></td>
        </tr>
        <?php } } else { ?>
        <tr>
        	<td colspan="4" class="tac" style="line-height:70px; border-bottom:1px solid #999;">겸색 결과가 존재하지 않습니다.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>