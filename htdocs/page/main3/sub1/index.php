<?php access(isset($_SESSION['userid']));
	/* 연결 될때 까지 무한 반복 ::: 문제점 부화 << 별로 티안남
	$xml = @simplexml_load_file("{$_SERVER['DOCUMENT_ROOT']}/data/xml/rentacarlist.xml");
	while($xml === false){
		$xml = @simplexml_load_file("{$_SERVER['DOCUMENT_ROOT']}/data/xml/rentacarlist.xml");
	}
	*/
?>
<script>
$(document).ready(function(){
var dragg = $("figure");
var drop = $(".basket_image");
var basketTable = $(".basket_table");
var basketButton = $(".basket_button1");

function dropEv(self){
	var tableForm = '<form id="basket_frm" method="post" onSubmit="return false;">\
			<div>\
				<input type="hidden" id="carname" name="carname" value="">\
				<input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">\
			</div>\
			<ul>\
				<li class="black">차량이름&nbsp;:&nbsp;</li>\
				<li class="car_name"></li>\
			</ul>\
			<ul>\
				<li class="black"><label for="color">차량색상&nbsp;:&nbsp;</label></li>\
				<li>\
					<select id="color" name="color">\
						<option value="">-- 선택 --</option>\
						<option value="검정">검정</option>\
						<option value="흰색">흰색</option>\
						<option value="회색">회색</option>\
						<option value="빨간색">빨간색</option>\
					</select>\
				</li>\
			</ul>\
			<ul>\
				<li class="black"><label for="fuel">사용연료&nbsp;:&nbsp;</label></li>\
				<li>\
					<select id="fuel" name="fuel">\
						<option value="">-- 선택 --</option>\
						<option value="휘발유">휘발유</option>\
						<option value="경유">경유</option>\
						<option value="하이브리드">하이브리드</option>\
					</select>\
				</li>\
			</ul>\
			<ul>\
				<li class="black"><label for="st_date">예약기간&nbsp;:&nbsp;</label></li>\
				<li><input type="text" id="st_date" name="st_date" class="basket_date ip" readonly> ~ <input type="text" id="en_date" name="en_date" class="basket_date ip" readonly></li>\
			</ul>\
			<ul>\
				<li class="black">사용여부&nbsp;:&nbsp;</li>\
				<li class="basket_check">모든 입력사항을 입력해주세요.</li>\
			</ul>\
			<div class="basket_button2">\
				<input type="submit" value="예약" title="예약">\
			</div>\
		</form>';
	basketTable.html(tableForm);
	basketButton.show();
	
	$(".basket_date").datepicker({
		dateFormat : "yy-mm-dd",
		minDate : 0,
		onclose : function(date){
			if(date){
				var isS = this.id === "st_date";
				$(isS ? "#en_date" : "#st_date").datepicker("option", isS ? "minDate" : "maxDate", date);
			}
		}
	});
	
	$("input, select").change(function(){
		var bool = false;
		
		$("input, select").each(function(){
            if($(this).val() === ""){
				return bool = true;
			}
        });
		
		if(bool) return;
		
		$.post(
			"/page/main3/sub1/check.php",
			$("#basket_frm").serializeArray(),
			function(data){
				if(data){
					$(".basket_check").text("[ "+data+" ] 사용가능한 차량입니다.");
					$(".basket_button2").show().click(function(){
						$.post(
							"/page/main3/sub1/insert.php",
							$("#basket_frm").serializeArray(),
							function(data){
								$(".basket_check").text("예약이 완료되었습니다.");
								$(".basket_button2").hide();				
							}
						)
					});
				} else {
					$(".basket_check").text("사용불가능한 차량입니다.")
					$(".basket_button2").hide();
				}
			}
		)
	});
	
	$(".car_name").text(self.find("figcaption").text());
	$("#carname").val(self.find("figcaption").text());
	return self.find("img");
}

function closeEv(){
	drop.html("차량을 마우스로 끌어 이곳에 놓아주세요.");
	basketTable.empty();
	basketButton.hide();
}

dragg.draggable({
	revert : true,
	helper : 'clone',
	drag : function(e, ui){
	},
	stop : function(e, ui){
	}
});

drop.droppable({
	drop : function(e, ui){
		var self = ui.helper;
		self.remove();
		$(this).html(dropEv(self));
	}
});

$(".basket_close").click(closeEv);

});
</script>
<div class="main3sub1">
	<div class="main3sub1_left">
    	<h4>차량 드래그 영역</h4>
        <figure>
        	<img src="/data/main3sub1/Equss.jpg" alt="Equss" title="Equss">
            <figcaption>에쿠스/Equss</figcaption>
        </figure>
        <figure>
        	<img src="/data/main3sub1/Genesis.jpg" alt="Genesis" title="Genesis">
            <figcaption>제네시스/Genesis</figcaption>
        </figure>
        <figure>
        	<img src="/data/main3sub1/Grand Starex.jpg" alt="Grand Starex" title="Grand Starex">
            <figcaption>그랜드 스타렉스/Grand Starex</figcaption>
        </figure>
        <figure>
        	<img src="/data/main3sub1/Grandeur.jpg" alt="Grandeur" title="Grandeur">
            <figcaption>그랜져/Grandeur</figcaption>
        </figure>
        <figure>
        	<img src="/data/main3sub1/Santafe.jpg" alt="Santafe" title="Santafe">
            <figcaption>싼타페/Santafe</figcaption>
        </figure>
        <figure>
        	<img src="/data/main3sub1/Sonata.jpg" alt="Sonata" title="Sonata">
            <figcaption>소나타/Sonata</figcaption>
        </figure>
    </div>
    <div class="main3sub1_right">
    	<h4>차량 드롭 영역</h4>
        <div class="basket">
        	<div class="basket_image">차량을 마우스로 끌어 이곳에 놓아주세요.</div>
            <div class="basket_button1"><a href="javascript:closeEv();" title="닫기" class="basket_close">X</a></div>
        </div>
        <div class="basket_table"></div>
    </div>
</div>