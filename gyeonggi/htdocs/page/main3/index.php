<div id="main3">
	<form id="rsv_frm" action="/include/ok.php" method="post" onSubmit="return rsvFrm(this);">
    	<div>
        	<input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
            <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
            <input type="hidden" name="action" value="insert">
            <input type="hidden" name="table" value="rsv">
        </div>
        <table class="table1">
        	<tbody>
            	<tr>
                	<td><label for="room">룸 선택</label></td>
                    <td>
                    	<select id="room" name="room" title="룸">
                        	<option value="" data-cost="0">--선택--</option>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td><label for="redate">예약날짜</label></td>
                    <td><input type="text" id="redate" name="redate" title="예약날짜" value="" class="pointer" placeholder="예약날짜" readonly><span>룸 선택 후 예약날짜선택이 가능합니다.</span></td>
                </tr>
                <tr>
                	<td><label for="time">예약시간대</label></td>
                    <td>
                    	<select id="time" name="time" title="예약시간대">
                        	<option value="">--선택--</option>
                            <option value="09:00~11:00">09:00~11:00</option>
                            <option value="12:00~14:00">12:00~14:00</option>
                            <option value="15:00~17:00">15:00~17:00</option>
                            <option value="18:00~20:00">18:00~20:00</option>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td>예약 가능 사항</td>
                    <td><p id="info">예약정보를 모두 입력해주세요.</p></td>
                </tr>
            </tbody>
        </table>
        <p class="help">메뉴를 한가지 이상 선택해주세요.</p>
        <table class="table2">
        	<thead>
            	<tr>
                	<th class="tal">메뉴주문</th>
                </tr>
            </thead>
            <tbody id="menu_list" class="pointer">
            </tbody>
        </table>
        <div class="tar">
        	<p id="cost">예약금액 : <span>0</span>원 (룸 예약비) + <span>0</span>원 (메뉴 주문) = <span class="red bold">0</span>원 (VAT 10% 포함)</p>
        </div>
        <div class="tar">
        	<input type="submit" title="예약완료" value="예약완료" id="rsv_btn" disabled>
        </div>
    </form>
</div>
<script>
var roomList;
var menuList;

// 룸 정보
function ajax(){
	var room = $("#room").val();
	var redate = $("#redate").val();
	var time = $("#time").val();
	
	if(time == ""){
		$("#info").text("예약정보를 모두 입력해주세요.");
	} else {
		$.ajax({
			type : "POST",
			url : "/page/main3/room.php",
			data : { room : room, redate : redate, time : time },
			async : false,
			success : function(){
				if(data === ""){
					$("#info").text("예약가능한 룸입니다.");
					$("#rsv_btn").attr("disabled", false);
				} else {
					$("#info").text(data);
					$("#rsv_btn").attr("disabled", true);
				}
			}
		});
	}
}

// 가격 계산
function price(){
	var room = parseInt($("#room > option:checked").data("cost"), 10);
	var menu = 0;
	$(".spinner").each(function(){
		menu += parseInt($(this).data("cost"), 10) * parseInt($(this).val(), 10);
	});
	var total = room + menu;
	var vat = total * 0.1;
	
	$("#cost > span").eq(0).text(room.toLocaleString());
	$("#cost > span").eq(1).text(menu.toLocaleString());
	$("#cost > span").eq(2).text((total + vat).toLocaleString());
}

// 예약 완료
function rsvFrm(frm){
	var msg = "";
	
	if($("#room").val() == "") msg += $("#room").attr("title") + "을(를) 선택해주세요."; 
	else if($("#redate").val() == "") msg += $("#redate").attr("title") + "을(를) 선택해주세요.";
	else if($("#time").val() == "") msg += $("#time").attr("title") + "을(를) 선택해주세요.";
	
	else if(!$("#menu_list > tr").hasClass("check")){
		msg += "메뉴를 1개이상 선택해주세요.";
	} else {
		$("input.spinner:not(:disabled)", frm).each(function(){
			if($(this).val() == 0){
				msg += $(this).attr("title") + " 수량을 1개이상 선택해주세요.";
			}
		});
	}
	
	if(msg !== ""){
		alert(msg);
		return false;
	}
	
	$.post(
		"/include/ok.php",
		$(frm).serialize() + "&room_cost=" + $("#room > option:checked").data("cost"),
		function(data){
			if(data === ""){
				alert("예약이 완료되었습니다.");
				localStorage.removeItem("list");
			} else {
				alert(data);
			}
		}
	);
	return false;
}

$(function(){
	// 룸 목록
	roomList = roomList();
	for(var i in roomList){
		var room = roomList[i];
		$("#room").append('<option value="'+room['title']+'" data-image="'+room['image']+'" data-cleanday="'+room['cleanday']+'" data-cost="'+room['cost']+'">'+room['title']+'</option>');
	}
	
	// 메뉴 목록
	menuList = menuList();
	for(var i in menuList){
		var menu = menuList[i];
		var append = '<tr data-title="'+menu['title']+'">';
			append += '<td>';
				append += '<ul class="after">';
					append += '<li class="fl">';
						append += '['+menu['type']+'] / ';
						append += menu['title']+" / ";
						append += (menu['cost'].toLocaleString())+"원";
					append += '</li>';
					append += '<li class="fr">';
						append += '<input type="hidden" name="name[]" value="'+menu['title']+'" disabled>';
						append += '<input type="hidden" name="cost[]" value="'+menu['cost']+'" disabled>';
						append += '<input type="text" name="number[]" title="'+menu['title']+'" value="0" class="spinner" data-cost="'+menu['cost']+'" disabled>';
					append += '</li>';
				append += '</ul>';
			append += '</td>';
		append += '</tr>';
		$("#menu_list").append(append);
	}
	
	// 룸 선택
	$("#room").change(function(){
		$("#redate").val("");
		$("#time").val("");
		if($(this).val() === ""){
			$("#redate").attr("disabled", true);
		} else {
			$("#redate").attr("disabled", false);
		}
		ajax();
		price();
	}).trigger("change");
			
	// 날짜 선택
	$("#redate").datepicker({
		minDate : 1,
		dateFormat : "yy-mm-dd",
		beforeShowDay : function(date){
			// 다음날부터
			if(date > new Date()){
				var day = date.getDay();
				var week = new Array('월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일');
				var cleanDay = $("#room").children("option:selected").data("cleanday");
				
				// 룸 청소하는 날
				if(cleanDay == week[day]){
					return [false, "datepicker_cleanday", "룸 청소일입니다."]
				}
				
				// 휴업일
				if(day == 5){
					return [false, "datepicker_holiday", "레스토랑 휴업일입니다."]
				}
			}
			
			return [true];
		},
		onSelect : function(date){
			$("#time").val("");
			ajax();
		}
	});
	
	// 예약 시간대
	$("#time").change(function(){
		var msg = "";
		
		if($("#room").val() == ""){
			msg = $("#room").attr("title") + "을(를) 선택해주세요.";
			$("#rsv_btn").attr("disabled", true);
		} else if($("#redate").val() == ""){
			msg = $("#redate").attr("title") + "을(를) 선택해주세요.";
			$("#rsv_btn").attr("disabled", true);
		}
		
		
		if(msg != ""){
			$("#time").val("");
			alert(msg);
			return false;
		}
		
		ajax();
	});
	
	// 메뉴 선택
	$("#menu_list > tr").click(function(){
		if(!$("input.spinner", this).is(":focus")){
			$(this).toggleClass("check");
			var bool = !$(this).hasClass("check");
			
			$("input.spinner", this).val(0);
			$("input.spinner", this).spinner("option", "disabled", bool);
			$("input", this).prop("disabled", bool);
			
			price();
		}
	});
	
	// 개수 선택
	$(".spinner").spinner({
		min : 0,
		max : 100,
		step : 1,
		disabled : true,
		stop : function(e, ui){
			price();
		}
	});
	
	$("#time").change(function(){
		if($("#room").val() == ""){
		$("#rsv_btn").attr("disabled", true);
		} else if($("#redate").val() == ""){
			$("#rsv_btn").attr("disabled", true);
		} else if($("#time").val() == ""){
			$("#rsv_btn").attr("disabled", true);
		} else {
			$("#rsv_btn").attr("disabled", false);
		}
	});
	
	// 로컬 스토리지
	var arr = local("list");
	if(arr.length > 0){
		$("#menu_list > tr").each(function(){
			var title = $(this).data("title");
			if(arr.indexOf(title) !== -1){
				$(this).toggleClass("check");
				var bool = !$(this).hasClass("check");
				
				$("input.spinner", this).val(1);
				$("input.spinner", this).spinner("option", "disabled", bool);
				$("input", this).prop("disabled", bool);
				
				price();
			}
		});
	}
});
</script>