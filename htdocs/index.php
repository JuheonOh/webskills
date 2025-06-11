<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch();
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/common/js/jquery/jquery-ui-1.11.4/jquery-ui.css">
<link rel="stylesheet" href="/common/css/common.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui-1.11.4/jquery-ui.js"></script>
<script src="/common/js/jquery/jquery-ui-1.11.4/jquery.ui.datepicker-ko.js"></script>
<script src="/common/js/common.js"></script>
<title>드림파크 국화축제</title>
</head>

<body>
<div id="wrap">
	<header id="header">
    	<div class="wrap">
        	<h1 id="logo"><a href="/" title="HOME"><img src="/image/logo.png" title="LOGO" alt="LOGO"></a></h1>
            <ul id="util">
	            <li><a href="/" title="HOME">HOME</a></li>
            	<?php if(!isset($_SESSION['userid'])){ ?>
                <li><a href="javascript:dialog('로그인', '/include/login.php');" title="로그인">로그인</a></li>
                <li><a href="javascript:dialog('회원가입', '/include/join.php');" title="회원가입">회원가입</a></li>
                <?php } else { ?>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } ?>
            </ul>
        </div>
        <nav id="menu">
            <ul class="menu">
                <?php
                    $menu_r = $pdo->query("select * from menu where parent='0'");
                    while($menu_list = $menu_r->fetch()){
                ?>
                <li<?php if($midx == $menu_list['child']) echo ' class="active"'; ?>><a href="/<?php echo $menu_list['child']; ?>" title="<?php echo $menu_list['title']; ?>"><?php echo $menu_list['title']; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <div id="contents">
    	<div id="animation">
        	<div id="slide-parent">
            	<ul id="slide">
                	<li><img src="/image/slide1.jpg" alt="첫번째 슬라이드 애니메이션 이미지" title="첫번째 슬라이드 애니메이션 이미지"></li>
                    <li><img src="/image/slide2.jpg" alt="두번째 슬라이드 애니메이션 이미지" title="두번째 슬라이드 애니메이션 이미지"></li>
                    <li><img src="/image/slide3.jpg" alt="세번째 슬라이드 애니메이션 이미지" title="세번째 슬라이드 애니메이션 이미지"></li>
                </ul>
                <div id="slide-control-wrap">
                <ul id="slide-control">
                    <li onClick="animation('prev')"></li>
                    <li>
                        <ul id="slide-btn">
                            <li onClick="animation(0)"></li>
                            <li onClick="animation(1)"></li>
                            <li onClick="animation(2)"></li>
                        </ul>
                    </li>
                    <li onClick="animation('next')"></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="content">
        	<div class="wrap">
            	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php"); ?>
            </div>
        </div>
    </div>
    <footer id="footer">
    	<div class="wrap">
        	<p>Copyright &copy; 드림파크 국화축제 All Right Reserved </p>
        </div>
    </footer>
</div>
</body>
</html>