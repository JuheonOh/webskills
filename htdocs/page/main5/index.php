<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<div class="main5">
	<div class="main5_search">
    	<form id="main5_frm" action="/main5/x/" method="post" onSubmit="return false;">
        	<ul>
            	<li><label for="search_key">통합검색</label></li>
            	<li><input type="text" name="search_key" title="검색창" id="search_key" placeholder="검색어를 입력해주세요."></li>
                <li><input type="submit" title="검색" value="검색"></li>
            </ul>
        </form>
    </div>
	<table style="width:100%;">
    	<colgroup>
        	<col width="20%">
            <col width="35%">
            <col width="25%">
            <col width="20%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>번호</th>
                <th>제목</th>
                <th>이름</th>
                <th>날짜</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$board = $pdo->query("select * from board limit 0, 5");
			while($board_list = $board->fetch()){
			?>
            <tr>
                <td><?php echo $board_list['idx']; ?></td>
                <td><?php echo $board_list['subject']; ?></td>
                <td><?php echo $board_list['name']; ?></td>
                <td><?php echo $board_list['date']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
</script>