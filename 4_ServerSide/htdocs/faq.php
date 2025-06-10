<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>문의 하기</title>
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
    ?>
    <div class="container">
        <h3>문의하기</h3>
        <div class="panel"></div>
        <div class="chat-panel panel panel-default">
            <div class="panel-body">
                <ul class="chat">

                    
                </ul>
            </div>
            <div class="panel-footer">
                <form id="faqFrm" method="post" class="chat-form">
                    <textarea class="form-control" name="memo" cols="30" rows="10" placeholder="문의할 내용을 입력하세요" required></textarea>
                    <button type="submit" class="btn btn-warning" id="btn-chat">전송</button>
                    <label class="pull-right">a 태그와 text 태그를 사용할 수 있습니다.</label>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $.ajax({
                type : "POST",
                url : "ajax/getFaqList.php",
                success : function(data){
                    $(".chat").html(data);
                }
            });

            $("#faqFrm").submit(function(){
                var frm = $(this);

                $.ajax({
                    type : "POST",
                    url : "ajax/faqOk.php",
                    data : $(frm).serialize(),
                    success : function(data){
                        if(data){
                            alert(data);
                        } else {
                            $("textarea").val("");

                            $.ajax({
                                type : "POST",
                                url : "ajax/getFaqList.php",
                                success : function(data){
                                    $(".chat").html(data);
                                }
                            });
                        }
                    }
                })

                return false;
            });
        });
    </script>
</body>
</html>