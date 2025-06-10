<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>수동 예약</title>
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
            <li class="active"><a href="cReserve.php">수동 예약</a></li>
            <li><a href="aReserve.php">자동 예약</a></li>
        </ul>
        <div class="panel"></div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                    <p>
                        예약된 방 : <spaa class="label label-primary"> 방 번호 </spaa> 
                        <span class="pull-right">* 각 층별로 홀수실은 바다, 짝수실은 육지를 바라보고 있습니다.</span>
                    </p>
                    </div>
                    <div class="col-lg-4">
                        <form method="get" action="reserve.php" class="form-horizontal creserve-form">
                            <input type="hidden" name="application">
                            <div class="input-group">
                                <span class="input-group-addon">입실</span>
                                <input type="date" class="form-control" id="stdate" name="stdate" value="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">퇴실</span>
                                <input type="date" class="form-control" id="endate" name="endate" value="<?php echo date("Y-m-d", strtotime("+1 days")); ?>" required>
                            </div>
                            <label for="number">방번호 선택</label>
                            <select multiple class="form-control" id="number" name="number[]" required>
                            </select>
                            <input type="submit" class="btn btn-success btn-block" value="예약하기">
                        </form>
                    </div>
                    <div class="col-lg-8" id="list">
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    <script>
        var stdate = $("#stdate").val();
        var endate = $("#endate").val();

        $.ajax({
            type : "POST",
            url : "ajax/getNumberList.php",
            data : { stdate : stdate, endate : endate },
            success : function(data){
                $("#number").html(data);
            }
        });

        $.ajax({
            type : "POST",
            url : "ajax/getRoomList.php",
            data : { stdate : stdate, endate : endate },
            success: function(data){
                $("#list").html(data);
            }
        });

        $("#stdate").change(function(){
            var stdate = $("#stdate").val();
            var endate = $("#endate").val();

            if(stdate == "" || endate == ""){
                $("#number").html("");
            } else {
                $.ajax({
                    type : "POST",
                    url : "ajax/getNumberList.php",
                    data : { stdate : stdate, endate : endate },
                    success : function(data){
                        $("#number").html(data);
                    }
                });

                $.ajax({
                    type : "POST",
                    url : "ajax/getRoomList.php",
                    data : { stdate : stdate, endate : endate },
                    success: function(data){
                        $("#list").html(data);
                    }
                });
            }
        });

        $("#endate").change(function(){
            var stdate = $("#stdate").val();
            var endate = $("#endate").val();

            if(stdate == "" || endate == ""){
                $("#number").html("");
            } else {
                $.ajax({
                    type : "POST",
                    url : "ajax/getNumberList.php",
                    data : { stdate : stdate, endate : endate },
                    success : function(data){
                        $("#number").html(data);
                    }
                });

                $.ajax({
                    type : "POST",
                    url : "ajax/getRoomList.php",
                    data : { stdate : stdate, endate : endate },
                    success: function(data){
                        $("#list").html(data);
                    }
                });
            }
        });


    </script>
</body>
</html>