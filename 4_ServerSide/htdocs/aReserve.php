<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>자동 예약</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</head>

<body>
    <?php 
        include_once("header.php");

        if($_COOKIE['login'] && !$_SESSION['midx']){
            $midx = decryption($_COOKIE['login']);

            $member = $pdo->query("select * from member where midx='{$midx}'")->fetch(2);

            $_SESSION['midx'] = $idchk['midx'];
            $_SESSION['userid'] = $idchk['userid'];
            $_SESSION['pw'] = $idchk['pw'];
            $_SESSION['username'] = $idchk['username'];
            $_SESSION['lv'] = $idchk['lv'];
        }

        access(!$_SESSION['midx']);
        access($_SESSION['lv'] == "admin");
    ?>
    <div class="container">
        <h3>예약하기</h3>
        <ul class="nav nav-pills nav-justified">
            <li><a href="cReserve.php">수동 예약</a></li>
            <li class="active"><a href="aReserve.php">자동 예약</a></li>
        </ul>
        <div class="panel"></div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <p>* 각 층별로 홀수실은 바다, 짝수실은 육지를 바라보고 있습니다.</p>
                        <form class="form-horizontal areserve-form">
                            <div class="input-group">
                                <span class="input-group-addon">입실</span>
                                <input type="date" class="form-control" value="2017-06-25">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">퇴실</span>
                                <input type="date" class="form-control" value="2017-06-30">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">객실수</span>
                                <input type="number" class="form-control" value="5">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">연속객실</span>
                                <input type="text" class="form-control" value="3">
                            </div>
                            <label><input type="radio" name="side" checked> 바다쪽</label>&nbsp;&nbsp;&nbsp;
                            <label><input type="radio" name="side"> 육지쪽</label>
                            <input type="submit" class="btn btn-success btn-block" value="조건 검색">
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <p class="text-right">* 동일 조건으로 여러가지 검색된다면 최상층을 표시합니다. 동일층에서 여러조건을 만족시 객실번호가 빠른 순으로 표시합니다.</p>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4>검색 결과</h4>
                                <table class="table table-bordered hotel-view">
                                    <tr>
                                        <td>401</td>
                                        <td>403</td>
                                        <td class="bg-primary">405</td>
                                        <td class="bg-primary">407</td>
                                        <td class="bg-primary">409</td>
                                        <td class="bg-primary">411</td>
                                        <td>413</td>
                                        <td>415</td>
                                        <td>417</td>
                                        <td>419</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">4층</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info">402</td>
                                        <td class="bg-info">404</td>
                                        <td>406</td>
                                        <td>408</td>
                                        <td class="bg-primary">410</td>
                                        <td class="bg-primary">412</td>
                                        <td class="bg-primary">414</td>
                                        <td>416</td>
                                        <td class="bg-primary">418</td>
                                        <td class="bg-primary">420</td>
                                    </tr>
                                </table><br>
                                <table class="table table-bordered hotel-view">
                                    <tr>
                                        <td>501</td>
                                        <td>503</td>
                                        <td class="bg-primary">505</td>
                                        <td class="bg-primary">507</td>
                                        <td class="bg-primary">509</td>
                                        <td class="bg-primary">511</td>
                                        <td>513</td>
                                        <td>515</td>
                                        <td>517</td>
                                        <td>519</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">5층</td>
                                    </tr>
                                    <tr>
                                        <td class="bg-info">502</td>
                                        <td class="bg-info">504</td>
                                        <td class="bg-info">506</td>
                                        <td>508</td>
                                        <td class="bg-primary">510</td>
                                        <td class="bg-primary">512</td>
                                        <td class="bg-primary">514</td>
                                        <td>516</td>
                                        <td class="bg-primary">518</td>
                                        <td class="bg-primary">520</td>
                                    </tr>
                                </table><br>
                                <form class="form-horizontal areserve-form">
                                    <div class="input-group">
                                        <span class="input-group-addon">방 번호</span>
                                        <input type="text" class="form-control" value="402, 404, 502, 504, 506" readonly>
                                    </div>
                                    <input type="submit" class="btn btn-success btn-block" value="예약하기">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>