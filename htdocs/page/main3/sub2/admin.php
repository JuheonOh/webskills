<p class="tt">■ 모든 회원의 예약목록입니다.</p>
<table class="main3sub2">
	<colgroup>
    	<col width="20%">
        <col width="20%">
        <col width="10%">
        <col width="10%">
        <col width="20%">
        <col width="10%">
        <col width="10%">
    </colgroup>
    <thead>
    	<tr>
        	<th>차량사진</th>
            <th>차량명</th>
            <th>차량색상</th>
            <th>사용연료</th>
            <th>예약기간</th>
            <th>차량번호</th>
            <th>아이디</th>
        </tr>
    </thead>
    <?php if($main3->rowCount()){
		while($list = $main3->fetch()){
			$image_name = explode("/", $list['carname']);
	?>
    <tbody>
    	<tr style="border-bottom:1px solid #999;">
        	<td class="tac"><img src="/data/main3sub1/<?php echo $image_name[1]; ?>.jpg" alt="<?php echo $list['carname']; ?>" title="<?php echo $list['carname']; ?>" width="200"></td>
            <td class="tac"><?php echo $list['carname']; ?></td>
            <td class="tac"><?php echo $list['color']; ?></td>
            <td class="tac"><?php echo $list['fuel']; ?></td>
            <td class="tac"><?php echo $list['st_date']." ~ ".$list['en_date']; ?></td>
            <td class="tac"><?php echo $list['carnumber']; ?></td>
            <td class="tac"><?php echo $list['userid']; ?></td>
        </tr>
    <?php } } else { ?>
    	<tr>
        	<td colspan="7" class="tac" style="line-height:70px; font-size:1.1em; border-bottom:1px solid #999;">예약된 차량이 존재하지 않습니다.</td>
        </tr>
    <?php } ?>
    </tbody>
</table>