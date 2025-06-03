<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<div class="main4">
	<div class="main4_search">
    	<form id="main4_frm" action="/main4/x/" method="post" onSubmit="return false;">
        	<ul class="main4_search_area">
            	
            </ul>
        </form>
    </div>
	<table style="width:100%">
    	<colgroup>
            <col width="25%">
            <col width="10%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>체험명</th>
                <th>예약인원</th>
                <th>예약일자</th>
                <th>신청일자</th>
                <th>아이디</th>
            </tr>
        </thead>
        <tbody>
        	<?php
			$ep_list = $pdo->query("select * from ep_list");
			while($list = $ep_list->fetch()){
			?>
            <tr>
                <td><?php echo $list['title']; ?></td>
                <td><?php echo $list['number']; ?></td>
                <td><?php echo $list['edate']; ?></td>
                <td><?php echo $list['date']; ?></td>
                <td><?php echo $list['userid']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>