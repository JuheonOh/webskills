<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch(2);
	$sub = $pdo->query("select * from menu where parent='{$midx}' and child='{$sidx}'")->fetch(2);
	$page = $pdo->query("select * from menu where parent='{$midx}'")->fetch(2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="본 사이트는 누구나, 어디서나, 원하는 강의를 무료로 들을 수 있는 '웹디자인 온라인 공개강좌 사이트' 입니다.">
<meta name="keywords" content="HTML5 CSS JAVASCRIPT JQUERY 홈페이지 포토샵">
<title>Web-Design MOOC</title>
<link rel="stylesheet" href="/common/js/jquery/jquery-ui-1.11.4/themes/redmond/jquery-ui.css">
<link rel="stylesheet" href="/common/css/common.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui-1.11.4/jquery-ui.js"></script>
<script src="/common/js/common.js"></script>
</head>

<body>
<!-- Wrap -->
<div id="wrap">
	<!-- header -->
	<header id="header">
    	<div class="wrap">
        	<h1 id="logo"><a href="/" title="HOME"><img src="/image/logo.png" title="LOGO" alt="LOGO"></a></h1>
            <ul id="util">
            	<?php if(isset($_SESSION['userid'])){ ?>
                <li><b><?php echo $_SESSION['userid']; ?></b> 님 환영합니다.</li>
            	<li><a href="/" title="HOME">HOME</a></li>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } else { ?>
                <li><a href="/" title="HOME">HOME</a></li>
                <li><a href="javascript:dialog('로그인', '/include/login.php', '300', '200')" title="로그인">로그인</a></li>
                <li><a href="javascript:dialog('회원가입', '/include/join.php', '500', '620')" title="회원가입">회원가입</a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- MENU -->
        <nav id="menu">
        	<div class="wrap">
            	<ul class="menu">
                	<?php
						$menu_r = $pdo->query("select * from menu where parent='0' limit 0, 4");
						while($menu_list = $menu_r->fetch(2)){
							$sub_a = $pdo->query("select * from menu where parent='{$menu_list['child']}'")->fetch(2);
					?>
                    <li<?php if($midx == $menu_list['child']) echo ' class="active"'; ?>>
                    	<a <?php if(!isset($_SESSION['userid']) && $menu_list['child'] == "main3"){ ?>href="javascript:alert('로그인 후 이용할 수 있습니다.')" <?php } else { ?> href="/<?php echo $menu_list['child']."/".$sub_a['child']; ?>" <?php } ?> title="<?php echo $menu_list['title']; ?>"><?php echo $menu_list['title']; ?></a>
                        <ul>
                        	<?php
								$sub_r = $pdo->query("select * from menu where parent='{$menu_list['child']}'");
								while($sub_list = $sub_r->fetch(2)){
							?>
                            <li>
                            	<?php if(isset($_SESSION['userid'])){ ?>
                            	<a href="/<?php echo $menu_list['child']."/".$sub_list['child']; ?>" title="<?php echo $sub_list['title']; ?>"<?php if($sidx == $sub_list['child']) echo ' class="active"'; ?>><?php echo $sub_list['title']; ?></a>
                                <?php } else { ?>
                                <a class="disabled" href="javascript:alert('로그인 후 이용할 수 있습니다.')" title="<?php echo $sub_list['title']; ?>"><?php echo $sub_list['title']; ?></a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if($_SESSION['lv'] == "admin"){ ?>
                    <li <?php if($midx == "admin") echo 'class="active"'?>>
                    	<a href="/admin/sub1" title="관리자 페이지">관리자 페이지</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
		<!-- MENU -->
    </header>
    <!-- header -->
    <!-- Contents -->
    <div id="contents">
    	<div class="wrap">
        	<?php if($midx == ""){ ?>
        	<!-- Animation -->
            <div id="animation">
            	<div id="animation_left">
                    <div id="slide_parent">
                        <ul id="slide">
                        	<li><img src="/image/slide1.jpg" alt="slide1" title="slide1"></li>
                            <li><img src="/image/slide2.jpg" alt="slide2" title="slide2"></li>
                            <li><img src="/image/slide3.jpg" alt="slide3" title="slide3"></li>
                        </ul>
                        <ul id="slide_control">
                        	<li onClick="animation('prev')"></li>
                            <li>
                            	<ul id="slide_btn">
                                </ul>
                            </li>
                            <li onClick="animation('next')"></li>
                        </ul>
                    </div>
                </div>
                <div id="animation_right">
                	<div id="main_view">
                    	<h3>MOOC 보기</h3>
                        <ul class="main_view">
                        	<?php
								$view = $pdo->query("select * from educate order by code limit 0, 4");
								while($list = $view->fetch(2)){
									$sum = $pdo->query("select * from educate_list where code='{$list['code']}'")->rowCount();
							?>
                        	<li>
                            	<a href="javascript:educate('<?php echo $list['idx']; ?>')" title="<?php echo $list['title']; ?>">
                                	<div class="view_top">
                                    	<img src="/data/main2/<?php echo $list['image']; ?>" title="<?php echo $list['title']; ?>" alt="<?php echo $list['title']; ?>">
                                    	<div class="view_title"><?php echo $list['title']; ?></div>
                                        <div class="details">View Detail</div>
                                    </div>
                                    <div class="view_content">
                                    	<ul>
                                        	<li>강좌코드 : <?php echo $list['code']; ?></li>
                                            <li>개강일 : <?php echo $list['st_date']; ?> ~ <?php echo $list['en_date']; ?></li>
                                            <li>수강신청자 수 : <?php echo $sum; ?> 명</li>
                                        </ul>
                                    </div>
                            	</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Animation -->
            <?php } else { ?>
    		<div id="sub_top">
            	<div id="sub_wrap">
                	<div id="sub_left">
                        <ul id="sub_font">
                            <li><button type="button" onClick="zoom(20)" title="글자확대">+</button></li>
                            <li><button type="button" onClick="zoom(100)" title="글자표준">＊</button></li>
                            <li><button type="button" onClick="zoom(-20)" title="글자축소">-</button></li>
                            <li><button type="button" onClick="print()" title="프린트">P</button></li>
                        </ul>
                        <h2>
                        	<?php
                            	if($midx == "main3"){
									echo $sub['title'];
								} else {
									echo $main['title'];
								}
							?>
                        </h2>
                        <p><?php echo $sub['contents']; ?></p>
                    </div>
                    <div id="sub_right">
                    	<div id="sub_image"><img src="/data/sub_image/<?php echo substr(str_shuffle("12345"), 0, 1); ?>.jpg" title="sub_image" alt="sub_image"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- content -->
            <div class="content">
            	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php"); ?>
            </div>
            <!-- content -->
        </div>
    </div>
    <!-- Contents -->
    <!-- Footer -->
    <footer id="footer">
    	<div class="wrap">
        	<p>Copyright &copy; Web-Design MOOC All Rights Reserved</p>
        </div>
    </footer>
    <!-- Footer -->
</div>
<!-- Wrap -->
</body>
</html>