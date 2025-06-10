// common.js
var limit = localStorage.getItem("limit") == null ? 3 : parseInt(localStorage.getItem("limit"));
var categories = localStorage.getItem("categories") == null ? "" : localStorage.getItem("categories");
var search = localStorage.getItem("search") == null ? "" : localStorage.getItem("search");
var scrollTop = localStorage.getItem("scrollTop") == null ? 0 : localStorage.getItem("scrollTop");

var db = window.openDatabase("WebSQL", "1.0", "Web SQL", 1024 * 1024 * 5);

function initCreateDB(){
	db.transaction(function(tx){
		tx.executeSql("create table list (name, info, categories, image, wdate)");
		tx.executeSql("create table member (userid, pw, username, phone)");
		tx.executeSql("create table comment (lidx, midx, comment, wdate)");
	});
}

function initInsertData(){
	db.transaction(function(tx){
		tx.executeSql("select rowid, * from list", [], function(tx, result){
			if(result.rows.length == 0){
				$.getJSON("data/information.json", function(json){
					$.each(json['information'], function(key, val){
						db.transaction(function(tx){

							var now = new Date();
							var Y = now.getFullYear();
							var m = now.getMonth() + 1; if(m.toString().length == 1) m = "0"+m;
							var d = now.getDate(); if(d.toString().length == 1) d = "0"+d;

							var H = now.getHours(); if(H.toString().length == 1) H = "0"+H;
							var i = now.getMinutes(); if(i.toString().length == 1) i = "0"+i;

							var wdate = Y+"-"+m+"-"+d+" "+H+":"+i;

							tx.executeSql("insert into list (name, info, categories, image, wdate) values (?, ?, ?, ?, ?)", [ val['name'], val['info'], val['categories'], "images/"+val['image'], wdate ]);
						}, function(e){
							console.log(e);
						});
					});
				});
			}
		});

		tx.executeSql("select rowid from member", [], function(tx, result){
			if(result.rows.length == 0){
				db.transaction(function(tx){
					tx.executeSql("insert into member (userid, pw, username, phone) values (?, ?, ?, ?)", [ "admin", "1234", "관리자", "01012341234" ]);
				});
			}
		});
	}, function(e){
		console.log(e);
	}, function(){
		showList();
		$("body").scrollTop(scrollTop);
		$("#search").val(search);
	});
}

function initMenu(){
	if(sessionStorage.getItem("userid")){
		$(".login_btn").hide();
		$(".logout_btn").show();
	} else {
		$(".login_btn").show();
		$(".logout_btn").hide();
	}
}

function init(){
	initCreateDB();
	initInsertData();
	initMenu();
	initTrigger();
}


function initTrigger(){
	// login
	$(".login_btn").click(function(e){
		$(".bg").animate({"height" : "100vh", opacity : 1}, 500, function(e){
			$(".login").show();
			$("#login_userid").focus();
		});

		$(".bg span").click(function(e){
			$(".login").hide(function(){
				$(".bg").animate({"height" : 0, opacity : 0}, 500);
				$("#loginFrm")[0].reset();
			});
		});
	});

	// join
	$(".join_btn").click(function(e){
		$(".bg").animate({"height" : "100vh", opacity : 1}, 500, function(e){
			$(".join").show();
			$("#join_userid").focus();
		});

		$(".bg span").click(function(e){
			$(".join").hide(function(){
				$(".bg").animate({"height" : 0, opacity : 0}, 500);
				$("#joinFrm")[0].reset();
			});
		});
	});
	
	// more
	$("body").on("click", ".more_view", function(){
		var idx = $(this).data("idx");

		$(".bg").animate({"height" : "100vh", opacity : 1}, 300, function(e){
			db.transaction(function(tx){
				tx.executeSql("select * from list where rowid=?", [ idx ], function(tx, result){
					var rs = result.rows[0];

					$(".view img").attr("src", rs['image']);
					$(".view h1").text(rs['name']);
					$(".view p").text(rs['info']);
					$(".view h3").text("카테고리 : "+rs['categories']);

					if(sessionStorage.getItem("userid")){
						$("#commentFrm").show();
					} else {
						$("#commentFrm").hide();
					}

					if(sessionStorage.getItem("userid") == "admin"){
						$(".modi_view").show();
					} else {
						$(".modi_view").hide();
					}

					$("input[name=lidx]").val(idx);
					$(".modi_view").attr("data-lidx", idx);

					showCommentList(idx);
				});
			}, function(e){
				console.log(e);
			}, function(){
				$(".view").show();
			});
		});

		$(".bg span").click(function(e){
			$(".more").hide(function(){
				$(".bg").animate({"height" : 0, opacity : 0}, 300);
				$("#commentFrm")[0].reset();
			});
		});
	});

	// modi_view
	$("body").on("click", ".modi_view", function(){
		$(".view").hide();
		$(".modi").show();
		
		var lidx = $(this).data("lidx");

		db.transaction(function(tx){
			tx.executeSql("select rowid, * from list where rowid=?", [ lidx ], function(tx, result){
				var rs = result.rows[0];

				$(".modi img").attr("src", rs['image']);
				$(".modi input[name=oldName]").val(rs['name']);
				$(".modi input[name=lidx]").val(rs['rowid']);
				$(".modi input[type=text]").val(rs['name']);
				$(".modi textarea").val(rs['info']);
				
			});
		});

		$("#file").change(function(e){
			var file = e.target.files[0];

			var type = file.type;
			var name = file.name;

			if(type == "image/jpeg" || type == "image/jpg" || type == "image/png" || type == "image/gif"){
				/*var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function(e){
					var src = e.target.result;
					$(".modi img").attr("src", src);
				}*/

				$(".modi img").attr("src", "images/"+name);
			} else {
				alert("이미지 형식(JPG, JPEG, PNG, GIF)으로 된 파일만 업로드할 수 잇습니다.");
			}
		});

		$(".bg span").click(function(e){
			$(".more").hide(function(){
				$(".bg").animate({"height" : 0, opacity : 0}, 300);
			});
		});
	});

	$("#modiFrm").submit(function(){
		var lidx = $(this).find("input[name=lidx]").val();
		var oldName = $(this).find("input[name=oldName]").val();
		var name = $(this).find("input[type=text]").val();
		var info = $(this).find("textarea").val();
		var image = $(".modi").find("img").attr("src");

		var now = new Date();
		var Y = now.getFullYear();
		var m = now.getMonth() + 1; if(m.toString().length == 1) m = "0"+m;
		var d = now.getDate(); if(d.toString().length == 1) d = "0"+d;

		var H = now.getHours(); if(H.toString().length == 1) H = "0"+H;
		var i = now.getMinutes(); if(i.toString().length == 1) i = "0"+i;

		var wdate = Y+"-"+m+"-"+d+" "+H+":"+i;


		db.transaction(function(tx){
			tx.executeSql("update list set name=?, info=?, image=?, wdate=? where rowid=?", [name, info, image, wdate, lidx]);
		}, function(e){
			console.log(e);
		}, function(){
			alert("["+oldName+"]의 정보가 수정되었습니다. ("+wdate+")");
			$(".bg span").click();
			showList();
		});

		return false;
	});

	$(".logout_btn").click(function(){
		sessionStorage.clear();
		alert("로그아웃이 완료되었습니다.");
		initMenu();
	});

	$("#loginFrm").submit(function(){
		var userid = $("#login_userid").val();
		var pw = $("#login_pw").val();

		db.transaction(function(tx){
			tx.executeSql("select rowid, * from member where userid=? and pw=?", [ userid, pw ], function(tx, result){
				var rs = result.rows[0];
				if(rs){
					sessionStorage.setItem("idx", rs['rowid']);
					sessionStorage.setItem("userid", rs['userid']);
					sessionStorage.setItem("username", rs['username']);
					sessionStorage.setItem("phone", rs['phone']);

					alert("로그인이 완료되었습니다.");
					$(".bg span").click();
					initMenu();
				} else {
					alert("아이디와 비밀번호를 다시 확인해주세요.");
					return false;
				}
			});
		}, function(e){
			console.log(e);
		});

		return false;
	});

	$("#joinFrm").submit(function(){
		var userid = $("#join_userid").val();
		var pw = $("#join_pw").val();
		var pw2 = $("#join_pw2").val();
		var username = $("#join_username").val();
		var phone = $("#join_phone").val();

		var usernamePattern = /^[ㄱ-힣]+$/;
		var phonePattern = /^[0-9]+$/;


		if(pw != pw2){
			alert("비밀번호와 비밀번호확인 값이 일치하지 않습니다.");
			return false;
		}

		if(usernamePattern.test(username) == false){
			alert("이름은 한글만 입력할 수 있습니다.");
			return false;
		}

		if(phonePattern.test(phone) == false){
			alert("전화번호는 숫자만 입력할 수 있습니다.");
			return false;
		}

		db.transaction(function(tx){
			tx.executeSql("select * from member where userid=?", [ userid ], function(tx, result){
				if(result.rows.length){
					alert("이미 존재하는 아이디입니다.");
					return false;
				} else {
					db.transaction(function(tx){
						tx.executeSql("insert into member (userid, pw, username, phone) values (?, ?, ?, ?)", [ userid, pw, username, phone ]);
					}, function(e){
						console.log(e);
					}, function(){
						alert("회원가입이 완료되었습니다.");
						$(".bg span").click();
					});
				}
			});
		});

		return false;
	});

	$(window).scroll(function(){
		scrollTop = $(this).scrollTop();


		if($(window).scrollTop() == $(document).height() - $(window).height()){
			var rowCount = 0;
			var where = "";

			if(categories != ""){
				where += "and categories='"+categories+"'";
			}

			if(search != ""){
				where += "and name like '%"+search+"%'";
			}

			db.transaction(function(tx){
				tx.executeSql("select rowid, * from list where 1=1 "+where, [], function(tx, result){
					rowCount = result.rows.length;
				});

			}, function(e){
				console.log(e);
			}, function(){
				if(limit >= rowCount){
					limit = rowCount;
				} else {
					limit = limit + 3;

					$(".loading").fadeIn(300);
					setTimeout(function(){
						for(i = 0; i < limit; i++){
							$(".feeds").eq(i).show();
						}

						$(".loading").fadeOut(300);
						saveStorage();
					}, 1000);
				}

			});

		}

		saveStorage();
	});

	$(".categories ul li").click(function(){
		categories = $.trim($(this).text());
		saveStorage();
		showList();
	});

	$("#search").keyup(function(){
		var where = "";

		if(categories != ""){
			where += "and categories='"+categories+"'";
		}

		if(search != ""){
			where += "and name like '%"+search+"%'";
		}

		var autoCompleteArr = [];
		db.transaction(function(tx){
			tx.executeSql("select rowid, * from list where 1=1 "+where, [], function(tx, result){
				$.each(result.rows, function(key, rs){
					autoCompleteArr.push(rs['name']);
				});
			});
		}, function(e){
			console.log(e);
		}, function(){
			$("#search").autocomplete({
				source : autoCompleteArr
			});
		});
	});

	$("#searchFrm").submit(function(){
		search = $("#search").val();

		if(search == ""){
			alert("검색 값을 입력해주세요.");
			return false;
		}

		saveStorage();
		showList();

		return false;
	});

	$("#commentFrm").submit(function(){
		var comment = $("#comment").val();
		var lidx = $("input[name=lidx]").val();

		var now = new Date();

		var Y = now.getFullYear();
		var m = now.getMonth() + 1; if(m.toString().length == 1) m = "0"+m;
		var d = now.getDate(); if(d.toString().length == 1) d = "0"+d;

		var wdate = Y+"-"+m+"-"+d;


		db.transaction(function(tx){
			tx.executeSql("insert into comment (lidx, midx, comment, wdate) values(?, ?, ?, ?)", [ lidx, sessionStorage.idx, comment, wdate ]);
		}, function(e){
			console.log(e);
		}, function(){
			alert("댓글이 등록되었습니다.");
			$("#comment").val("");
			showCommentList(lidx);
		});

		return false;
	});

	$("body").on("click", ".deleteCommentBtn", function(){
		var lidx = $("input[name=lidx]").val();
		var cidx = $(this).data("cidx");

		db.transaction(function(tx){
			tx.executeSql("delete from comment where rowid=?", [ cidx ]);
		}, function(e){
			console.log(e);
		}, function(){
			showCommentList(lidx);
		});
	});
}

function showList(){
	if(limit == 0) limit = 3;

	var where = "";

	if(categories != ""){
		where += "and categories='"+categories+"'";
	}

	if(search != ""){
		where += "and name like '%"+search+"%'";
	}

	$("#list").html("");
	db.transaction(function(tx){
		tx.executeSql("select rowid, * from list where 1=1 "+where, [], function(tx, result){

			$.each(result.rows, function(key, rs){
				var html = '<div class="col-md-12 feeds box">\
								<div class="row">\
									<div class="feed_image">\
										<img src="'+rs['image']+'" alt="'+rs['image']+'" />\
									</div>\
									<div class="feed_con">\
										<h1>'+rs['name']+'</h1>\
										<div class="line"></div>\
										<p>'+rs['info']+'</p>\
										<h3>업데이트 날짜 : '+rs['wdate']+'</h3>\
										<h3>카테고리 : '+rs['categories']+'</h3>\
										<div><button type="button" class="more_view" data-idx="'+rs['rowid']+'">더 보기</button></div>\
									</div>\
								</div>\
							</div>';

				$("#list").append(html);
			});
		});
	}, function(e){
		console.log(e);
	}, function(){
		$(".feeds").hide();
		for(i = 0; i < limit; i++){
			$(".feeds").eq(i).show();
		}

		$("body").scrollTop(scrollTop);
	});
}

function showCommentList(idx){
	$(".commentList").html("");
	db.transaction(function(tx){
		tx.executeSql("select rowid, * from comment where lidx='"+idx+"' order by rowid desc", [], function(tx, result){
			$.each(result.rows, function(key, rs){
				db.transaction(function(tx2){
					tx2.executeSql("select rowid, * from member where rowid=?", [ rs['midx'] ], function(tx2, result2){
						var member = result2.rows[0];

						var ul = '<ul>\
									<li>'+rs['comment']+'</li>\
									<li>'+member['username']+'</li>\
									<li>'+rs['wdate']+'</li>';
									if(sessionStorage.idx == rs['midx']){
										ul += '<li><button type="button" class="deleteCommentBtn" data-cidx="'+rs['rowid']+'">삭제</button></li>';
									}
									ul +='</ul>';

						$(".commentList").append(ul);
					});
				});
			});
		});
	});
}

function saveStorage(){
	localStorage.setItem("limit", limit);
	localStorage.setItem("scrollTop", scrollTop);
	localStorage.setItem("categories", categories);
	localStorage.setItem("search", search);
}

$(function(){
	init();
});