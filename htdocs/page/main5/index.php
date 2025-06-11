<div id="main5">
	<div class="main5-search">
    	<ul>
        	<li><input type="text" name="st-date" title="시작날짜" value="" placeholder="시작날짜" readonly> ~ <input type="text" name="en-date" title="종료날짜" value="" placeholder="종료날짜" readonly></li>
            <li>
            	<select name="type" title="종류">
                	<option value="0">-- 전체 --</option>
                    <option value="1">-- 제목 --</option>
                    <option value="2">-- 이름 --</option>
                </select>
            </li>
            <li><input type="text" name="search-key"  title="검색어" value="" placeholder="검색어를 입력해주세요."></li>
        </ul>
    </div>
    <table class="table">
    	<colgroup>
        	<col width="50%">
            <col width="25%">
            <col width="25%">
        </colgroup>
    	<thead>
        	<tr>
            	<th>제목</th>
                <th>이름</th>
                <th>날짜</th>
            </tr>
        </thead>
        <tbody class="ajax">
        </tbody>
    </table>
    <div class="search-end">▶ 더 이상 내용이 존재하지 않습니다.</div>
</div>
<script>
$(function(){
	var number = 0;
	var st_date = $("input[name=st-date]");
	var en_date = $("input[name=en-date]");
	var type = $("select");
	var key = $("input[name=search-key]");
	var end = $(".search-end");
	
	var st_dateValue = st_date.val();
	var en_dateValue = en_date.val();
	var typeValue = type.val();
	var keyValue = key.val();

	end.hide();
	
	$.ajax({
		type : "POST",
		url : "/page/main5/list.php",
		data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
		success : function(data){
			if(data){
				$(".ajax").html(data);
				number += 5;
			} else {
				$(".ajax").html("<tr><td colspan='3'>검색하신 결과가 존재하지 않습니다.</td></tr>");
			}
		}
	});
	
	st_date.datepicker({
		changeYear : true,
		changeMonth : true,
		onSelect : function(date){
			number = 0;
			st_dateValue = date;
			$.ajax({
				type : "POST",
				url : "/page/main5/list.php",
				data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
				success : function(data){
					if(data){
						$(".ajax").html(data);
						end.hide();
						number += 5;
					} else {
						$(".ajax").html("<tr><td colspan='3'>검색하신 결과가 존재하지 않습니다.</td></tr>");
					}
				}
			});
		},
		onClose : function(date){
			en_date.datepicker("option", "minDate", date);
		}
	});
	
	en_date.datepicker({
		changeYear : true,
		changeMonth : true,
		onSelect : function(date){
			number = 0;
			en_dateValue = date;
			$.ajax({
				type : "POST",
				url : "/page/main5/list.php",
				data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
				success : function(data){
					if(data){
						$(".ajax").html(data);
						end.hide();
						number += 5;
					} else {
						$(".ajax").html("<tr><td colspan='3'>검색하신 결과가 존재하지 않습니다.</td></tr>");
					}
				}
			});
		},
		onClose : function(date){
			st_date.datepicker("option", "maxDate", date);
		}
	});
	
	type.change(function(){
		number = 0;
		typeValue = type.val();
		$.ajax({
			type : "POST",
			url : "/page/main5/list.php",
			data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
			success : function(data){
				if(data){
					$(".ajax").html(data);
					end.hide();
					number += 5;
				} else {
					$(".ajax").html("<tr><td colspan='3'>검색하신 결과가 존재하지 않습니다.</td></tr>");
				}
			}
		});
	});
	
	key.keyup(function(){
		number = 0;
		keyValue = key.val();
		$.ajax({
			type : "POST",
			url : "/page/main5/list.php",
			data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
			success : function(data){
				if(data){
					$(".ajax").html(data);
					end.hide();
					number += 5;
				} else {
					$(".ajax").html("<tr><td colspan='3'>검색하신 결과가 존재하지 않습니다.</td></tr>");
				}
			}
		});
	});
	
	$(window).scroll(function(){
		if($(document).height() <= ($(window).scrollTop() + $(window).height())){
			$.ajax({
				type : "POST",
				url : "/page/main5/list.php",
				data : { line : number, st_date : st_dateValue, en_date : en_dateValue, type : typeValue, search_key : keyValue },
				success : function(data){
					if(data){
						$(".ajax").append(data);
						number += 5;
					} else {
						end.show();
					}
				}
			});
		}
	});
});
</script>