<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch();
	
	if($midx == "main5"){
		access($_SESSION['lv'] == "관리자", "접근할 수 없는 페이지입니다.");
	}
	
	if($midx == "main3" || $midx == "reservation_status" || $midx == "main4"){
		access(isset($_SESSION['userid']));
	}
	
	if($midx == "main4" && $sidx == "write"){
		$list_q = $pdo->query("select * from rsv where userid='{$_SESSION['userid']}' and review=0");
		$count = 0;
		while($list = $list_q->fetch()){
			$redate = strtotime($list['redate']." ".$list['en_time']);
			$date = strtotime(date("Y-m-d H:i:s"));
			if($redate < $date) $count++;
		}
		access($count > 0, "예약시간이 만료된 회원에게만 1번 후기를 작성할 수 있습니다.");
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php if($current == "main"){ echo "Quibeiro"; } else { echo "Quibeiro &gt; {$main['title']}"; } ?></title>
<link rel="stylesheet" href="/common/js/jquery/jquery-ui.css">
<link rel="stylesheet" href="/common/js/jquery/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="/common/css/common.css">
<?php if($midx == "reservation_status" || $midx == "main5"){ echo '<link rel="stylesheet" href="/common/css/dialog_print.css" media="print">'; }?>
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui.js"></script>
<script src="/common/js/common.js"></script>
<script src="/common/js/storage.js"></script>
</head>

<body>
<div id="wrap">
	<!-- header -->
	<header id="header">
    	<div class="wrap">
	        <h1 id="logo"><a href="/" title="HOME"><img src="/image/QUIABEIRO_REST_LOGO.png" title="LOGO" alt="LOGO"></a></h1>
            <ul id="util">
            	<li><a href="/" title="HOME">HOME</a>&nbsp;|&nbsp;</li>
                <?php if(!isset($_SESSION['userid'])){ ?>
                <li><a href="javascript:dialog('로그인', '/include/login.php', '300');" title="로그인">로그인</a>&nbsp;|&nbsp;</li>
                <li><a href="javascript:dialog('회원가입', '/include/join.php', '400')" title="회원가입">회원가입</a></li>
                <?php } else { ?>
                <li><a href="/reservation_status" title="내 예약현황">내&nbsp;예약현황</a>&nbsp;|&nbsp;</li>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } ?>
            </ul>
        </div>
        <nav id="menu">
        	<ul>
            	<li><a href="javascript:window_open('/intro/intro.html', 'intro');" title="레스토랑">레스토랑</a></li>
            	<?php
					$menu_r = $pdo->query("select * from menu where parent='0' and title!='레스토랑'");
					while($menu_list = $menu_r->fetch()){
                ?>
            	<li><a href="/<?php echo $menu_list['child']; ?>" title="<?php echo $menu_list['title']; ?>"<?php if($midx == $menu_list['child']) echo ' class="active"' ?>><?php echo $menu_list['title']; ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <!-- //header -->
    <!-- contents -->
    <div id="contents">
    	<div id="main_visual">
            <div id="animation">
            	<div id="animation_left">
                    <ul id="text">
                        <li>Quiabeiro</li>
                        <li>맛있는 음식을 만날수 있는곳</li>
                        <li>고급 레스토랑 Quiabeiro</li>
                        <li>언제나 손님의 행복을 생각합니다.</li>
                    </ul>
                    <ul id="slide_control">
                    	<li onClick="animation('prev')"></li>
                    	<li>
                            <ul id="slide_btn">
                                <li onClick="animation(0)"></li>
                                <li onClick="animation(1)"></li>
                                <li onClick="animation(2)"></li>
                            </ul>
                        </li>
                    	<li onClick="animation('next')"></li>
                    </ul>
                </div>
                <div id="animation_right">
                    <div id="slide_parent">
                        <ul id="slide">
                        	<li><img src="/image/slide1.png" title="slide1" alt="slide1"></li>
                            <li><img src="/image/slide2.png" title="slide2" alt="slide2"></li>
                            <li><img src="/image/slide3.png" title="slide3" alt="slide3"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
        	<div class="wrap">
            	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php"); ?>
            </div>
        </div>
    </div>
    <!-- //contents -->
    <!-- footer -->
    <footer id="footer">
    	<div class="wrap">
        	<p>Copyright Quiabeiro All Rights Reserved</p>
        </div>
    </footer>
    <!-- //footer -->
</div>
</body>
</html>