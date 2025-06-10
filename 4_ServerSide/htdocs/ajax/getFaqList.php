<?php 
    include_once("../include/lib.php");

    $faq_r = $pdo->query("select * from faq where midx='{$_SESSION['midx']}' order by fidx desc");
    while($faq = $faq_r->fetch(2)){
        $wdate = time() - strtotime($faq['wdate']);
?>
<li class="right clearfix">
    <div class="chat-body clearfix">
        <div class="header">
            <small class=" text-muted">
                <i class="glyphicon glyphicon-time"></i>
                <?php
                    if($wdate / 60 < 60){
                        echo floor($wdate / 60)."분 전";
                    } else if($wdate / 60 > 59 && $wdate / 60 / 60 < 24){
                        echo floor($wdate / 60 / 60)."시간 전";
                    } else {
                        echo explode(" ", $faq['wdate'])[0];
                    }
                ?> 
            </small>
            <strong class="pull-right primary-font"><?php echo $_SESSION['username']; ?>님</strong>
        </div>
        <p>
            <?php
                $memo = "";
                $memo = strip_tags($faq['memo'], "<a><text>");

                $memo = str_replace("<text rgb=\"", "<span style=\"color:rgb(", $memo);
                $memo = str_replace("<text hex=\"", "<span style=\"color:#", $memo);

                echo str_replace("\r\n", "<br>", $memo);
            ?>
        </p>
    </div>
</li>
<?php } ?>