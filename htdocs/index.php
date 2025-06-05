<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch();
	$sub = $pdo->query("select * from menu where parent='{$midx}' and child='{$sidx}'")->fetch();
	$page = $pdo->query("select * from menu where parent='{$midx}'")->fetch();

	$type = isset($sub['type']) ? explode("_", $sub['type']) : [];
	if(isset($sub['type']) && strstr($sub['type'], "_")) array_pop($type);
	$type = implode("_", $type);
	if($action == NULL){
		$include_file = isset($sub['type']) ? $sub['type'] : "";
	} else {
		$include_file = "{$type}_{$action}";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/common/css/common.css">
<link rel="stylesheet" href="/common/css/print.css" media="print">
<link rel="stylesheet" href="/common/js/ui/css/ui-lightness/jquery-ui-1.10.4.custom.css">
<?php if($midx == "main2" && $sidx == "sub2"){ ?>
<link rel="stylesheet" href="/common/css/media.css">
<?php } ?>
<script src="/common/js/ui/js/jquery-1.10.2.js"></script>
<script src="/common/js/ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="/common/js/ui/js/jquery.ui.datepicker-ko.js"></script>
<script src="/common/js/common.js"></script>
<?php if($midx == "main1" && $sidx == "sub1"){ ?>
<base href="/attachment/">
<?php } ?>
<title>DreamRentacar</title>
</head>

<body>
<div id="wrap">
	<header id="header">
    	<div class="wrap">
        	<h1 id="logo"><a href="/" title="HOME"><img src="/source/Design/logo/png/logo.png" alt="logo" title="logo"></a></h1>
            <ul class="util">
            	<li><a href="/" title="HOME">홈</a></li>
                <?php if(isset($_SESSION['userid'])){ ?>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } else { ?>
                <li><a href="javascript:join_open('회원가입');" title="회원가입">회원가입</a></li>
                <?php } ?>
                <?php if($_SESSION['lv'] == "관리자"){ ?>
                <li><a href="/admin/slide" title="슬라이드관리">슬라이드관리</a></li>
                <?php } ?>
            </ul>
            <nav class="menu">
            	<ul>
                	<?php
						$menu_r = $pdo->query("select * from menu where parent='0'");
						while($menu_list = $menu_r->fetch()){
							$sub_a = $pdo->query("select * from menu where parent='{$menu_list['child']}'")->fetch();
					?>
                    <li>
                    	<a href="/<?php echo $menu_list['child']."/".$sub_a['child']; ?>" title="<?php echo $menu_list['title']; ?>"<?php if($midx == $menu_list['child']) echo ' class="active"' ?>><?php echo $menu_list['title']; ?></a>
                        <ul>
                        	<?php
								$sub_r = $pdo->query("select * from menu where parent='{$menu_list['child']}'");
								while($sub_list = $sub_r->fetch()){
							?>
                            <li><a href="/<?php echo $sub_list['parent']."/".$sub_list['child']; ?>" title="<?php echo $sub_list['title']; ?>"<?php if($sidx == $sub_list['child']) echo ' class="active"' ?>><?php echo $sub_list['title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    <div id="contents">
    <?php if($midx == ""){ ?>
    	<div id="animation">
        	<div id="slide_parent">
            	<?php
					$slide = $pdo->query("select * from slide where type=1 order by sidx asc");
					if($slide->rowCount() >= 3){
				?>
            	<ul id="slide">
                	<?php while($list = $slide->fetch()){ ?>
                    <li><img src="/data/slide/<?php echo $list['file']; ?>" alt="<?php echo $list['file']; ?>" title="<?php echo $list['file']; ?>"></li>
                    <?php } ?>
                </ul>
                <ul id="slide_control">
                </ul>
                <?php } else { ?>
                <p title="슬라이드 이미지를 최소 3개 이상 지정해주세요.">슬라이드 이미지를 최소 3개 이상 지정해주세요.</p>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
    	<div id="sub_animation">
        	<div id="sub_slide_parent">
            	<ul id="sub_slide">
                    <li><img src="/data/slide/slide2.jpg" title="slide2" alt="slide2"></li>
                </ul>
            </div>
        </div>
    <?php } ?>
    	<div id="login_layer">
        	<div class="wrap">
	            <?php include_once("{$_SERVER['DOCUMENT_ROOT']}/include/login_layer.php"); ?>
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
        	<p>Copyright &copy; DreamRentacar All Right Reserved</p>
        </div>
    </footer>
</div>
</body>
</html>