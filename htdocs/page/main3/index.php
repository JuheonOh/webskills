<div id="main3">
	<table class="table">
    	<colgroup>
        	<col width="40%">
            <col width="20%">
            <col width="25%">
            <col width="15%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>체험 이미지</th>
                <th>체험 이름</th>
                <th>하루 동안 신청 가능 인원</th>
                <th>기능</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$reserve = $pdo->query("select * from reserve");
				while($list = $reserve->fetch()){
			?>
            <tr>
            	<td><img src="/image/<?php echo $list['image']; ?>" alt="<?php echo $list['image']; ?>" title="<?php echo $list['image']; ?>"></td>
                <td><?php echo $list['title']; ?></td>
                <td><?php echo $list['number']; ?> 명</td>
                <td><button title="선택" onClick="link('/main3/<?php echo $list['idx']; ?>')">선택</button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>