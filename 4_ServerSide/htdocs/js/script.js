// JavaScript Document
var area = "강북구";

function init(){
	getCarList();
	initTrigger();
}

function getCarList(){
	$.ajax({
		type : "POST",
		url : "../include/getCarList.php",
		data : { currentLocation : area },
		success : function(data){
			$(".CarReservation-list tbody").empty();

			if(data){
				$(".CarReservation-list tbody").html(data);
			} else {
				$(".CarReservation-list tbody").html("<tr colspan='4'>차량 목록이 존재하지 않습니다.</tr>");
			}
		}
	});
}

function initTrigger(){
	$(".CarReservation-locationBox").click(function(){
		area = $(this).children().attr("title");

		$(".CarReservation-locationTitle").html(area+"<br>EV차량예약");
		getCarList();
	});

	$("body").on("change", "select[name=time_start]", function(){
		var date = $(this).val();
		var time_end = $(this).next();

		if(date){
			var dateArr = date.split(" ");

			var cidx = $(this).data("cidx");

			var Ymd = dateArr[0].split("-");
			var Hi = dateArr[1].split(":");

			var Y = Ymd[0];
			var m = Ymd[1];
			var d = Ymd[2];

			var H = Hi[0];
			var i = Hi[1];

			$.ajax({
				type : "POST",
				url : "../include/getReturnTime.php",
				data : { cidx : cidx, Y : Y, m : m, d : d, H : H, i : i },
				success : function(data){
					if(data){
						$(time_end).html(data);
						$(time_end).attr("disabled", false);
					}
				}
			});
		} else {
			$(time_end).attr("disabled", true);
		}
	});

	$("#Gangbuk-gu").click();

	$("body").on("click", ".rsvBtn", function(){
		var tr = $(this).parent().parent();
		var cidx = $(this).data("cidx");
		var location_start = area;
		var location_end = $(tr).find("select[name=location_end]").val();
		var time_start = $(tr).find("select[name=time_start]").val();
		var time_end = $(tr).find("select[name=time_end]").val();


		if(location_end && time_start && time_end){
			$.ajax({
				type : "POST",
				url : "../include/rsvOk.php",
				data : { cidx : cidx, location_start : location_start, location_end : location_end, time_start : time_start, time_end : time_end },
				success : function(data){
					if(data){
						alert(data);
					} else {
						alert("예약을 완료하였습니다.");
						link('reservation.php');
					}
				}
			});
		} else {
			alert("누락된 항목이 존재합니다.");
		}
	});

	$(".rsvCancel").click(function(){
		var tr = $(this).parent().parent();
		var ridx = $(this).data("ridx");

		$.ajax({
			type : "POST",
			url : "../include/cancelOk.php",
			data : { ridx : ridx },
			success : function(data){
				if(data){
					alert(data);
				} else {
					$(tr).remove();

					var length = $(".MyReservation-list tbody tr").length;
					if(!length){
						$(".MyReservation-list tbody").append("<tr><td colspan='5'>예약 내역이 존재하지 않습니다.</td></tr>");
					}
				}
			}
		});
	});

	$("body").on("click", ".moveLocation", function(){
		var select = $(this).prev();
		var cidx = $(this).data("cidx");

		if(select){
			$.ajax({
				type : "POST",
				url : "../include/moveOk.php",
				data : { cidx : cidx, location : select.val() },
				success : function(data){
					if(data){
						alert(data);
					} else {
						link('adminpage.php');
					}
				}
			})
		} else {
			alert("누락된 항목이 존재합니다.");
		}
	});

	$("#changeArea").change(function(){
		var currentLocation = $(this).val();

		$.ajax({
			type : "POST",
			url : "../include/list.php",
			data : { currentLocation : currentLocation },
			success : function(data){
				$(".adminPage-list tbody").html(data);
			}
		})
	});
}

function link(url){
	document.location.href = url;
}

function frmSubmit(frm, url, msg, move){
	$.ajax({
		type : "POST",
		url : url,
		data : $(frm).serialize(),
		success : function(data){
			if(data){
				alert(data);
			} else {
				if(msg != "") alert(msg);
				if(move != "") link(move);
			}
		}
	});

	return false;
}

$(function(){
	init();
});