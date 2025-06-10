<?php 
    include_once("../include/lib.php");

    $stdate = $_POST['stdate'];
    $endate = $_POST['endate'];

    $floorArr = [ 1, 2, 3, 4, 5];
    foreach($floorArr as $floor){
        $room_r = $pdo->query("select * from room where floor='{$floor}'");
        for($i = 1; $room = $room_r->fetch(2); $i++){
            $appChk = $pdo->query("select * from application where ridx='{$room['ridx']}' and ((stdate between '{$stdate}' and '{$endate}') or (endate between '{$stdate}' and '{$endate}'))")->rowCount();

            if($i == 1){
    ?>
        <table class="table table-bordered hotel-view">
            <tr>
                <td <?php echo $appChk != 0 ? "class='bg-primary'" : ""; ?>><?php echo $room['number']; ?></td>
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
                <td colspan="10"><?php echo $floor; ?>층</td>
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
            <br>
    <?php
            }
        }
    }