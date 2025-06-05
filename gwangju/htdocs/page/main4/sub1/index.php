<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	if(!$_SESSION['lv'] == "관리자"){
		alert("접근할 수 없는 페이지 입니다.");
		?>
        <script>window.close();</script>
        <?php
	}
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/common/js/jquery/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="/common/css/main4sub1.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui.js"></script>
<script src="/common/js/jquery/jquery.ui.datepicker-ko.js"></script>
<script src="/common/js/common.js"></script>
<title>Quiabeiro</title>
<script>
function change(arr){
	arr.sort(function(a, b){
		var keyA = a[1].replace(/:/g, "");
		var keyB = b[1].replace(/:/g, "");
		if(keyA > keyB){
			return -1;
		} else {
			return 1;
		}
	});
	
	return arr;
}
	
function localList(){
	var localArr = localStorage.getItem("menu_list") === null ? new Array() : JSON.parse(localStorage.getItem("menu_list"));
	
	if(localArr.length){
		localArr = change(localArr);
		
		var html = "";
		for(var i = 0; i < localArr.length; i++){
			if(localArr[i][2] == $("#date_search").val()){
				html += "<tr class='ajax_list'>\
					<td>"+localArr[i][0]+"</td>\
					<td>"+localArr[i][1]+"</td>\
					<td><button title='삭제' onClick=\"localDelete("+(i)+")\">삭제</button</td>\
				</tr>";
			}
		}
		
		if(html !== ""){
			$("#local_list").html(html);
			return;
		}
	}
	
	$("#local_list").html("<tr><td colspan=\"3\">검색결과가 존재하지 않습니다.</td></tr>");
}

function local(menu, time, date){
	var localArr = localStorage.getItem("menu_list") === null ? new Array() : JSON.parse(localStorage.getItem("menu_list"));
	
	localArr[localArr.length] = [menu, time, date];
	localStorage.setItem("menu_list", JSON.stringify(localArr));
	
	localList();
}

function sFrm(frm){
	var bool = frmChk(frm, 'food_name', 'time', 'minute');
	
	if(	bool){
		var date = $("#date_search").val();
		var menu = $("#food_name").val();
		var hour = $("#main3sub1_time").val();
		var minute = $("#main3sub1_minute").val();
		
		var time = hour+":"+minute+":00";
	}
	
	local(menu, time, date);
	
	return false;
}

function localDelete(len){
	var localArr = localStorage.getItem("menu_list") === null ? new Array() : JSON.parse(localStorage.getItem("menu_list"));
	
	localArr = change(localArr);
	
	localArr.splice(len, 1);
	localStorage.setItem("menu_list", JSON.stringify(localArr));
	
	localList();
}

function rsvLocal(self, idx, menu, time, date){
	var self = $(self).parents("tr");
	self.remove();
	
	$.post(
		"/page/main4/sub1/update.php",
		{ idx : idx },
		function(data){
			local(menu, time, date);
		}
	);
}


function rsvDelete(self, idx){
	var self = $(self).parents("tr");
	self.remove();
	
	$.post(
		"/page/main4/sub1/delete.php",
		{ idx : idx }
	);
}


function rsvList(date){
	$.post(
		"/page/main4/sub1/select.php",
		{ date : date },
		function(data){
			$("#rsv_list").html(data);
			localList();
		}
	);
}

$(function(){
	localList();
	
	var processbar = $("#processbar");
	var text = $("#processbar_text");
	var date = $("#date_search");
	var time = $("#time_control");
	var st = time.val() * 10;
	var stime = setInterval(function() { process(); }, st);

	date.datepicker({
		minDate : 0,
		dateFormat : "yy-mm-dd",
	});
	
	processbar.progressbar({
		value : false,
		change : function(){
			$("#count").text(Math.floor(time.val()-processbar.progressbar("value")*(st/1000)));
		}
	});
	
	function process(){
		var val = processbar.progressbar("value") || 0;
		processbar.progressbar("value", val+1);
		
		if(val == 99){
			processbar.progressbar("value", 0);
			rsvList(date.val());
		}
	}
	
	$("#process_control").click(function(){
		if($(this).text() === "||"){
			clearInterval(stime);
			$(this).text("▶");
		} else if($(this).text() === "▶"){
			stime = setInterval(function(){ process(); }, st);
			$(this).text("||");
		}
	});
	
	time.change(function(){
		clearInterval(stime);
		processbar.progressbar("value", 0);
		time = $(this);
		st = time.val() * 10;
		stime = setInterval(function() { process(); }, st);
	});
	
	date.change(function(){
		clearInterval(stime);
		date = $(this);
		processbar.progressbar("value", 0);
		rsvList(date.val());
		stime = setInterval(function(){ process(); }, st);
	});
	
	$("#process_refresh").click(function(){
		processbar.progressbar("value", 0);
	})
	
});
</script>
</head>
<body>
<div id="wrap">
	<header id="header">
    	<div class="wrap">
	        <h1 id="logo"><img src="../../../image/main4sub1logo.png" title="LOGO" alt="LOGO"></h1>
            <div id="header_right">
            	<ul>
                	<li class="date_search">
                    	<form id="date_frm" action="#" method="post" onSubmit="return false;" enctype="multipart/form-data">
                        	<div>
                            	<label for="date_search"><input type="text" id="date_search" name="date_search" title="date_search" title="날짜" value="<?php echo date("Y-m-d"); ?>" placeholder="날짜" readonly></label>
                            </div>
                        </form>
                    </li>
                    <li class="time_ctl">
                    	<form id="processbar_frm" action="/page/main4/sub1/index.php" method="post" onSubmit="return false;" enctype="multipart/form-data">
                        	<div>
                            	<label for="time_control">
                                	<select id="time_control" name="time_control ">
                                    	<option value="3">3초</option>
                                    	<option value="5">5초</option>
                                    	<option value="15">15초</option>
                                        <option value="30">30초</option>
                                        <option value="60">60초</option>
                                    </select>
                                </label>
                            </div>
                        </form>
                    </li>
                    <li><a href="javascript:void(0);" title="다시시작" id="process_refresh">다시시작</a></li>
                    <li><a href="javascript:void(0);" title="프로세스바 제어" id="process_control">||</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="contents">
        <div class="content">
        	<div class="wrap">
                <div class="dashboard">
                    <div id="processbar">
                    	<div id="processbar_text"><span id="count">0</span>초 남았습니다.</div>
                    </div>
                    <div class="main4sub1">
                    <div class="main4sub1_left">
                    <section id="order_status" class="order">
                        <h3>주문현황</h3>
                        <div class="scroll">
                        <table>
                            <colgroup>
                                <col width="60%">
                                <col width="20%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>메뉴[개수]</th>
                                    <th>주문일시</th>
                                    <th>기능</th>
                                </tr>
                            </thead>
                            <tbody id="local_list">
                                <tr>
                                	<td colspan="3">검색결과가 존재하지 않습니다.</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </section>
                    <section id="reservation_status" class="reservation">
                        <h3>예약현황</h3>
                        <div class="scroll">
                        <table>
                        	<colgroup>
                            	<col width="15%">
                                <col width="40%">
                                <col width="20%">
                                <col width="25%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>예약자</th>
                                    <th>메뉴[개수]</th>
                                    <th>예약일시</th>
                                    <th>기능</th>
                                </tr>
                            </thead>
                            <tbody id="rsv_list">
                            	<?php
									$rsv = $pdo->query("select * from rsv where date=curdate() and type='' order by time desc");
									if($rsv->rowCount()){
									while($list = $rsv->fetch()){
										$arr = NULL;
										$r_menu = $pdo->query("select * from r_menu where ridx='{$list['idx']}'");
								?>
                                <tr>
                                	<td><?php echo $list['name']; ?></td>
                                    <td align="left">
                                    	<?php
											while($menu_list = $r_menu->fetch()){
												$arr[] = $menu_list['name']."[".$menu_list['number']."]";
											}
											$arr = implode(", ", $arr);
											echo $arr;
										?>
                                    </td>
                                    <td>
                                    	<?php echo $list['time']; ?>
                                    </td>
                                    <td>
                                    	<button title="주문" onClick="rsvLocal(this, '<?php echo $list['idx']; ?>', '<?php echo $arr; ?>', '<?php echo $list['time']; ?>', '<?php echo $list['date']; ?>')">주문</button>
                                        <button title="삭제" onClick="rsvDelete(this, <?php echo $list['idx']; ?>);">삭제</button>
                                    </td>
                                </tr>
                                <?php } } else { ?>
                                <tr>
                                	<td colspan="4">검색결과가 존재하지 않습니다.</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    </section>
                    </div>
                    <div class="main4sub1_right">
                    <section id="order_add" class="order_add">
                    	<h3>주문추가</h3>
                        <form id="order_frm" method="post" onSubmit="return sFrm(this);">
                            <ul class="order_add_box">
                                <li class="menu">
	                                <h4>메뉴 입력</h4>
                                	<ul>
                                    	<li><label for="food_name"><input type="text" name="food_name" id="food_name" title="메뉴 입력" placeholder="메뉴[수량]"></label></li>
                                    </ul>
                                </li>
                                <li class="time">
                                	<h4>시간 선택</h4>
                                    <ul>
                                        <li>
                                            <label for="main3sub1_time">
                                                <select id="main3sub1_time" name="time" title="주문시간">
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
                                            </label>&nbsp;:&nbsp;
                                            <label for="main3sub1_minute">
                                                <select id="main3sub1_minute" name="minute" title="주문시간">
                                                    <option value="">분</option>
                                                    <option value="00">00분</option>
                                                    <option value="30">30분</option>
                                                </select>
                                            </label>
                                        </li>
                                    </ul>
                                </li>
                                <li class="order_button"><input type="submit" title="주문완료" value="주문완료"></li>
                            </ul>
                        </form>
                    </section>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
    	<p>Copyright &copy; QUIABEIRO All Right Reserved</p>
    </footer>
</div>
</body>
</html>