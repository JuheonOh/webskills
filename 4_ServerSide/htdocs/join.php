<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>회원가입</title>
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
        <div class="col-lg-6 col-lg-offset-3 join-form">
            <h2>Hotel Jeju</h2>
            <div class="panel"></div>
            <form method="post" onsubmit="return frmSubmit(this, 'ajax/joinOk.php', '회원가입이 완료되었습니다.', '/')" class="form-horizontal join-form">
                <input type="text" class="form-control" name="userid" placeholder="Enter Email" required>
                <input type="text" class="form-control" name="username" placeholder="Enter Your Name" required>
                <input type="text" class="form-control" name="pw" placeholder="Enter Password" required>
                <input type="text" class="form-control" name="pw2" placeholder="Enter Password Again" required>
                <input type="submit" value="회원가입" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
</body>
</html>