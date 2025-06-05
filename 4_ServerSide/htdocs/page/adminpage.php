<?php 
    include_once("../include/lib.php");
    access($_SESSION['lv'] == "admin", "관리자만 접근이 가능한 페이지입니다.", "../index.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>친환경 서울 - 관리자페이지</title>
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
                	관리자페이지
                </div>
                
                <div class="adminPage-list">
                	<h3>EV차량유동현황</h3>
			        <select id="changeArea">
                        <option value="전체보기">전체보기</option>
                        <option value="강북구">강북구</option>
                        <option value="서대문구">서대문구</option>
                        <option value="성동구">성동구</option>
                        <option value="양천구">양천구</option>
                        <option value="관악구">관악구</option>
                        <option value="강남구">강남구</option>
                    </select>
                    <table>
                        <thead>
                        	<tr>
                            	<th>
                                    구역별구분
                                </th>
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
                                   	차량상태
                                </th>
                                <th>
                                    차량이동
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $car = $pdo->query("select * from car order by currentLocation");
                                $rowspanChk = 0;
                                while($rs = $car->fetch(2)){
                                    $rowspan = $pdo->query("select * from car where currentLocation='{$rs['currentLocation']}'")->rowCount();
                                    $rsv = $pdo->query("select * from rsv where cidx='{$rs['idx']}' order by idx desc limit 1")->fetch(2);
                            ?>
                            <tr>
                                <?php if($rowspanChk == 0){ ?>
                            	<td rowspan="<?php echo $rowspan; ?>" class="wordOffice">
                                   <strong><?php echo $rs['currentLocation']; ?></strong>
                              	</td>
                                <?php } ?>
                                <td>
                                    <img src="<?php echo $rs['image']; ?>" title="<?php echo $rs['number']; ?>" alt="<?php echo $rs['number']; ?>">
                                    <p>EV Serial No. - <?php echo $rs['number']; ?></p>
                                </td>
                                <td>
                                    <?php if($rsv){ ?>
                                	<p><strong>출발지</strong> : <?php echo $rsv['location_start']; ?> -> <strong>도착지</strong> : <?php echo $rsv['location_end']; ?></p>
                                    <p><strong>대여시간</strong> : <?php echo str_replace("-", "/", $rsv['time_start']); ?> ~ <strong>반납시간</strong> : <?php echo str_replace("-", "/", $rsv['time_end']); ?></p>
                                    <?php } else { ?>
                                    -
                                    <?php } ?>
                                    
                                </td>
                                <td>
                                    <?php if($rsv && $rsv['location_start'] == $rsv['location_end']){ ?>
                                        왕복
                                    <?php } else if($rsv && $rsv['location_start'] != $rsv['location_end']){ ?>
                                        편도
                                    <?php } else { ?>
                                        -
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php 
                                        if($rsv){
                                            if($rsv['time_end'] > date("Y-m-d H:i")){
                                                echo "예약차량";
                                            } else if($rsv['time_end'] < date("Y-m-d H:i")){
                                                echo "입고대기";
                                            }
                                        } else {
                                            echo "예약대기";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <select <?php if($rsv) echo "disabled"; ?>>
                                        <option value="">이동지역선택</option>
                                        <option value="강북구">강북구</option>
                                        <option value="강남구">강남구</option>
                                        <option value="서대문구">서대문구</option>
                                        <option value="성동구">성동구</option>
                                        <option value="양천구">양천구</option>
                                        <option value="관악구">관악구</option>
                                    </select>
                                    <button class="moveLocation" data-cidx='<?php echo $rs['idx'] ?>'>이동하기</button>
                                </td>
                            </tr>
                            <?php $rowspanChk++; if($rowspan == $rowspanChk) $rowspanChk = 0; } ?>
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
