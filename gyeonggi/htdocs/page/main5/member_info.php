<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$idx = $_GET['idx'];
$rsv = $pdo->query("select rsv.*, member.username from rsv inner join member where rsv.userid = member.userid and rsv.idx='{$idx}'")->fetch();
?>
<div id="member_info">
<table class="table1">
	<colgroup>
    	<col width="20%">
    </colgroup>
    <tbody>
    	<tr>
        	<td>아이디</td>
            <td><?php echo $rsv['userid']; ?></td>
        </tr>
        <tr>
        	<td>이름</td>
            <td><?php echo $rsv['username'] ?></td>
        </tr>
        <tr>
        	<td>예약 룸</td>
            <td><?php echo $rsv['room']; ?></td>
        </tr>
        <tr>
        	<td>예약일자</td>
            <td><?php echo $rsv['redate']; ?></td>
        </tr>
        <tr>
        	<td>예약시간</td>
            <td><?php echo date("H:i", strtotime($rsv['st_time']))." ~ ".date("H:i", strtotime($rsv['en_time'])); ?></td>
        </tr>
    </tbody>
</table>
<table class="table2">
	<thead>
    	<tr>
        	<th class="tal">메뉴주문내역</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
        	<td>
            	<ul>
                	<?php
						$list_q = $pdo->query("select * from food where ridx='{$idx}'");
						$cost = 0;
						while($list = $list_q->fetch()){
							$cost += $list['cost'] * $list['number'];
					?>
                    <li>
                    	<span class="fl"><?php echo $list['name']." ＊ ".$list['number']; ?></span>
                        <span class="fr"><?php echo number_format($list['cost'])." ＊ ".$list['number']."=".number_format(($list['cost']*$list['number'])); ?></span>
                    </li>
                    <?php } ?>
                    <li><span class="fr">음식주문내역 계 : <?php echo number_format($cost); ?></span></li>
                </ul>
            </td>
        </tr>
        <tr>
        	<td>
            	<?php
					echo number_format($rsv['room_cost'])."(룸 예약비) + ".number_format($cost)."(메뉴주문) = ".number_format((($rsv['room_cost']+$cost) * 1.1))."원(VAT 10% 포함)";
				?>
            </td>
        </tr>
    </tbody>
</table>
<div class="mt50 tar">
	<button title="프린트" onClick="print()">프린트</button>
</div>
</div>