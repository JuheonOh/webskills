<?php 
    include_once("../include/lib.php");

    $date = $_POST['date'];

    $floorArr = [ 1, 2, 3, 4, 5 ];
    foreach($floorArr as $floor){
        $room_r = $pdo->query("select * from room where floor='{$floor}'");
        for($i = 1; $room = $room_r->fetch(2); $i++){
            $appChk = $pdo->query("select * from application where ridx='{$room['ridx']}' and ((stdate between '{$date}' and '{$date}') or (endate between '{$date}' and '{$date}'))")->rowCount();

            if($i == 1){
                ?>
                <div class='panel panel-default'>
                    <div class='panel-heading'><?php echo $floor; ?>층
                        <span class='label label-primary pull-right'>사용중</span>
                    </div>
                    <div class='panel-body'>
                        <table class='table table-bordered hotel-view'>
                            <tr>
                                <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?>><?php echo $room['number'] ?></td>
                <?php

            }

            if($i > 1 && $i <= 10){
            ?>
                <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?>><?php echo $room['number']; ?></td>
            <?php
            }

            if($i == 10){
            ?>
                </tr>
                <tr>
                    <td colspan='10'></td>
                </tr>
                <tr>
            <?php
            }

            if($i > 10 && $i <= 20){
            ?>
                <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?>><?php echo $room['number']; ?></td>
            <?php
            }

            if($i == 20){
            ?>
                    </tr>
                    </table>
                </div>
            </div>
            <?php
            }
        }
    }
?>