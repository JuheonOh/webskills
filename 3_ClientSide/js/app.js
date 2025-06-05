/*app.js*/
// Menu Scroll
function menuScroll(){
	$("nav a").click(function(e){
		e.preventDefault();

		// Menu Scroll Animate
		var id = $(this).text().toLowerCase();
		$("body").stop().animate({ scrollTop : $("#"+id).offset().top }, 1000);
	});
}

// Parallax
function parallax(){
	var section = $("section");
	var top = [];

	// Offset Top Value Insert to Array
	$.each(section, function(key, el){
		top.push(Math.floor($(el).offset().top));
	});

	// Browser Scrolling
	$(window).scroll(function(){
		var scrollTop = $(this).scrollTop();

		if(top[1] <= scrollTop && top[2] > scrollTop){
			$("#webdesign img").css({ "transition" : "transform 1s", "transform" : "rotateZ(-10deg)" });
		} else {
			$("#webdesign img").css({ "transition" : "transform 1s", "transform" : "rotateZ(10deg)" });
		}

		if(top[2]-5 <= scrollTop && top[3] > scrollTop){
			$("#worldskills img").css({ "transition" : "transform 1s", "transform" : "rotateZ(10deg)" });
		} else {
			$("#worldskills img").css({ "transition" : "transform 1s", "transform" : "rotateZ(-5deg)" });
		}
	});
}

// Photos
function photos(){
	// Image Hover
	$("#photos img").hover(function(){
		$(this).css({ "transition" : "transform .5s", "transform" : "rotateZ(10deg)", "cursor" : "pointer" });
	}, function(){
		$(this).css({ "transition" : "transform .5s", "transform" : "rotateZ(0deg)" });
	});


	$("#photos img:nth-child(5)").attr("alt", "photo5");

	$("#photos img").click(function(){
		var src = $(this).attr("alt");

		var img = '<img src="images/big_'+src+'.jpg" alt="'+src+'" title="'+src+'" style="width:640px; height:426px; opacity:0;" />';

		// Dialog
		$('<div id="dialog"></div>').html(img).dialog({
			title : "이미지 보기",
			modal : true,
			resizable : false,
			width : "auto",
			height : "auto",
			buttons : {
				"닫기" : function(){
					$(this).dialog("close");
				}
			},
			open : function(){
				$(this).find("img").css({ "transition" : "opacity 1s", "opacity" : "1" });
			},
			close : function(){
				$(this).remove();
			}
		});
	});
}

// Read More Btn
function readmore(){
	$("#webdesign").css({ "height" : "auto" });
	$(".hidden-text").css({ "float" : "left" });
	$(".hidden-text").prev().append("<button class='moreBtn' style='float:left; width:100%; height:50px;'>read more</button>");

	$("body").on("click", ".moreBtn", function(){
		$(this).parent().parent().find(".hidden-text").stop().slideToggle(1500, function(){

			parallax();
		});
	});
}

// Result
function result(){
	$("#result > div > div:nth-child(2) > ul > li > ul > li:nth-child(3)").attr("data-photo", "medaillist-2013-3.jpg");

	// Name Click Event
	$("#result > div > div > ul > li > ul > li").click(function(){
		var year = $(this).parent().parent().parent().parent().find("h2").text();	
		var country = $(this).data("country");
		var photo = $(this).data("photo");
		var title = $(this).attr("title");
		var name = $(this).text();

		var html = "";

		html += "<p>대회년도와 도시 : "+year+"</p>";
		html += "<p>선수이름 : "+name+"</p>";
		html += "<p>국가 : "+country+"</p>";
		html += "<p>메달 종류 : "+title+"</p>";
		html += "<p>선수 사진 : <img src='images/"+photo+"' alt="+photo+" title="+photo+" /></p>";

		$('<div id="dialog"></div>').html(html).dialog({
			title : "선수 보기",
			modal : true,
			resizable : false,
			width : "auto",
			height : "auto",
			buttons : {
				"닫기" : function(){
					$(this).dialog("close");
				}
			},
			close : function(){
				$(this).remove();
			}
		})
	});
}

// Animation
var cut = 0;
function animation(type){
	switch(type){
		case "prev" : 
			cut = cut == 0 ? 2 : cut - 1;
		break;
		case "next" : 
			cut = cut == 2 ? 0 : cut + 1;
		break;
	}

	var left = (-100 * cut) + "%";
	$("#slider > div > div:nth-child(2) > ul").stop().animate({ "margin-left" : left }, 1500);
}


// document ready
$(function(){
	// Slider CSS Setting
	$("#slider > div > div:nth-child(2)").css({ "overflow" : "hidden", "position" : "relative" });
	$("#slider > div > div:nth-child(2)").html('\
		<ul style="position:absolute; left:0; top:0; width:300%; height:100%; margin:0; padding:0;">\
		<li style="float:left; width:calc(100% / 3); height:100%; list-style:none; margin:0; padding:0;"><img src="images/slide1.jpg" alt="slide1.jpg" title="slide1.jpg" /></li>\
		<li style="float:left; width:calc(100% / 3); height:100%; list-style:none; margin:0; padding:0;"><img src="images/slide2.jpg" alt="slide2.jpg" title="slide2.jpg" /></li>\
		<li style="float:left; width:calc(100% / 3); height:100%; list-style:none; margin:0; padding:0;"><img src="images/slide3.jpg" alt="slide3.jpg" title="slide3.jpg" /></li>\
		</ul>\
		');

	$("#slider > div > div:nth-child(1)").css({ "border-top" : "30px solid transparent", "border-bottom" : "30px solid transparent", "border-right" : "35px solid #09f", "width" : 0, "height" : 0 });
	$("#slider > div > div:nth-child(3)").css({ "border-top" : "30px solid transparent", "border-bottom" : "30px solid transparent", "border-left" : "35px solid #09f", "width" : 0, "height" : 0 });

	// Slider Prev Click
	$("#slider > div > div:nth-child(1)").click(function(){
		animation('prev');
	});

	// Slider Next  Click
	$("#slider > div > div:nth-child(3)").click(function(){
		animation('next');
	});

	// Function Call
	menuScroll();
	parallax();
	photos();
	readmore();
	result();
});