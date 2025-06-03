<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch();
	$main_title = isset($main['title']) ? $main['title'] : '';
	$main_type = isset($main['type']) ? $main['type'] : '';

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>드림파크 국화축제</title>
<link rel="stylesheet" href="/common/css/common.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<link rel="stylesheet" href="/common/js/jquery-ui-1.10.4/jquery-ui-1.10.4/css/redmond/jquery-ui.css">
<script src="/common/js/jquery-1.11.1/jquery-1.11.1.js"></script>
<script src="/common/js/jquery-ui-1.10.4/jquery-ui-1.10.4/js/jquery-1.10.2.js"></script>
<script src="/common/js/jquery-ui-1.10.4/jquery-ui-1.10.4/js/jquery-ui-1.10.4.js"></script>
<script src="/common/js/jquery-ui-1.10.4/jquery-ui-1.10.4/js/jquery.ui.datepicker-ko.js"></script>
<script src="/common/js/common.js"></script>
</head>

<body>
<div id="wrap">
	<!-- header -->
	<header id="header">
    	<div class="wrap">
        	<h1 id="logo"><a href="/" title="LOGO"><img src="/image/logo.png" title="logo" alt="logo"></a></h1>
            <ul class="util">
            	<li><a href="/" title="Home">Home</a></li>
            </ul>
            <!-- Menu -->
            <nav class="menu">
            	<ul>
                	<?php
					$menu_r = $pdo->query("select * from menu where parent='0'");
					while($menu_list = $menu_r->fetch()){
					?>
                	<li<?php if($menu_list['child'] == "midx") echo " class='cur'"; ?>><a href="/<?php echo $menu_list['child']."/x/"; ?>" title="<?php echo $menu_list['title']; ?>"><?php echo $menu_list['title']; ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
            <!-- //Menu -->
        </div>
    </header>
    <!-- //header -->
    <!-- Contents -->
    <div id="contents">
    	<?php if(!$sidx == "x"){ ?>
    	<div id="animation">
            <div id="slide_parent">
                <ul id="slide">
                    <li><img src="/image/slide_img1.png" title="slide1" alt="slide1"></li>
                </ul>
            </div>
        </div>
        <?php } else { ?>
        <div id="sub_animation">
            <div id="sub_slide_parent">
                <ul id="sub_slide">
                    <li><img src="/image/slide_img1.png" title="slide1" alt="slide1"></li>
                </ul>
            </div>
        </div>
        <?php } ?>
        <div class="content">
        	<div class="wrap">
            	<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php"); ?>
            </div>
        </div>
    </div>
    <!-- //Contents -->
    <!-- Footer -->
    <footer id="footer">
    	<div class="wrap">
        	<p>Copyright (c) 드림파크 국화축제 All Right Reserved</p>
        </div>
    </footer>
    <!-- //Footer -->
</div>
</body>
</html>