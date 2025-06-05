<div id="main4sub1">
	<div class="after" style="position:relative;">
    	<p class="tac mb10"><button title="위로" onClick="an('top');" style="width:50px; height:40px;font-size:1.5em;" class="pointer">▲</button></p>
        <div id="comment">
        	<ul class="p10">
            	<?php
					$list_q = $pdo->query("select * from comment order by idx desc");
					$count = $list_q->rowCount();
					for($i = $count; $list = $list_q->fetch(); $i--){
				?>
                <li class="p10">
                	<div class="p20" style="background-color:#fff; border:1px solid #bfbfbf;">
                    	<ul class="after">
                        	<li class="fl"><span class="bold">No.</span><?php echo $i; ?>&nbsp;&nbsp;l&nbsp;&nbsp;</li>
                            <li class="fl"><span class="bold">작성자 : </span><?php echo $list['username']; ?>&nbsp;&nbsp;l&nbsp;&nbsp;</li>
                            <li class="fl"><span class="bold">작성일 : </span><span class="date"><?php echo $list['date']; ?></span>&nbsp;&nbsp;l&nbsp;&nbsp;</li>
                            <li class="fl"><span class="bold">경과시간 : </span><span class="time">0분전</span></li>
                        </ul>
                        <div class="mt20">
                        	<p class="bold">내용</p>
                            <p class="mt10"><?php echo $list['content']; ?></p>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <p class="tac mt10"><button title="아래로" onClick="an('bottom');" style="width:50px; height:40px;font-size:1.5em;" class="pointer">▼</button></p>
    </div>
    <div class="mt50">
    	<h3 class="mb10">글작성 ( 로그인 된 회원만 작성할 수 있습니다. )</h3>
        <form id="main4sub1_frm" action="/page/main4/sub1/insert.php" method="post" onSubmit="return frmChk(this, 'textarea');">
        	<ul id="comment_box" class="mt10 after">
            	<li class="fl"><label for="textarea"><textarea id="textarea" name="content" title="내용" placeholder="로그인 된 회원만 작성할 수 있습니다." class="w100p"<?php if(!isset($_SESSION['userid'])) echo ' onClick="login_chk(this);"'; ?>></textarea></label></li>
                <li class="fl"><input type="submit" title="등록" value="등록" class="w100p"></li>
            </ul>
        </form>
    </div>
</div>
<script>
function times(){
	var date = new Array();
	$(".date").each(function(index, element){
		date.push($(this).text());
	});
	
	$.ajax({
		type : "POST",
		url : "/page/main4/sub1/date.php",
		date : { "date[]" : date },
		dateType : "JSON",
		success : function(data){
			alert(data);
		}
	});
	
}

function login_chk(self){
	alert("로그인 후 이용해주세요.");
	$(self).blur();
}

var slider = {
	on : function(){
		this.timer = setInterval(function(){
			an("bottom");
		}, 5000)
	},
	off : function(){
		clearInterval(this.timer);
	}
}

function an(type){
	if($("#comment > ul > li").length > 5){
		slider.off();
		
		switch(type){
			case 'top' : 
				$("#comment > ul").stop().animate(
					{ "top" : 0 },
					300,
					function(){
						$("#comment > ul").prepend($("#comment > ul > li:last-child"));
						$("#comment > ul").css("top", -220);
					}
				);
			break;
			case 'bottom' :
				$("#comment > ul").stop().animate(
					{ "top" : -440 },
					300,
					function(){
						$("#comment > ul").append($("#comment > ul > li:first-child"));
						$("#comment > ul").css("top", -220);
					}
				);
			break;	
		}
		slider.on();
	} else {
		alert("고객리뷰가 5개를 초과하지 않았습니다.");
	}
}

function dates(){
	var dates = new Array();
	$("#comment > ul > li").each(function(){
		dates.push($(this).find(".date").text());
	});
	
	
	$.getJSON(
		"/page/main4/sub1/date.php",
		{ "date[]" : dates },
		function(data){
			for(var key in data){
				$("#comment > ul > li .time").eq(key).text(data[key]);
			}
		}
	);
}

$(function(){
	if($("#comment > ul > li").length > 5){
		$("#comment > ul").prepend($("#comment > ul > li:last-child"));
		$("#comment > ul").css("top", -220);
		slider.on();
	}
	
	$("#textarea").keyup(function(){
		if($(this).val().length > 140){
			alert("글자수는 140자까지 입니다.")
			var str = $(this).val().substr(0, 140);
			$(this).val(str);
		}
	});
	
	dates();
});
</script>