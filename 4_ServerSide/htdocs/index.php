<?php 
    include_once("include/lib.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>친환경 서울 - EV 쉐어링소개</title>
<link href="js/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="css/default.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui.js"></script>
<script src="js/script.js"></script>
</head>
<body>
<!--Screen-->
<div class="screen">
	<!--header-->
	<div class="header">
    	<div class="header_innaer">
        	<div class="logo">
            	<a href="index.php" title="홈"><img src="images/logo.png" title="홈" alt="홈"></a>
            </div>
            <div class="navigation">
            	<div class="mini_menu">
                    <a href="index.php" title="홈">홈</a> <span>&bull;</span> 
                    <?php if($_SESSION['userid']){ ?>
                    <a href="include/logout.php" title="로그아웃">로그아웃</a> <span>&bull;</span> 
                    <?php } else { ?>
                    <a href="page/login.php" title="로그인">로그인</a> <span>&bull;</span> 
                    <?php } ?>
                </div>
            	<ul>
					<li>
                    	<a href="index.php" title="EV 쉐어링소개">
                        	EV 셰어링소개
                        </a>
                    </li>       
					<li>
                    	<a href="page/reservation.php" title="차량예약">
                        	차량예약
                        </a>
                    </li>       
					<li>
                    	<a href="page/mypage.php" title="내 예약보기">
                        	내 예약보기
                        </a>
                    </li> 
                    <li>
                    	<a href="page/adminpage.php" title="관리자페이지">
                        	관리자페이지
                        </a>
                    </li>   
                </ul>
            </div>
        </div>	
    </div>
    
    <!--contents-->
    <div class="contents">
    	<div class="contents_inner">
        	<div class="contents_inner_box">
           		<!--title-->
				<div class="title">
                	EV 셰어링소개
                </div>
                
                <div class="EVInfomation">
                	<div class="EVInfomation-img">
                		<img src="images/info_pic.png" title="EV Infomation" alt="EV Infomation">
                	</div>
                </div>
                
            </div>
        <div class="cl"></div>
        </div>
    </div>
</div>
</body>
</html>
