// JavaScript Document
var json = [];
var record = [];
var route = [ "0%", "-100%", "-200%" ];
var title = [ "인사이드서울", " 정보안내", "관리자페이지" ];
var status = 0;
var key = null;
var self = null;
var uploading = 1;


// Json Data 받아오기
function getJsonData(){
	$.getJSON("json/description.json", function(data){
		json = data.WardOffice;

		$.each(json, function(key, val){
			val.files = [];
		});

		if(sessionStorage.getItem("login")){
			showComboBoxOption();
		}
	});
}


// 초기화
function init(){
	initSvg();
	getJsonData();
	initElements();
	initTrigger();
}

// SVG 불러오기
function initSvg(){
	$("#sec-1").load("svg/map.svg");
}

// 기본 요소 초기화
function initElements(sec2){
	showSectionTitle(sec2);
	showRouteBtn();
	moveRoute();
}

// 트리거 초기화
function initTrigger(){
	// 이전 버튼 클릭시
	$("#prevBtn").click(function(e){
		e.preventDefault();

		if(uploading){
			if(record.length > 0){
				status = record.shift();
				if(status == 1){
					initElements(true);
				} else {
					initElements();
				}
			} else {
				status = 0;
			}
		} else {
			alert("업로드 중 입니다.");
		}
	});

	// 홈 버튼 클릭시
	$("#homeBtn").click(function(e){
		e.preventDefault();

		if(uploading){
			addHistory();
			status = 0;
			initElements();
		} else {
			alert("업로드 중 입니다.");
		}
	});

	// 관리자 버튼 클릭시
	$("#adminBtn").click(function(e){
		e.preventDefault();

		if(uploading){
			addHistory();
			status = 2;
			initElements();
		} else {
			alert("업로드 중 입니다.");
		}
	});

	// 구에 마우스 올렸을 때
	$("body").on("mouseenter", "path", function(){
		$(this).css("fill", "#ff9900");
	});

	// 구에서 마우스가 떠났을 때
	$("body").on("mouseleave", "path", function(){
		$(this).css("fill", "#c8c8c8");
	});

	// 텍스트에 마우스를 올렸을 때
	$("body").on("mouseenter", "text", function(){
		var id = $(this).children().eq(-1).text();

		$("#"+id).mouseenter();
	});

	// 텍스트에서 마우스가 떠났을 때
	$("body").on("mouseleave", "text", function(){
		var id = $(this).children().eq(-1).text();

		$("#"+id).mouseleave();
	});

	// 구를 클릭했을 때
	$("body").on("click", "path", function(){
		showRouteInformation(this);
	});

	// 텍스트를 클릭했을 때
	$("body").on("click", "text", function(){
		var id = $(this).children().eq(-1).text();

		$("#"+id).click();
	});

	// 로그인 버튼 클릭했을 때
	$("#loginBtn").click(function(){
		var userid = $("#userid").val();
		var pw = $("#pw").val();

		if(userid == "admin" && pw == "1234"){	
			sessionStorage.setItem("login", "login");
			alert("환영합니다.");
			showComboBoxOption();
		} else {
			alert("아이디와 비밀번호를 다시 확인해주세요.");
		}
	});

	// 드래그 드랍 오류 방지
	$("body").on("dragstart dragover drop", function(e){
		e.preventDefault();
	});

	// 드랍 영역에 파일을 드래그하여 올렸을 때
	$("#drop").on("dragover", function(e){
		e.preventDefault();
		e.stopPropagation();

		$(this).addClass("hover");
	});

	// 드랍영역을 떠났을때
	$("#drop").on("dragleave", function(e){
		e.preventDefault();
		e.stopPropagation();

		$(this).removeClass("hover");
	});

	// 드랍영역에 드랍했을 때
	$("#drop").on("drop", function(e){
		e.preventDefault();

		var option = $("#location").val();

		if(option){
			fileUpload(e);
		} else {
			alert("구를 선택해주세요.");
		}

		$(this).removeClass("hover");
	});

	// 썸네일 이미지 클릭했을 때
	$("body").on("click", "#gallery > li > img", function(){
		var data = $(this).data("key");

		showLayerPopup(data);
	});
}

// 타이틀 보여주기
function showSectionTitle(sec2){
	if(sec2){
		$(".center-title").text(self.name_ko+title[status]);
	} else {
		$(".center-title").text(title[status]);
	}
}

// 경로 이동 버튼 보여주기
function showRouteBtn(){
	switch(status){
		case "0":
			$("#prevBtn, #homeBtn").hide();
		break;
		default :
			$("#prevBtn, #homeBtn").show();
		break;
	}
}

// 이동하기
function moveRoute(){
	$(".middle").animate({ "margin-left" : route[status] }, function(){
		if(key != null && status == 1){
			showMediaGallery(key);
		}
	});
}

// 히스토리 추가
function addHistory(){
	record.unshift(status);

	var valChk = null;

	$.each(record, function(key, val){
		if(valChk == val){
			record.shift();
		}
		valChk = val;
	});
}

// 구의 정보 보여주기
function showRouteInformation(element){
	var id = $(element).attr("id");

	$.each(json, function(i, val){
		if(val.name_en == id){
			key = i;
			self = val;
			return false;
		}
	});

	var html = '<div id="info">\
					<div class="image"><img src="'+self.map+'" alt="'+self.name_en+'" title="'+self.name_en+'" /></div>\
					<div class="text">\
						<h2>'+self.name_ko+' ('+self.name_en+')</h2>\
						<ul>\
							<li>면 적 : '+self.square+'</li>\
							<li>인 구 : '+self.population+'</li>\
							<li>안내사이트 : '+self.url+'</li>\
						</ul>\
						<p>'+self.description+'</p>\
					</div>\
					<ul id="gallery">\
					</ul>\
				</div\
				';

	$("#sec-2").html(html);

	if(self.files.length){
		$("#gallery").html("<li class='loading' style='width:100%; line-height:150px; font-size:15px'>불러오는 중 입니다. (이 문장이 사라지고 나서도 조금의 <b>지연시간</b>이 <b>발생</b> 할 수 있습니다.)</li>");
	}

	addHistory();
	status = 1;
	initElements(true);
}

// 갤러리 보여주기
function showMediaGallery(key){
	var file = json[key].files;
	var html = "";

	$("#gallery").empty();

	$.each(file, function(key, val){
		if(val.type == "video/mp4"){
			var vid = $("<video data-key="+key+"><source src="+val.src+" type="+val.type+" /></video>")[0];
			var li = "";

			vid.addEventListener("loadedmetadata", function(){
				this.currentTime = 1.5;
			}, false);

			vid.addEventListener("loadeddata", function(){
				var w = this.videoWidth;
				var h = this.videoHeight;

				var cvs = $("<canvas></canvas>")[0];
				var ctx = cvs.getContext("2d");



				cvs.width = w;
				cvs.height = h;
				ctx.drawImage(this, 0, 0, w, h);
				ctx.fillStyle = "rgba(0, 0, 0, 0.4)";
				ctx.fillRect(0, 0, w, h);

				var li = $("<li></li>");
				var playBtn = $("<img src='images/play_btn.png' alt='play_btn.png' title='play_btn.png' class='playBtn' data-key="+key+" />");
				var previewImg = $("<img src='"+cvs.toDataURL()+"' class='previewImg' data-key="+key+" />");
				
				li.append(playBtn).append(previewImg);
				$("#gallery").append(li);

				this.currentTime = 0;
			});
		} else {
			var li = "<li><img src="+val.src+" alt="+val.name+" title="+val.name+" data-key="+key+" /></li>";
			$("#gallery").append(li);
		}
	});

	$("#gallery .loading").remove();
}

// 로그인 했을 때 콤보박스 보여주기
function showComboBoxOption(){
	$("#loginBox").hide();
	$(".add").removeClass("dn");

	$.each(json, function(key, val){
		$("#location").append("<option value="+key+">"+val.name_ko+" ("+val.name_en+")</option>");
	});
}

// 파일 업로드 했을 때
function fileUpload(e){
	uploading = 0;
	var data = e.originalEvent.dataTransfer.files;
	var files = [];
	var error = "";

	$.each(data, function(key, val){
		var splitType = val.name.split(".");

		switch(splitType[1]){
			case "jpg":
			case "Jpg":
			case "jPg":
			case "jpG":
			case "JpG":
			case "JPg":
			case "jPG":
			case "JPG":

			case "png":
			case "Png":
			case "pNg":
			case "pnG":
			case "PNg":
			case "pNG":
			case "PnG":
			case "PNG":

			case "mp4":
			case "Mp4":
			case "mP4":
			case "MP4":
				files.push(val);
			break;
			default :
				error += "("+val.name+") 은(는) 이미지(JPG, PNG) 또는 동영상(MP4) 형식이 아닙니다.\r\n";
			break;
		}
	});


	if(!error){
		$.each(files, function(key, val){
			var reader = new FileReader();
			reader.readAsDataURL(val);
			reader.onload = function(e){
				var tmp = {};
				tmp.name = val.name;
				tmp.type = val.type;
				tmp.src = e.target.result;

				var option = $("#location").val();

				json[option].files.push(tmp);
			}
		});
		alert("업로드가 완료되었습니다.");
		uploading = 1;
	} else {
		alert(error);
		uploading = 1;
	}
}

// 레이어 팝업으로 보기
function showLayerPopup(fileKey){
	var file = json[key].files[fileKey];

	if(file.type == "video/mp4"){
		$("<div id='dialog'><video controls autoplay><source src="+file.src+" type="+file.type+" /></video></div>").dialog({
			title : "레이어 팝업",
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
	} else {
		$("<div id='dialog'><img src="+file.src+" alt="+file.name+" title="+file.src+" /></div>").dialog({
			title : "레이어 팝업",
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
		});
	}
}

// 로딩 됬을때 초기화 실행
$(function(){
	init();
});