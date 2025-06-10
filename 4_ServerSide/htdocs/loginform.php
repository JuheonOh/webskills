<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>로그인</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</head>
<body>
    <?php 
        include_once("header.php");

        access($_SESSION['midx']);
    ?>
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
            <h2>Hotel Jeju</h2>
            <div class="panel"></div>
            <form method="post" onsubmit="return frmSubmit(this, 'ajax/loginOk.php', '로그인이 완료되었습니다.', '/')" class="form-horizontal join-form">
                <input type="text" class="form-control" name="userid" placeholder="Enter Email" required>
                <input type="text" class="form-control" name="pw" placeholder="Enter Password" required>
                <input type="submit" value="로그인" class="btn btn-success btn-block">
                <label><input type="checkbox" name="autologin"> 자동 로그인</label>
            </form>
        </div>
    </div>
</body>
</html>