<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	$main = $pdo->query("select * from menu where child='{$midx}'")->fetch();
	$sub = $pdo->query("select * from menu where parent='{$midx}' and child='{$sidx}'")->fetch();
	$page = $pdo->query("select * from menu where parent='{$midx}'")->fetch();
	
	if($midx == "main3" && $sidx == "sub2"){
		access($_SESSION['userid']);
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php if($current == "main"){ echo "Quibeiro"; } else { echo "Quibeiro &gt; {$main['title']} &gt; {$sub['title']}"; } ?></title>
<link rel="stylesheet" href="/common/js/jquery/jquery-ui-1.11.4/themes/blitzer/jquery-ui.css">
<link rel="stylesheet" href="/common/css/common.css">
<?php if($midx == "") echo "<link rel=\"stylesheet\" href=\"/common/css/main.css\">"; ?>
<script src="/common/js/jquery/jquery-1.11.2.js"></script>
<script src="/common/js/jquery/jquery-ui-1.11.4/jquery-ui.js"></script>
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
                <li><a href="javascript:dialog('회원가입', '/include/join.php', '550')" title="회원가입">회원가입</a></li>
                <?php } else { ?>
                <li><a href="/include/logout.php" title="로그아웃">로그아웃</a></li>
                <?php } ?>
            </ul>
        </div>
        <div id="menu">
        	<nav>
            	<ul>
                    <?php
						$menu_r = $pdo->query("select * from menu where parent='0' order by turn asc");
						while($menu_list = $menu_r->fetch()){
							$sub_a = $pdo->query("select * from menu where parent='{$menu_list['child']}' order by turn asc")->fetch();
					if($menu_list['title'] == "HOME"){
					?>
                    <li data-idx="<?php echo $menu_list['idx']; ?>" class="home"><a href="/" title="HOME">HOME</a></li>
                    <?php } else { ?>
                    <li data-idx="<?php echo $menu_list['idx']; ?>">
                    	<a href="/<?php echo $menu_list['child']."/".$sub_a['child'] ?>" title="<?php echo $menu_list['title']; ?>" <?php if($midx == $menu_list['child']) echo ' class="active"' ?>><?php echo $menu_list['title']; ?></a>
                    	<ul>
							<?php
                                $sub_r = $pdo->query("select * from menu where parent='{$menu_list['child']}' and title!='고객리뷰'");
                                while($sub_list = $sub_r->fetch()){
                            ?>
                            <li data-idx="<?php echo $sub_list['idx']; ?>"><a href="/<?php echo $menu_list['child']."/".$sub_list['child'] ?>" title="<?php echo $sub_list['title'] ?>" <?php if($sidx == $sub_list['child']) echo ' class="active"' ?>><?php echo $sub_list['title']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } } ?>
                </ul>
            </nav>
        </div>
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
<?php if($_SESSION['lv'] == "관리자"){ ?>
<script>
$(function(){
	$("#menu ul").sortable({
		stop : function(event, ui){
			var midx = new Array();
			var sidx = new Array();
			
			// 메인 메뉴
			$("#menu > nav > ul > li").each(function(index, element){
				midx.push($(this).data("idx"));
				
				// 서브 메뉴
				var sidxArr = new Array();
				$(this).children("ul").children("li").each(function(index, element){
					sidxArr.push($(this).data("idx"));
				});
				sidx.push(sidxArr);
			});
			
			
			$.ajax({
				type : "POST",
				cache : false,
				url : "/include/menu_swap.php",
				data : { "midx[]" : midx, "sidx[]" : sidx }
			});
		}
	});
});
</script>
<?php } ?>
</body>
</html>