<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	access(isset($_SESSION['userid']));
?>
<script>
$(function(){
	
	var menuList = getXmlList();
	
	for(var i in menuList){
		var menu = menuList[i];
		var imgSrc = "data:" + menu.imgType + "," + menu.imgContents;
		var menuHtml = "<tr>";
		menuHtml += "<td><img src=\""+ imgSrc +"\" alt=\"" + $.trim(menu.name) + "\" title=\"" + $.trim(menu.name) + "\" width=\"" + menu.imgWidth + "\" height=\"" + menu.imgHeight + "\" class=\'drag\'></td>";
		menuHtml += "<td align=\"left\">"+ $.trim(menu.name) +"</td>";
		menuHtml += "<td>"+ menu.kindName +"</td>";
		menuHtml += "</tr>";
		
		$("#xml_list").append(menuHtml);
	}
	
	$("#main3sub1_redate").datepicker({
		dateFormat : "yy-mm-dd",
		minDate : 0,
	});
	
	$("#main3sub1_number").spinner({
		min : 1,
	});
	
	$(".drag").draggable({
		revert : "invalid",
		helper : "clone"
	});
	
	$("#drop").droppable({
		drop : function(e, ui){
			var self = ui.helper;
			self.remove();
			
			$(".main3sub1_tr").hide();
			var name = self.attr("alt");
			var bool = true;
			
			var t = $(".main3sub1_tbody");
			var is = $("tr", t);
			
			
			$(".main3sub1_menunumber").each(function(){
				if($(this).data("name") == name){
					$(this).val(parseInt($(this).val(), 10) + 1);
					bool = false;
				}
			});
			
			if(bool){
				$(".main3sub1_tbody").prepend("<tr>\
						<td><img src=\""+self.attr("src")+"\" alt=\""+name+"\" title=\""+name+"\" class=\"drag\"></td>\
						<td><label for=\"main3sub1_menunumber\"><input type=\"text\" id=\"main3sub1_menunumber\" name=\"menunumber["+name+"]\" class=\"main3sub1_menunumber\" style=\"border:1px solid #bfbfbf\" title=\"메뉴 수량\" data-name=\""+name+"\" value=\"1\" readonly></label></td>\
				 </tr>");
			}
			
		 	$("#main3sub1_menunumber").spinner({
				min : 1,
			});
		}
	});	
});
</script>
<div class="main3sub1">
    <div class="main3sub1_left">
        <h3>메뉴 목록</h3>
        <table>
            <colgroup>
                <col width="30%">
                <col width="40%">
                <col width="30%">
            </colgroup>
            <thead>
                <tr>
                    <th>이미지</th>
                    <th>메뉴</th>
                    <th>종류</th>
                </tr>
            </thead>
            <tbody id="xml_list">
            </tbody>
        </table>
    </div>
    <div class="main3sub1_right">
        <h3>예약 정보</h3>
        <form id="main3sub1_frm" action="/include/ok.php" method="post" onSubmit="return main3sub1frm(this);">
            <div>
                <input type="hidden" name="action" value="main3sub1_frm">
            </div>
            <ul class="main3sub1_form">
                <li><label for="main3sub1_name"><input type="text" id="main3sub1_name" name="name" title="성함" placeholder="성함을 입력해주세요."></label></li>
                <ul class="number">
                <li><label for="main3sub1_tel"><input type="text" id="main3sub1_tel" name="tel" title="휴대폰 번호" placeholder="ex) 0000-0000-0000"></label></li>
                </ul>
                <li><label for="main3sub1_number">예약인원</label><input type="text" id="main3sub1_number" name="number" title="예약인원" placeholder="예약인원을 입력해주세요." value="1" readonly></li>
                <li class="date">
                    <ul>
                        <li><label for="main3sub1_redate"><input type="text" id="main3sub1_redate" name="redate" title="예약일시" value="" placeholder="예약일시를 선택하려면 클릭하세요." readonly></label>&nbsp;</li>
                        <li>
                            <label for="main3sub1_time">
                                <select id="main3sub1_time" name="time" title="예약시간">
                                    <option value="">시간</option>
                                    <option value="10">10시</option>
                                    <option value="11">11시</option>
                                    <option value="12">12시</option>
                                    <option value="13">13시</option>
                                    <option value="14">14시</option>
                                    <option value="15">15시</option>
                                    <option value="16">16시</option>
                                    <option value="17">17시</option>
                                    <option value="18">18시</option>
                                    <option value="19">19시</option>
                                    <option value="20">20시</option>
                                    <option value="21">21시</option>
                                </select>
                            </label>&nbsp;
                        </li>
                        <li>
                            <label for="main3sub1_minute">
                                <select id="main3sub1_minute" name="minute" title="예약분">
                                    <option value="">분</option>
                                    <option value="00">00분</option>
                                    <option value="30">30분</option>
                                </select>
                            </label>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li><label for="main3sub1_check">개인정보 수집에 동의합니다.</label></li>
                        <li><input type="checkbox" id="main3sub1_check" name="check"></li>
                    </ul>
                </li>
                <li><input type="submit" title="예약완료" value="예약완료"></li>
                <li>
                    <table class="reservation">
                        <colgroup>
                            <col width="40%">
                            <col width="60%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>메뉴 이미지</th>
                                <th>기능</th>
                            </tr>
                        </thead>
                    </table>
                        <li id="drop">예약하려는 메뉴 사진을 이곳에 놓아주세요.</li>
                    <table>
                        <tbody class="main3sub1_tbody">
                            <colgroup>
                                <col width="40%">
                                <col width="60%">
                            </colgroup>
                            <tr class="main3sub1_tr">
                                <td colspan="2">메뉴가 선택되지 않았습니다.</td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>
        </form>
    </div>
</div>
