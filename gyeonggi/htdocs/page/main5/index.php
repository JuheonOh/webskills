<div id="main5">
	<table class="table1">
    	<tbody>
        	<tr>
            	<td><label for="main5_date">날짜 검색</label></td>
                <td><input type="text" id="main5_date" name="date" title="날짜검색어" value="<?php echo date("Y-m-d"); ?>" placeholder="날짜를 선택하려면 클릭하세요." readonly></td>
            </tr>
        </tbody>
    </table>
    <div class="mt30">
        <ul id="rsv_list">
            <li>청소요일입니다.</li>
        </ul>
	</div>
</div>
<script>
var roomList;

function ajax(date){
	var arrA = new Array();
	var arrB = new Array();
	var arrC = new Array();
	for(key in roomList){
		var room = roomList[key];
		
		arrA.push(room['title']);
		arrB.push(room['cleanday']);
		arrC.push(room['image']);
	}
	
	
	$.post(
		"/page/main5/list.php",
		{ date : date, "room[]" : arrA, "cleanday[]" : arrB, "image[]" : arrC },
		function(data){
			$("#rsv_list").html(data);
		}
	);
}

$(function(){
	roomList = roomList();
	
	var date = $("#main5_date");
	date.datepicker({
		dateFormat : "yy-mm-dd",
		onSelect : function(date){
			ajax(date);
		}
	});
	ajax(date.val());
});

// 삭제
function del(self, idx){
	$.post(
		"/page/main5/delete.php",
		{ idx : idx },
		function(data){
			alert("예약이 취소되었습니다.");
			$(self).parent().find("button").remove();
		}
	);
}
</script>