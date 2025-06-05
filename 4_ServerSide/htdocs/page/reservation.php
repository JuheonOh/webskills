<?php 
    include_once("../include/lib.php");
    access($_SESSION['lv'] == "user", "회원만 접근이 가능한 페이지입니다.", "../index.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>친환경 서울 - 차량예약</title>
<link href="../js/jquery-ui/jquery-ui.css" rel="stylesheet">
<link href="../css/default.css" rel="stylesheet">
<link href="../css/css.css" rel="stylesheet">
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui/jquery-ui.js"></script>
<script src="../js/script.js"></script>
</head>
<body>
<!--Screen-->
<div class="screen">
	<!--header-->
	<div class="header">
    	<div class="header_innaer">
        	<div class="logo">
            	<a href="../index.php" title="홈"><img src="../images/logo.png" title="홈" alt="홈"></a>
            </div>
            <div class="navigation">
            	<div class="mini_menu">
                    <a href="../index.php" title="홈">홈</a> <span>&bull;</span> 
                    <?php if($_SESSION['userid']){ ?>
                    <a href="../include/logout.php" title="로그아웃">로그아웃</a> <span>&bull;</span> 
                    <?php } else { ?>
                    <a href="login.php" title="로그인">로그인</a> <span>&bull;</span> 
                    <?php } ?>
                </div>
            	<ul>
					<li>
                    	<a href="../index.php" title="EV 쉐어링소개">
                        	EV 셰어링소개
                        </a>
                    </li>       
					<li>
                    	<a href="reservation.php" title="차량예약">
                        	차량예약
                        </a>
                    </li>       
					<li>
                    	<a href="mypage.php" title="내 예약보기">
                        	내 예약보기
                        </a>
                    </li> 
                    <li>
                    	<a href="adminpage.php" title="관리자페이지">
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
                	차량예약
                </div>
                
                <div class="CarReservation">
                	<div class="CarReservation-map">
                        <div class="CarReservation-locationBox" id="Yangcheon-gu">
                            <a href="#" title="양천구">
                                <div class="CarReservation-name">
                                    양천구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='양천구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                        
                         <div class="CarReservation-locationBox" id="Seodaemun-gu">
                            <a href="#" title="서대문구">
                                <div class="CarReservation-name">
                                    서대문구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='서대문구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                        
                         <div class="CarReservation-locationBox" id="Gangbuk-gu">
                            <a href="#" title="강북구">
                                <div class="CarReservation-name">
                                    강북구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='강북구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                        
                         <div class="CarReservation-locationBox" id="Gwanak-gu">
                            <a href="#" title="관악구">
                                <div class="CarReservation-name">
                                    관악구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='관악구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                        
                         <div class="CarReservation-locationBox" id="Seongdong-gu">
                            <a href="#" title="성동구">
                                <div class="CarReservation-name">
                                    성동구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='성동구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                        
                         <div class="CarReservation-locationBox" id="Gangnam-gu">
                            <a href="#" title="강남구">
                                <div class="CarReservation-name">
                                    강남구
                                </div>
                                <div class="CarReservation-num">
                                    <?php echo $pdo->query("select * from car where currentLocation='강남구'")->rowCount(); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="CarReservation-tableList">
                    	<div class="CarReservation-locationTitle">
                        	강남구<br>
                            EV차량예약
                        </div>
                        <div class="CarReservation-list">
                        	<table>
                                <thead>
                                	<tr>
                                    	<th>
                                        	차량사진
                                        </th>
                                    	<th>
                                        	예약정보입력
                                        </th>
                                    	<th>
                                        	예약조건
                                        </th>
                                    	<th>
                                        	예약하기
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
               
                
            </div>
        <div class="cl"></div>
        </div>
    </div>
</div>
</body>
</html>
