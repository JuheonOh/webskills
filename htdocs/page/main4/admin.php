<div class="main4-search">
	<ul>
    	<li><label for="title">체험명 검색 : </label></li>
        <li>
        	<select name="title" id="title">
            	<option value="">-- 전체 --</option>
                <?php
					$reserve = $pdo->query("select * from reserve");
					while($list = $reserve->fetch()){
                ?>
                <option value="<?php echo $list['idx']; ?>"><?php echo $list['title']; ?></option>
                <?php } ?>
            </select>
        </li>
    </ul>
</div>
<table class="table">
    <thead>
    	<tr>
        	<th>체험명</th>
            <th>예약인원</th>
            <th>예약일자</th>
            <th>신청일자</th>
            <th>아이디</th>
        </tr>
    </thead>
    <tbody class="ajax">
    </tbody>
</table>
<script>
$(function(){
	$("#title").change(function(){
		var value = $(this).val();
		
		$.ajax({
			type : "POST",
			url : "/page/main4/list.php",
			data : { idx : value },
			success : function(data){
				$(".ajax").html(data);
			}
		});
	}).trigger("change");
});
</script>