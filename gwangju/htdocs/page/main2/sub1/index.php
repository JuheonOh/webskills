<script>
var graph;
var xPadding = 50;
var yPadding = 50;
var data = null;

$(function(){
	var menuList = getXmlList();
	data = new Array();
	
	for(var i in menuList){
		var menu = menuList[i];
		
		data.push({ X : $.trim(menu.name), Y : menu.orderQy });
		var imgSrc = "data:" + menu.imgType + "," + menu.imgContents;
		var menuHtml = "<tr>";
		menuHtml += "<td><img src=\""+ imgSrc +"\" alt=\"" + menu.name + "\" title=\"" + menu.name + "\" width=\"" + menu.imgWidth + "\" height=\"" + menu.imgHeight + "\"></td>";
		menuHtml += "<td>"+ menu.kind +"</td>";
		menuHtml += "<td>"+ menu.menuCode +"</td>";
		menuHtml += "<td>"+ menu.kindName +"</td>";
		menuHtml += "<td align=\"left\">"+ $.trim(menu.name) +"</td>";
		menuHtml += "<td></td>";	
		menuHtml += "</tr>";
		
		$("#xml_list").append(menuHtml);
	}
		var arr = [0, 0, 0, 0, 0, 0];
		var first_rows = $("#xml_list > tr").get();
		
		$(".main2_search select").change(function(){
			
			$(first_rows).each(function(){
				$(this).removeClass("dn");
				
				var sortJ = $(".main2_search select[name=sort]").val();
				var menuName = $(".main2_search input[name=menuname]").val();
				
				if(sortJ !== ""){
					if(sortJ !== $(this).children().eq(1).text()){
						$(this).addClass("dn");
					}
				}
				if(menuName !== ""){
					if($("#main2_check1").attr("checked")){
						if($(this).children().eq(4).text() !== menuName){
							$(this).addClass("dn");
						}
					} else if($("#main2_check2").attr("checked")){
						if($(this).children().eq(4).text().indexOf(menuName) === -1){	
							$(this).addClass("dn");
						}
					}
				}
			});
			
		});
		
		$(".main2_search input").keyup(function(){
			$(first_rows).each(function(){
				$(this).removeClass("dn");
				
				var sortJ = $(".main2_search select[name=sort]").val();
				var menuName = $(".main2_search input[name=menuname]").val();
				
				if(sortJ !== ""){
					if(sortJ !== $(this).children().eq(1).text()){
						$(this).addClass("dn");
					}
				}
				
				if(menuName !== ""){
					if($("#main2_check1")){
						if($(this).children().eq(4).text() !== menuName){
							$(this).addClass("dn");
						}
					}
				}
			});
		});
		
		$("#main2sub1 > table > thead > tr > th").click(function(){
			
			var lh = $(this).index();
			
			$("#main2sub1 > table > thead > tr > th").not(this).each(function(){
                arr[$(this).index()] = 0;
				$(this).html($(this).html().replace(/▼|▲/, "")+"");
            });
			
			if(arr[lh] === 0){
				arr[lh] = 1;
				$(this).html($(this).html().replace(/▼|▲/, "")+" ▲");
			} else if(arr[lh] === 1){
				arr[lh] = 2;
				$(this).html($(this).html().replace(/▼|▲/, "")+" ▼");
			} else if(arr[lh] === 2){
				arr[lh] = 0;
				$(this).html($(this).html().replace(/▼|▲/, "")+"");
			}
			
			var rows = $("#xml_list > tr").get();
			
			rows.sort(function(a, b){
				var keyA = $(a).children('td').eq(lh).text().toUpperCase();
				var keyB = $(b).children('td').eq(lh).text().toUpperCase();
				if(keyA < keyB){
					if(arr[lh] === 1){
						return -1;
					} else if(arr[lh] === 2){
						return 1;
					}
				}
				
				if(keyA > keyB){
					if(arr[lh] === 1){
						return 1;
					} else if(arr[lh] === 2){
						return -1;
					}
				}
				
				return 0;
			});
			
			if(arr[lh] === 0) rows = first_rows;
			
			$(rows).each(function(index, row){
				$("#xml_list").append(row);
			});
		});
	
	canvas();
});

function canvas(){
	graph = $("#canvas");
	var ctx = graph[0].getContext("2d");
	
	ctx.clearRect(0, 0, graph.width(), graph.height());
	ctx.fillStyle = "#000000";
	ctx.font = "bold 2em 나눔고딕";
	ctx.fillText("예약, 주문 현황 차트", 100, 50);
	ctx.font = "bold 1em 나눔고딕";
	ctx.fillStyle = "#0000ff";
	ctx.fillRect(480, 42, 10, 10);
	ctx.fillStyle = "#000000";
	ctx.fillText("예약현황", 500, 50);
	ctx.fillStyle = "#FF0000";
	ctx.fillRect(580, 42, 10, 10);
	ctx.fillStyle = "#000000";
	ctx.fillText("주문현황", 600, 50);
	
	ctx.lineWidth = 2;
	ctx.strokeStyle = "#000000";
	ctx.beginPath();
	ctx.moveTo(xPadding, 100);
	ctx.lineTo(xPadding, graph.height() - yPadding);
	ctx.lineTo(graph.width() - 100, graph.height() - yPadding);
	ctx.stroke();
	
	ctx.textAlign = "center";
	
	for(var i = 0; i < data.length; i++){
		ctx.fillText(data[i].X, getXPixel(i), graph.height() - yPadding + 20);
	}
	
	ctx.textAlign = "right"
	ctx.textBaseline = "middle";
	for(var i = 0; i < getMaxY(); i += 100){
		ctx.fillText(i, xPadding - 10, getYPixel(i));
	}
	
	ctx.fillStyle = "#FF0000";
	for(var i = 0; i < data.length; i++){
		$.ajax({
			method: "POST",
			url : "/page/main2/sub1/list.php",
			data : { name : data[i].X },
			async : false,
			success : function(d){
				ctx.fillRect(getXPixel(i)-10, graph.height() - yPadding, 20, getYPixel(parseInt(d, 10)) - (graph.height() - yPadding));
			}
		});
	}
	
	ctx.strokeStyle = "#0000ff";
	ctx.beginPath();
	ctx.moveTo(getXPixel(0), getYPixel(data[0].Y));
	for(var i = 0; i < data.length; i ++){
		ctx.lineTo(getXPixel(i), getYPixel(data[i].Y));
		/*
		ctx.textAlign = "left";
		ctx.fillText(data[i].Y,getXPixel(i)-10,getYPixel(data[i].Y)-10);
		*/
	}
	ctx.stroke();
	
	setTimeout(function(){
		canvas();
	}, 1000);
}

function getMaxY(){
	var max = 0;
	
	for(var i = 0; i < data.length; i ++)
		if(data[i].Y > max)
			max = data[i].Y;
	
	max += 10 - max % 10;
	return max;
}

function getXPixel(val){
	return ((graph.width() - xPadding - 100) / data.length) * val + (xPadding * 3);
}

function getYPixel(val){
	return graph.height() - (((graph.height() - yPadding - 100) / getMaxY()) * val) - yPadding;
}

</script>
<div class="main2sub1" id="main2sub1">
    <form id="main2sub1_frm" action="#" method="post" onSubmit="return false;">
        <div>
            <ul class="main2_search">
                <li><label for="main2_sort">구분검색</label>
                    <select id="main2_sort" name="sort" title="구분조건">
                        <option value="">전체</option>
                        <option value="M">메인요리</option>
                        <option value="D">디저트</option>
                        <option value="E">음료/기타</option>
                    </select>
                </li>
                <li><label for="main2_menuname">메뉴명</label><input type="text" id="main2_menuname" name="menuname" title="메뉴명" value="" placeholder="메뉴를 입력해주세요."></li>
            </ul>
        </div>
    </form>
    <table>
        <colgroup>
            <col width="20%">
            <col width="12%">
            <col width="12%">
            <col width="15%">
            <col width="30%">
            <col width="11%">
        </colgroup>
        <thead>
            <tr>
                <th>이미지</th>
                <th>구분코드</th>
                <th>메뉴코드</th>
                <th>구분</th>
                <th>메뉴명</th>
                <th>비고</th>
            </tr>
        </thead>
        <!-- xml -->
        <tbody id="xml_list">
        </tbody>
        <!-- //xml -->
    </table>
    <div id="canvas_box" style="margin-top:30px;">
    	<canvas id="canvas" width="2000" height="1000"></canvas>
    </div>
</div>