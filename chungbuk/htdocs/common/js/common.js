/* 글자 크기 조절 */
var size = 100;
function zoom(n) {
  var textArea = document.getElementById("text_content");
  size = n == 100 ? 100 : size + n;
  textArea.style.fontSize = size + "%";
}

// Link
function link(url) {
  document.location.href = url;
}

/* 폼 체크 */
function frmChk(frm) {
  function regChk(obj) {
    var msg = false;
    var reg;

    switch (obj.name) {
      case "userid":
        reg = new RegExp(/^[a-z0-9]+$/);
        if (!reg.test(obj.value)) {
          msg = obj.title + "을(를) 영문, 숫자로만 입력해주세요.";
        }
        break;
      case "username":
        reg = new RegExp(/^[가-힣]+$/);
        if (!reg.test(obj.value)) {
          msg = obj.title + "을(를) 순한글로 입력해주세요.";
        }
        break;
      case "cellular":
        reg = new RegExp(/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/);
        if (!reg.test(obj.value)) {
          msg = obj.title + "을(를) 000-0000-0000 형식으로 입력해주세요.";
        }
        break;
      case "email":
        reg = new RegExp(/^[a-z0-9]+@[a-z0-9]+\.[a-z]+$/);
        if (!reg.test(obj.value)) {
          msg = obj.title + "을(를) 이메일 형식으로 입력해주세요.";
        }
        break;
      default:
        if (obj.value.length == 0) msg = obj.title + "을(를) 입력해주세요.";
        break;
    }
    return msg;
  }

  var is0k = new Array();
  var arg;
  var argLen = arguments.length - 1;

  for (var i = argLen; i >= 1; i--) {
    arg = arguments[i];
    is0k[arg] = regChk(frm[arg]);

    if (!is0k[arg]) {
      frm[arg].style.backgroundColor = "#FFF";
      frm[arg].style.border = "1px solid #aaa";
      frm[arg].style.color = "#000";
    } else {
      frm[arg].style.backgroundColor = "#FCC";
      frm[arg].style.border = "1px solid #f00";
      frm[arg].style.color = "#333";
    }
  }

  for (var i = 1; i <= argLen; i++) {
    arg = arguments[i];
    if (is0k[arg]) {
      alert(is0k[arg]);
      return false;
    }
  }
  return true;
}

// 다이얼로그
function dialog(title, src, width, height) {
  $('<div id="dialog" title=' + title + "></div>")
    .dialog({
      modal: true,
      resizable: false,
      width: width,
      height: height,
      close: function () {
        $(this).remove();
      },
    })
    .load(src);
}

var cut = 0;

// 슬라이드 버튼
var btn = {
  on: function () {
    this.timer = setInterval(function () {
      animation("next");
    }, 5000);
  },
  off: function () {
    clearInterval(this.timer);
  },
};

// 슬라이드 종료
function animation(type) {
  $("#slide").stop();
  btn.off();

  switch (type) {
    case "next":
      cut = cut === 2 ? 0 : cut + 1;
      break;
    case "prev":
      cut = cut === 0 ? 2 : cut - 1;
      break;
    default:
      cut = type;
      break;
  }

  var left = -100 * cut + "%";

  $("#slide").animate({ "margin-left": left }, 500, function () {
    $("#slide_btn > li").css({ "background-color": "#aaa" });
    $("#slide_btn > li").eq(cut).css({ "background-color": "#e10701" });
    btn.on();
  });
}

$(function () {
  $.ajaxSetup({ cache: false });

  animation("next");
});
