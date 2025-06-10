<?php 
    include_once("include/lib.php");
 ?>
<nav class="navbar navbar-default" style="margin-bottom:10px;">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Hotel Jeju</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="cReserve.php">예약하기</a></li>
            <li><a href="faq.php">문의하기</a></li>
        </ul>
        <?php 
            if($_SESSION['midx']){
                if($_SESSION['lv'] == "admin"){
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;관리자님</a></li>
                <li><a href="admin.php"><i class="glyphicon glyphicon-cog"></i>&nbsp;관리자 페이지</a></li>
                <li><a href="include/logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;로그아웃</a></li>
            </ul>
            <?php } else { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $_SESSION['username']; ?>님(<?php echo number_format($pdo->query("select * from member where midx='{$_SESSION['midx']}'")->fetch(2)['point']); ?>포인트 보유중)</a></li>
                <li><a href="include/logout.php"><i class="glyphicon glyphicon-log-out"></i>&nbsp;로그아웃</a></li>
            </ul>
            <?php } ?>
        <?php } else { ?>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="join.php"><i class="glyphicon glyphicon-user"></i>&nbsp;회원가입</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="loginform.php"><i class="glyphicon glyphicon-lock"></i>&nbsp;로그인<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <form method="post" onsubmit="return frmSubmit(this, 'ajax/loginOk.php', '로그인이 완료되었습니다.', '/')" class="form-horizontal login-form">
                            <label><input name="autologin" type="checkbox">&nbsp;자동로그인</label>
                            <input type="text" class="form-control input-sm" name="userid" placeholder="Enter ID">
                            <input type="password" class="form-control input-sm" name="pw" placeholder="Enter PASSWORD">
                            <input type="submit" class="btn btn-success btn-sm btn-block" value="로그인">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
</nav>