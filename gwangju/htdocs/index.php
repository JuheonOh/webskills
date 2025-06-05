<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch(2);
	$sub = $pdo->query("select * from menu where parent='{$midx}' and child='{$sidx}'")->fetch(2);
	$page = $pdo->query("select * from menu where parent='{$midx}'")->fetch(2);

	if(isset($action) && $action != "x" && strstr($sub['type'], "_")){
		$type = explode("_", $sub['type']);
		array_pop($type);
		$type = implode("_", $type);
		$include_file = $type."_".$action;

	} else {
		$include_file = isset($sub['type']) ? $sub['type'] : "";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/common/js/jquery/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="/common/css/common.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<link rel="stylesheet" href="/common/css/main.css">
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui.js"></script>
<script src="/common/js/jquery/jquery.ui.datepicker-ko.js"></script>
<script src="/common/js/common.js"></script>
<title>Quiabeiro</title>
</head>

<body>
<div id="wrap">
	<header id="header">
    	<div class="wrap">
        	<h1 id="logo"><a href="/" title="HOME"><img src="/source/Design/logo/png/logo.png" title="LOGO" alt="LOGO"></a></h1>
            <ul class="util">
            	<li><a href="/" title="HOME">Home</a></li>
                <?php if(isset($_SESSION['userid'])){ ?>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } else { ?>
                <li><a href="javascript:dialog('로그인', '/include/login.html', 300);" title="로그인">로그인</a></li>
                <li><a href="javascript:dialog('회원가입', '/include/join.html', 600);" title="회원가입">회원가입</a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="menu">
        	<nav class="menu">
            	<ul>
                	<li><a href="/" title="HOME">HOME</a></li>
                    <?php
						$menu_r = $pdo->query("select * from menu where parent='0'");
						while($menu_list = $menu_r->fetch()){
							$sub_a = $pdo->query("select * from menu where parent='{$menu_list['child']}'")->fetch();
					?>
                    <li>
                    	<a href="/<?php echo $menu_list['child']."/".$sub_a['child'] ?>" title="<?php echo $menu_list['title']; ?>" <?php if($midx == $menu_list['child']) echo ' class="active"' ?>><?php echo $menu_list['title']; ?></a>
                    	<ul>
							<?php
                                $sub_r = $pdo->query("select * from menu where parent='{$menu_list['child']}'");
                                while($sub_list = $sub_r->fetch()){
                            ?>
                            <li><a href="/<?php echo $menu_list['child']."/".$sub_list['child'] ?>" title="<?php echo $sub_list['title'] ?>" <?php if($sidx == $sub_list['child']) echo ' class="active"' ?>><?php echo $sub_list['title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <li><a href="javascript:dashboard();" title="주문 현황판">주문 현황판</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="contents">
        <div id="animation">
        <?php if($midx == ""){ ?>
            <div id="slide_parent">
                <ul id="slide">
                    <li><img src="/image/slide1.png" alt="slide" title="slide"></li>
                    <li><img src="/image/slide2.png" alt="slide" title="slide"></li>
                    <li><img src="/image/slide3.png" alt="slide" title="slide"></li>
                </ul>
                <!--
                <ul id="slide_control">
                    <li><a href="javascript:void(0);" title="slideCurrent"><img src="/image/slidecurrent.png" title="slide1" alt="slide1"></a></li>
                    <li><a href="javascript:void(0);" title="slideNotCurrent"><img src="/image/slidenotcurrent.png" title="notslide" alt="notslide"></a></li>
                    <li><a href="javascript:void(0);" title="slideNotCurrent"><img src="/image/slidenotcurrent.png" title="notslide" alt="notslide"></a></li>
                </ul>
                -->
            </div>
        <?php } else { ?>
            <div id="sub_slide_parent">
                <div id="sub_slide_text">
                    <h3 class="title"><?php echo $main['title']; ?></h3>
                    <ul class="sub_menu">
                    	<?php
							$sql = $pdo->query("select * from menu where parent='{$midx}'");
							while($row = $sql->fetch()){
						?>
                        <li><a href="/<?php echo $row['parent']."/".$row['child'] ?>" title="<?php echo $row['title']; ?>" <?php if($sidx == $row['child']) echo ' class="submenu"' ?>><?php echo $row['title']; ?></a></li>
                        <?php } ?>
                    </ul>
                    <ul class="sub_font">
                        <li><a href="javascript:print();" title="프린트">P</a></li>
                        <li><a href="javascript:zoom(20);" title="글자확대">+</a></li>
                        <li><a href="javascript:zoom(100);" title="글자표준">＊</a></li>
                        <li><a href="javascript:zoom(-20);" title="글자축소">-</a></li>
                    </ul>
                    <ul class="sub_page">
                        <li><a href="/" title="HOME">HOME</a>&nbsp;&gt;&nbsp;</li>
                        <li><a href="/<?php echo $page['parent']."/".$page['child']; ?>" title="<?php echo $main['child']; ?>"><?php echo $main['title']; ?></a>&nbsp;&gt;&nbsp;</li>
                        <li><a href="/<?php echo $main['child']."/".$sub['child']; ?>" title="<?php echo $sub['title']; ?>"><?php echo $sub['title']; ?></a></li>
                    </ul>
                </div>
            </div>
        <?php } ?>
        </div>
    <div class="content">
        <div class="wrap">
            <?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php"); ?>
        </div>
    </div>
    <footer id="footer">
    	<div class="wrap">
        	<p>Copyright &copy; QUIABEIRO All Right Reserved</p>
        </div>
    </footer>
</div>
</body>
</html>