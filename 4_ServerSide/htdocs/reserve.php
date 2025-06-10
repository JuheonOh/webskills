<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>예약 결제</title>
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
        access(!isset($_GET['application']));
    ?>
    <div class="container">
        <div class="page-header">
            <h3>예약 결제</h3>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-addon">입실</span>
                    <input type="date" class="form-control" id="stdate" value="<?php echo $_GET['stdate']; ?>" readonly>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="input-group">
                    <span class="input-group-addon">퇴실</span>
                    <input type="date" class="form-control" id="endate" value="<?php echo $_GET['endate']; ?>" readonly>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                        <?php 
                            $stdate = $_GET['stdate'];
                            $endate = $_GET['endate'];

                            $numberArr = $_GET['number'];

                            $floorArr = [];
                            foreach($numberArr as $number){
                                $floorArr[] = substr($number, 0, 1);
                                $floorArr = array_unique($floorArr);
                                sort($floorArr);
                            }

                            foreach($floorArr as $floor){
                                $room_r = $pdo->query("select * from room where floor='{$floor}'");
                                for($i = 1; $room = $room_r->fetch(2); $i++){
                                    $appChk = $pdo->query("select * from application where ridx='{$room['ridx']}' and ((stdate between '{$stdate}' and '{$endate}') or (endate between '{$stdate}' and '{$endate}'))")->rowCount();

                                    if($i == 1){
                            ?>
                                <div class="col-lg-6">
                                    <table class="table table-bordered hotel-view">
                                        <tr>
                                            <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?> <?php echo in_array($room['number'], $numberArr) ? "class='bg-info'" : "" ?>><?php echo $room['number']; ?></td>
                            <?php
                                    }

                                    if($i > 1 && $i <= 10){
                            ?>
                                        <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?> <?php echo in_array($room['number'], $numberArr) ? "class='bg-info'" : "" ?>><?php echo $room['number']; ?></td>
                            <?php
                                    }

                                    if($i == 10){
                            ?>
                                    </tr>
                                    <tr>
                                        <td colspan="10"><?php echo $floor; ?>층</td>
                                    </tr>
                                    <tr>
                            <?php        
                                    }

                                    if($i > 10 && $i <= 20){
                            ?>
                                    <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?> <?php echo in_array($room['number'], $numberArr) ? "class='bg-info'" : "" ?>><?php echo $room['number']; ?></td>
                            <?php
                                    }

                                    if($i == 20){
                            ?>
                                            </tr>
                                        </table>
                                    </div>
                            <?php
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <form class="form-inline reserve-form">
                            <div class="input-group">
                                <span class="input-group-addon">방 번호</span>
                                <input type="text" class="form-control"  id="number"value="<?php echo implode(",", $_GET['number']); ?>" readonly>
                            </div>
                            <div class="input-group">
                                <?php 
                                    $totalPrice = 0;
                                    $room_r = $pdo->query("select * from room");
                                    while($room = $room_r->fetch(2)){
                                        foreach($_GET['number'] as $number){
                                            if($room['number'] == $number){
                                                $totalPrice += $room['price'];
                                            }
                                        }

                                    }
                                ?>
                                <span class="btn btn-warning">총합 : <span class="badge"><span id="price"><?php echo number_format($totalPrice); ?></span>원</span></span>
                            </div>
                            <div class="input-group pull-right">
                                <span class="btn btn-success appOkBtn"><i class="glyphicon glyphicon-ok"></i> 결제하기</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $(".appOkBtn").click(function(){
                var stdate = $("#stdate").val();
                var endate = $("#endate").val();
                var number = $("#number").val();
                var price = $("#price").text();

                $.ajax({
                    type : "POST",
                    url : "ajax/appOk.php",
                    data : { stdate : stdate, endate : endate, number : number, price : price },
                    success : function(data){
                        if(data){
                            if(data == "예약을 다시 진행해주세요."){
                                alert(data);
                                link("cReserve.php");
                            } else {
                                alert(data);
                            }
                        } else {
                            alert("결제가 완료되었습니다.");
                            link("/");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>