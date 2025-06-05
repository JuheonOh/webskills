$(document).ready(function(){
    $(".content1 > figure > img").attr("src", "/attachment/img.jpg");
	$("#diagram").empty();
	$(".content4 > video > source:first-child").attr("src", "/attachment/video.ogg");
	$(".content4 > video > source:last-child").attr("src", "/attachment/video.mp4");
	$(".content2 > p > button").click(function(){ document.location.href = "/main3/sub1"; });
	
	// Table Hover
	$("td, th").hover(
		function(){
			var count = $(this).index()+1;
			$(".content3 > table > tbody > tr > td:nth-child("+count+")").css({"background-color" : "#FF0000", "color" : "#FFFFFF"});
		}, function(){
			$(".content3 > table > tbody > tr > td").css({"background-color" : "#FFFFFF", "color" : "#666666"});
		}
	);
	
	
	// 캔버스 삽입
	$("#diagram").html('<canvas id="canvas" width="1000" height="300"></canvas>');
	
	// 변수 선언
	var count;
	var year = [];
	var cash1 = [];
	var cash2 = [];
	var cash3 = [];
	var cash4 = [];
	
	count = $(".content3 > table > tbody > tr").length;
	$(".content3 > table > tbody > tr").find("td:nth-child(1)").each(function(){
		year.push($(this).text());
    });
	$(".content3 > table > tbody > tr").find("td:nth-child(2)").each(function(){
		cash1.push($(this).text());
    });
	$(".content3 > table > tbody > tr").find("td:nth-child(3)").each(function(){
		cash2.push($(this).text());
    });
	$(".content3 > table > tbody > tr").find("td:nth-child(4)").each(function(){
		cash3.push($(this).text());
    });
	$(".content3 > table > tbody > tr").find("td:nth-child(5)").each(function(){
		cash4.push($(this).text());
    });
	
	// 그래프캔버스
	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	ctx.beginPath();
	ctx.lineWidth = 2;
	ctx.strokeStyle = "#000000";
	ctx.moveTo(80, 10);
	ctx.lineTo(80, 250);
	ctx.stroke();
	ctx.moveTo(80, 250);
	ctx.lineTo(1000, 250);
	ctx.stroke();
	ctx.font = "1em Dotum";
	ctx.textBaseline = "middle";
	
	for(var i = 0; i < 4; i++){
		var number = 200-(50*i);
		ctx.beginPath();
		ctx.moveTo(70, number);
		ctx.lineTo(90, number);
		ctx.stroke();
		var text = (50*(i+1))+"억원";
		ctx.fillText(text, 10, number);
	}
	
	for(var i = 0; i < count; i++){
		var number = 140+(140*i);
		var text = year[i]+"년";
		ctx.fillText(text, number, 270);
	}
	
	for(var i = 0; i < count; i++){
		ctx.fillStyle = "#FF0";
		ctx.fillRect(120+(140*i), 249, 19, -1*cash1[i]);
		ctx.fillStyle = "#C00";
		ctx.fillRect(140+(140*i), 249, 19, -1*cash2[i]);
		ctx.fillStyle = "#39F";
		ctx.fillRect(160+(140*i), 249, 19, -1*cash3[i]);
		ctx.fillStyle = "#F60";
		ctx.fillRect(180+(140*i), 249, 19, -1*cash4[i]);
	}
});