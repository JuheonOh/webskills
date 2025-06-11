<form id="rsv_frm" action="/page/main3/sub1/rsv_ok.php" method="post" onSubmit="return rsvSubmit(this);">
	<div>
		<input type="hidden" id="date" name="date" value="">
		<input type="hidden" id="rsv_userid" name="userid" value="<?php if (isset($_SESSION['userid']))
			echo $_SESSION['userid']; ?>">
	</div>
	<div id="main3sub1">
		<div class="after">
			<div>
				<fieldset>
					<legend>달력</legend>
					<div id="datepicker"></div>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<legend>시간</legend>
					<div>
						<ul>
							<li><label for="lunch">점심</label></li>
							<li><input type="radio" id="lunch" name="time" title="점심" value="lunch"></li>
						</ul>
						<ul>
							<li><label for="dinner">저녁</label></li>
							<li><input type="radio" id="dinner" name="time" title="저녁" value="dinner"></li>
						</ul>
					</div>
				</fieldset>
			</div>
			<div id="hall_box" class="mt50">
				<fieldset>
					<legend>홀</legend>
					<ul class="after tac">
						<li>
							<figure>
								<div><img src="/image/European Hall.jpg" alt="European Hall" title="European Hall"></div>
								<figcaption>
									<p>잔여좌석 : <span class="remain_seat">--</span></p>
									<p><label for="europeanHall">European Hall</label></p>
									<input type="radio" id="europeanHall" name="hall" title="European Hall" value="European Hall">
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<div><img src="/image/Japanese Hall.jpg" alt="Japanese Hall" title="Japanese Hall"></div>
								<figcaption>
									<p>잔여좌석 : <span class="remain_seat">--</span></p>
									<p><label for="japaneseHall">Japanese Hall</label></p>
									<input type="radio" id="japaneseHall" name="hall" title="Japanese Hall" value="Japanese Hall">
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<div><img src="/image/Chinese Hall.jpg" alt="Chinese Hall" title="Chinese Hall"></div>
								<figcaption>
									<p>잔여좌석 : <span class="remain_seat">--</span></p>
									<p><label for="chineseHall">Chinese Hall</label></p>
									<input type="radio" id="chineseHall" name="hall" title="Chinese Hall" value="Chinese Hall">
								</figcaption>
							</figure>
						</li>
					</ul>
				</fieldset>
			</div>
			<div class="seat_box mt50">
				<fieldset>
					<legend>좌석 { <span id="seat_name">선택된 홀이 없습니다.</span> }</legend>
					<div id="seat_box" class="tac">
						홀을 선택해주세요.
					</div>
				</fieldset>
			</div>
		</div>
		<div class="mt50">
			<fieldset>
				<legend>드래그, 드롭</legend>
				<div id="drag">
					<ul class="tac after">
						<li>
							<figure>
								<div><img src="/image/Course_A.jpg" alt="Course_A" title="Course_A"></div>
								<figcaption>
									<p class="menu" data-menu="Course A">Course A</p>
									<p><span class="price" data-price="110000">110,000</span>원</p>
									<button class="cancel dn" onClick="cancel(this)">취소</button>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<div><img src="/image/Course_B.jpg" alt="Course_B" title="Course_B"></div>
								<figcaption>
									<p class="menu" data-menu="Course B">Course B</p>
									<p><span class="price" data-price="130000">130,000</span>원</p>
									<button class="cancel dn" onClick="cancel(this)">취소</button>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<div><img src="/image/Course_C.jpg" alt="Course_C" title="Course_C"></div>
								<figcaption>
									<p class="menu" data-menu="Course C">Course C</p>
									<p><span class="price" data-price="160000">160,000</span>원</p>
									<button class="cancel dn" onClick="cancel(this)">취소</button>
								</figcaption>
							</figure>
						</li>
						<li>
							<figure>
								<div><img src="/image/Course_D.jpg" alt="Course_D" title="Course_D"></div>
								<figcaption>
									<p class="menu" data-menu="Course D">Course D</p>
									<p><span class="price" data-price="220000">220,000</span>원</p>
									<button class="cancel dn" onClick="cancel(this)">취소</button>
								</figcaption>
							</figure>
						</li>
					</ul>
				</div>
			</fieldset>
			<fieldset class="drop mt50 after">
				<legend>드롭영역</legend>
				<ul id="drop">
				</ul>
			</fieldset>
			<p class="mt10 tar">총 결제 금액 : <span id="total_price" class="red">0</span>원</p>
		</div>
		<div class="tac mt50">
			<input type="submit" title="예약완료" value="예약완료">
		</div>
	</div>
</form>
<script>
	var localCount = 0;
	var seatArr = new Array();
	// 체크 
	function ajax() {
		var date = $("#date").val();
		var time = $("[name=time]:checked").val();
		var hall = $("[name=hall]:checked").val();

		if (time === undefined) {
			if (hall !== undefined) {
				alert("예약시간을 먼저 선택해주세요.");
				$("[name=hall]").prop("checked", false);
				return;
			}
		} else {
			if (hall !== undefined) {
				$("#seat_name").text(hall);
			}
		}

		$.ajax({
			type: "POST",
			cache: false,
			data: { date: date, time: time, hall: hall },
			url: "/page/main3/sub1/check.php",
			dataType: "JSON",
			success: function (data) {
				if (data[1].length > 0) {
					for (var key in data[1]) {
						$(".remain_seat").eq(key).text(data[1][key] + "석");
					}
				}

				if (hall !== undefined) {
					seat(data[2]);
				}

				// 달력
				$("#datepicker").datepicker({
					minDate: 1,
					defaultDate: date,
					altField: "#date",
					altFormat: "yy-mm-dd",
					dateFormat: "yy-mm-dd",
					onChangeMonthYear: function (year, month) {
						ajax();
					},
					beforeShowDay: function (date) {
						var date2 = $.datepicker.formatDate("yy-mm-dd", date);
						if (data[0].indexOf(date2) !== -1) {
							return [false, "seat_full", "예약이 만료되었습니다."];
						}
						return [true];
					},
					onSelect: function (date) {
						ajax();
					}
				}).datepicker("refresh");

				$("td.seat_full > span").click(function () {
					alert("예약이 모두 완료되었습니다.");
				});
			},
			error: function (err) {
				console.error(err);
			}
		});
	}

	// 좌석
	function seat(arr) {
		var html = '<ul class="after">';
		for (var i = 0; i <= 3; i++) {
			var alphabet = String.fromCharCode(65 + i);
			for (var k = 1; k <= 5; k++) {
				var self = (i * 5) + k;
				if (arr.indexOf(String(self)) !== -1) {
					html += '<li class="not"><p>' + (alphabet + k) + '</p><input type="checkbox" name="seat[]" value="' + self + '" class="seat"></li>';
				} else {
					html += '<li><p>' + (alphabet + k) + '</p><input type="checkbox" name="seat[]" value="' + self + '" class="seat"></li>';
				}
			}
		}
		html += '</ul>';
		$("#seat_box").html(html);

		if (localCount === 0 && localStorage.getItem("list") !== null) {
			for (var key in seatArr) {
				$("#seat_box li").eq(seatArr[key] - 1).addClass("ui-selected").find("input").attr("checked", true);
			}
			localCount++;
		}
	}

	// 삭제
	function cancel(self) {
		var total_price = parseInt($("#total_price").text().replace(/,/g, ""), 10);
		var price = parseInt($(self).parent().find(".price").text().replace(/,/g, ""), 10);
		$("#total_price").html((total_price - price).toLocaleString());
		$(self).parents("li").remove();
		if ($("#drop > li").length === 1) $("#drop > li.db").show();
	}

	// 폼 전송
	function rsvSubmit(frm) {
		var ser = $(frm).serialize();

		if (ser.indexOf("time") === -1) {
			alert("시간을 선택해주세요.");
			return false;
		}

		if (ser.indexOf("hall") === -1) {
			alert("홀을 선택해주세요.");
			return false;
		}

		if (ser.indexOf("seat") === -1) {
			alert("좌석을 선택해주세요.");
			return false;
		}

		if ($("#drop > li:not(.db)").length < 1) {
			alert("메뉴를 선택해주세요.");
			return false;
		}

		var arr = new Array();
		$("#drop > li:not(.db)").each(function (index, elemetn) {
			arr.push($(this).find(".menu").text());
		});

		arr.sort();
		arr = $.unique(arr);

		for (var key in arr) {
			arr[key] = arr[key] + "|" + $("#drop").find("[data-menu='" + arr[key] + "']").length;
		}

		var price = parseInt($("#total_price").text().replace(/,/g, ""), 10);

		if (ser.indexOf("id=&") === -1) {
			$.post(
				"/page/main3/sub1/rsv_ok.php",
				ser + "&menu=+" + arr + "&price=" + price,
				function (data) {
					localStorage.removeItem("list");
					localStorage.removeItem("menu");
					localStorage.removeItem("price");
					alert("예약이 완료되었습니다.");
					link("/main3/sub2");
				}
			);
		} else {
			var menu = $("#drop").html();
			localStorage.setItem("list", ser);
			localStorage.setItem("menu", menu);
			localStorage.setItem("price", $("#total_price").text());
			alert("로그인 후 이용해주세요.");
			link("/default/login");
			return false;
		}

		return false;
	}

	$(function () {
		var local = localStorage.getItem("list");
		if (local !== null) {
			var localArr = new Array();
			var arr = local.split("&");
			for (var key in arr) {
				var arr_arr = arr[key].split("=");
				localArr.push(arr_arr[1].replace("+", " "));
			}
			$("#date").val(localArr[0]);
			$("input[value='" + localArr[2] + "']").attr("checked", true);
			$("input[value='" + localArr[3] + "']").attr("checked", true);
			$("#drop").html(localStorage.getItem("menu"));
			$("#drop > li.db").hide();
			$("#total_price").text(localStorage.getItem("price"));
			seatArr = localArr.slice(4);
		}

		ajax();

		$("input:radio").change(function () {
			ajax();
		});

		$("#seat_box").selectable({
			filter: "li:not(.not)",
			stop: function (event, ui) {
				$("li.ui-selected input", this).prop("checked", true);
				$("li:not(.ui-selected) input", this).prop("checked", false);
			}
		});

		// 드래그
		$("#drag li").draggable({
			revert: true,
			helper: "clone",
			zindex: 100
		});

		// 드롭
		$("#drop").droppable({
			drop: function (event, ui) {
				var self = ui.helper;
				self.remove();
				if ($("li", this).length === 1) $("li.db", this).hide();

				$(this).prepend('<li class="fl">' + ui.helper.html() + '</li>');

				// 가격 합산
				var total_price = parseInt($("#total_price").text().replace(/,/g, ""), 10);
				var price = parseInt(self.find("span.price").text().replace(/,/g, ""), 10);
				$("#total_price").text((total_price + price).toLocaleString());
			}
		});
	})
</script>