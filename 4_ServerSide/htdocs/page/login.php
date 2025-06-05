<?php
    include_once("../include/lib.php");
    access(!isset($_SESSION['userid']), "비회원만 접근이 가능한 페이지입니다.", "../index.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>친환경 서울 - 로그인</title>
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
                	로그인
                </div>
                
                <div class="LoginBox">
                	<form method="post" onsubmit="return frmSubmit(this, '../include/loginOk.php', '로그인이 완료되었습니다.', '../index.php')">
                        <fieldset>
                        	<table>
                            	<tr>
                                    <td>
                                  		<input type="text" name="userid" id="id" title="아이디" placeholder="아이디">
                                    </td>	
                                </tr>
                                <tr>
                                    <td>
                                  		<input type="password" name="pw" id="password" title="비밀번호" placeholder="비밀번호">
                                    </td>	
                                </tr>
                            </table>
                           	<input type="submit" id="loginBtn" title="로그인" value="LOGIN">
                        </fieldset>
                    </form>
                </div>
               
                
            </div>
        <div class="cl"></div>
        </div>
    </div>
</div>
</body>
</html>
