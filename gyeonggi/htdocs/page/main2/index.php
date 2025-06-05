<div id="main2">
	<form onSubmit="return false;">
    	<fieldset>
        	<legend>메뉴 검색</legend>
            <table class="table1">
            	<colgroup>
                	<col width="20%">
                </colgroup>
                <tbody>
                	<tr>
                    	<td>종류</td>
                        <td>
                        	<ul id="type_list" class="after">
                            	<li><label for="type_all">전체 <input type="radio" id="type_all" name="type" title="전체" value="" checked></label></li>
                                <li><label for="all_menu">전채요리 <input type="radio" id="all_menu" name="type" title="전채요리" value="전채요리"></label></li>
                                <li><label for="main_menu">메인요리 <input type="radio" id="main_menu" name="type" title="메인요리" value="메인요리"></label></li>
                                <li><label for="after_menu">후식 <input type="radio" id="after_menu" name="type" title="후식" value="후식"></label></li>
                                <li><label for="drink_menu">음료 <input type="radio" id="drink_menu" name="type" title="음료" value="음료"></label></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                    	<td>가격대</td>
                        <td>
                        	<div id="slider"></div>
                            <p><span id="min_price">0</span>원 ~ <span id="max_price">100,000</span>원</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <p class="help">마우스 왼쪽 더블클릭으로 추가된 메뉴를 삭제할 수 있습니다. 그리고 선택된 메뉴 리스트가 1개 이상이어야 선택한 메뉴를 예약 할 수 있습니다.</p>
    <div>
    	<table class="table2">
        	<thead>
            	<tr>
                	<th>선택된 메뉴 리스트</th>
                </tr>
            </thead>
            <tbody id="main2_select" class="pointer">
            	<tr>
                	<td>선택된 메뉴가 없습니다.</td>
                </tr>
            </tbody>
        </table>
        <div>
        	<button title="선택된 메뉴 예약하기" id="menu_btn" disabled>선택된 메뉴 예약하기</button>
        </div>
    </div>
    <p class="help">마우스 왼쪽 더블클릭으로 '선택된 메뉴 리스트'에 메뉴를 추가할 수 있습니다. ( 같은 메뉴를 2개 이상 추가할 수 없습니다. )</p>
    <table class="table2">
    	<colgroup>
        	<col width="40%">
        </colgroup>
        <thead>
        	<tr>
            	<th>메뉴 및 음료이미지</th>
                <th>메뉴 및 음료정보</th>
            </tr>
        </thead>
        <tbody id="menu_list" class="pointer">
        </tbody>
    </table>
</div>
<script>
// 초기화
var start = 0;
var end = 100000;
var type = "";

// 범위 검색
function menuSearch(){
	var count = 0;
	
	$("#menu_list > tr").each(function(){
        var type2 = $(this).data("type");
		var price = parseInt($(this).data("price"), 10);
		
		if((type === type2 || type === "") && price >= start && price <= end){
			count += 1;
			$(this).show();
		} else {
			$(this).hide();
		}
    });
	
	if(count === 0){
		$("#menu_list > tr.dn").show();
	} else {
		$("#menu_list > tr.dn").hide();
	}
}

$(function(){
	
	// 라디오 버튼
	$("input[name=type]").change(function(){
		type = $(this).val();
		
		menuSearch();
	});
	
	// 슬라이드
	$("#slider").slider({
		range : true,
		min : 0,
		max : 100000,
		values : [ 0, 100000 ],
		step : 1000,
		slide : function(e, ui){
			start = ui.values[0];
			end = ui.values[1];
			
			$("#min_price").text(start.toLocaleString());
			$("#max_price").text(end.toLocaleString());
			
			menuSearch();
		}
	});
	
	// 메뉴 목록
	var menu = menuList();
	var html = "";
	for(var i = 0; i < menu.length; i++){
		html += "<tr data-title=\""+menu[i]["title"]+"\" data-type=\""+menu[i]["type"]+"\" data-price=\""+menu[i]["cost"]+"\">";
			html += "<td>";
				html += "<img src=\"/image/"+menu[i]["image"]+"\" title=\""+menu[i]["image"]+"\" alt=\""+menu[i]["image"]+"\">";
			html += "</td>";
			html += "<td>";
				html += "<ul class=\"main2_menu_list tal\">";
					html += "<li>메뉴명 및 음료명 : "+menu[i]["title"]+"</li>";
					html += "<li>설명 : <span>"+menu[i]["description"]+"</span></li>";
					html += "<li>종류 : <span>"+menu[i]["type"]+"</span></li>";
					html += "<li>가격 : <span>"+menu[i]["cost"]+"</span></li>";
				html += "</ul>";
			html += "</td>";
		html += "</tr>";
	}
	html += "<tr class=\"dn\"><td colspan=\"2\">결과가 없습니다.</td></tr>";
	$("#menu_list").html(html);
	
	// 메뉴 선택
	$("#menu_list > tr:not(:last-child)").dblclick(function(){
		var title = $(this).data("title");
		var index = $(this).index();
		
		if($("#main2_select > tr").is('[data-idx="'+index+'"]')){
			alert("메뉴를 선택 하셨습니다.");
			return;
		}
		
		$("#main2_select").prepend("<tr data-idx=\""+index+"\"><td>"+title+"</td></tr>");
		$("#main2_select > tr:last-child").hide();
		$("#menu_btn").attr("disabled", false);
	});
	
	// 음식 삭제
	$("#main2_select").delegate("tr:not(:last-child)", "dblclick", function(){
		$(this).remove();
		
		if($("#main2_select > tr").length === 1){
			$("#menu_btn").attr("disabled", true);
			$("#main2_select > tr").show();
		}
	});
	
	// 버튼 클릭
	$("#menu_btn").click(function(){
		var arr = new Array();
		
		$("#main2_select > tr:not(:last-child)").each(function(){
			arr.push($(this).text());
		});
		
		local("list", arr);
		link("/main3");
	});
	
});
</script>
