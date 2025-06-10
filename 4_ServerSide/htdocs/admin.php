<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>관리자 페이지</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</head>

<body>
    <?php 
        include_once("header.php");

        access($_SESSION['lv'] != "admin");
     ?>
    <div class="container">
        <h3>포인트 지급</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" onsubmit="return frmSubmit(this, 'ajax/pointOk.php', '포인트 지급이 완료되었습니다.', 'admin.php');" class="admin-point-form">
                    <div class="input-group">
                        <span class="input-group-addon">회원 아이디(이메일)</span>
                        <input type="text" name="userid" class="form-control" placeholder="example@worldskill.co.kr">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">포인트 금액</span>
                        <input type="text" class="form-control" name="point" placeholder="10000">
                    </div>
                    <button type="submit" class="btn btn-success">지급</button>
                </form>
            </div>
        </div>
        <h3>방 가격 설정</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>방 모두 변경</h4>
                        <form method="post" onsubmit="return frmSubmit(this, 'ajax/modifyAllRoomPrice.php', '가격 변경이 완료되었습니다.', 'admin.php')" class="admin-point-form">
                            <div class="input-group">
                                <span class="input-group-addon">가격</span>
                                <input type="number" class="form-control" name="price" placeholder="가격을 입력하세요" required>
                            </div>
                            <button class="btn btn-success btn-block" type="submit">변경</button>
                        </form>
                        <hr>
                        <h4>선택방 변경</h4>
                        <form method="post" onsubmit="return frmSubmit(this, 'ajax/modifyRoomPrice.php', '가격 변경이 완료되었습니다.', 'admin.php')" class="admin-point-form">
                            <select class="form-control" id="number" name="number[]" multiple required>
                            <?php 
                                $room_r = $pdo->query("select * from room order by number");
                                while($room = $room_r->fetch(2)){
                            ?>
                            <option value="<?php echo $room['number']; ?>"><?php echo $room['number']; ?></option>
                            <?php } ?>
                            </select>
                            <div class="input-group">
                                <span class="input-group-addon">가격</span>
                                <input type="number" class="form-control" name="price" placeholder="가격을 입력하세요" required>
                            </div>
                            <button class="btn btn-success btn-block" type="submit">변경</button>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <h4>방 가격 목록</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="admin-table">
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>층</th>
                                                <th>방번호</th>
                                                <th>가격</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $room_r = $pdo->query("select * from room order by number");
                                                while($room = $room_r->fetch(2)){
                                            ?>
                                            <tr>
                                                <td><?php echo $room['floor']."층"; ?></td>
                                                <td><?php echo $room['number']; ?></td>
                                                <td><?php echo $room['price']."원"; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>