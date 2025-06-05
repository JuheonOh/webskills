<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$list = $pdo->query("select * from educate where idx='{$_POST['idx']}'")->fetch(2);
$sum = $pdo->query("select * from educate_list where code='{$list['code']}'")->rowCount();
$list['info'] = str_replace("\r\n", "<br>", $list['info']);
?>
<div id="educate">
	<?php if(isset($_SESSION['userid'])){ ?>
	<form id="educate_frm" method="post" onSubmit="return frmSubmit(this, '/page/main2/sub1/educate_ok.php', '수강 신청이 완료되었습니다.', '/main3/sub1')">
    	<input type="hidden" name="idx" value="<?php echo $list['idx']; ?>">
    	<div class="educate">
        	<h2>강좌 제목 : <?php echo $list['title']; ?></h2>
            <p>강좌 코드 : <?php echo $list['code']; ?></p>
            <ul>
            	<li>개강일 : <?php echo $list['st_date']; ?></li>
                <li>~</li>
                <li>종강일 : <?php echo $list['en_date']; ?></li>
            </ul>
            <p class="number">수강신청자 수 : <?php echo $sum; ?> 명</p>
            <p>강사명 : <?php echo $list['teacher']; ?></p>
            <div>
            	<?php echo $list['info']; ?>
            </div>
        </div>
        <ul class="btn">
        	<li><button type="submit" title="수강신청">수강신청</button></li>
            <li><button type="button" title="닫기" onClick="$('#dialog').remove()">닫기</button></li>
        </ul>
    </form>
    <?php } else { ?>
    <form id="educate_frm" method="post" onSubmit="return false;">
    	<input type="hidden" name="idx" value="<?php echo $list['idx']; ?>">
        <input type="hidden" name="st_date" value="<?php echo $list['st_date']; ?>">
        <input type="hidden" name="en_date" value="<?php echo $list['en_date']; ?>">
        <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
    	<div class="educate">
        	<h2>강좌 제목 : <?php echo $list['title']; ?></h2>
            <p>강좌 코드 : <?php echo $list['code']; ?></p>
            <ul>
            	<li>개강일 : <?php echo $list['st_date']; ?></li>
                <li>~</li>
                <li>종강일 : <?php echo $list['en_date']; ?></li>
            </ul>
            <p class="number">수강신청자 수 : <?php echo $sum; ?> 명</p>
            <div>
            	<?php echo $list['info']; ?>
            </div>
        </div>
        <ul class="btn">
        	<li><button type="submit" id="accept" title="수강신청">수강신청</button></li>
            <li><button type="button" title="닫기" onClick="$('#dialog').remove()">닫기</button></li>
        </ul>
    </form>
    <script>
	$(function(){
		$("#accept").click(function(){
			var idx = $("input[name=idx]").val();
			var st_date = $("input[name=st_date]").val();
			var en_date = $("input[name=en_date]").val();
			var date = $("input[name=date]").val();
			
			
			if(st_date > date){
				alert("개강된 강좌가 아닙니다.");
			} else if(en_date < date) {
				alert("종강된 강좌입니다.");
			} else {
				$.ajax({
					type : "POST",
					url : "/include/join.php",
					data : { idx : idx },
					success : function(data){
						$("#dialog").remove();
						
						$("<div id='dialog'></div>").dialog({
							title : "회원가입",
							modal : true,
							resizable : false,
							width : 500,
							height : 620,
							close : function(){
								$(this).remove();
							}
						}).html(data);
					}
				});
			}
		});
	});
	</script>
    <?php } ?>
</div>