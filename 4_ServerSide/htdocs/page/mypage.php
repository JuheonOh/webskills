<?php 
    include_once("../include/lib.php");
    access($_SESSION['lv'] == "user", "회원만 접근이 가능한 페이지입니다.", "../index.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>친환경 서울 - 내 예약보기</title>
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
                	내 예약보기
                </div>
               
               
                <div class="MyReservation-list">
                    <h3>예약정보</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    차량사진
                                </th>
                                <th>
                                	예약정보
                                </th>
                                <th>
                                   	예약조건
                                </th>
                                <th>
                                   	예약상태
                                </th>
                                <th>
                                    예약취소
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $mypage = $pdo->query("select * from rsv where midx='{$_SESSION['idx']}'");
                                $count = $mypage->rowCount();

                                if($count == 0){
                            ?>
                                <tr>
                                    <td colspan="5">예약 내역이 존재하지 않습니다.</td>
                                </tr>
                            <?php
                                } else {
                                    while($rs = $mypage->fetch(2)){
                                        $car = $pdo->query("select * from car where idx='{$rs['cidx']}'")->fetch(2);
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $car['image']; ?>" title="<?php echo $car['number']; ?>" alt="<?php echo $car['number']; ?>">
                                        <p>EV Serial No. - <?php echo $car['number']; ?></p>
                                    </td>
                                    <td>
                                    	<p><strong>출발지</strong> : <?php echo $rs['location_start']; ?> -> <strong>도착지</strong> : <?php echo $rs['location_end']; ?></p>
                                        <p><strong>대여시간</strong> : <?php echo str_replace("-", "/", $rs['time_start']); ?> ~ <strong>반납시간</strong> : <?php echo str_replace("-", "/", $rs['time_end']); ?></p>
                                        
                                    </td>
                                    <td>
                                        <?php 
                                            if($rs['location_start'] == $rs['location_end']){
                                                echo "왕복";
                                            } else {
                                                echo "편도";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($rs['time_start'] > date("Y-m-d H:i")){
                                                echo "예약접수";
                                            } else if($rs['time_start'] <= date("Y-m-d H:i") && $rs['time_end'] > date("Y-m-d H:i")){
                                                echo "대여중";
                                            } else {
                                                echo "대여종료";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if(date($rs['time_start'], strtotime("+ 30 minutes")) >= date("Y-m-d H:i")){ ?>
                                            <button type="button" data-ridx='<?php echo $rs['idx']; ?>' class='rsvCancel'>예약취소</button>
                                        <?php } else { ?>
                                            취소불가
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div> 
                
               
                
            </div>
        <div class="cl"></div>
        </div>
    </div>
</div>
</body>
</html>
