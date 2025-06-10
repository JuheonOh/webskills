<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>메인페이지</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</head>

<body>
    <?php 
        include_once("header.php");
     ?>
    <div class="container">
        <div class="page-header">
            <h2>오늘의 예약 현황</h2>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <div class="col-lg-6 col-lg-offset-6">
                <div class="input-group">
                    <span class="input-group-addon">날짜검색</span>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="showListBtn">보기</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <p>* 각 층별로 홀수실은 바다, 짝수실은 육지를 바라보고 있습니다.</p>
        </div>
        <div id="list">
            
        </div>
        <script>
            var date = $("#date").val();

            $.ajax({
                type : "POST",
                url : "ajax/getMainRoomList.php",
                data : { date : date },
                success : function(data){
                    $("#list").html(data);
                }
            });

            $("#showListBtn").click(function(){
                var date = $("#date").val();

                $.ajax({
                    type : "POST",
                    url : "ajax/getMainRoomList.php",
                    data : { date : date },
                    success : function(data){
                        $("#list").html(data);
                    }
                });
            });
        </script>
</body>
</html>
