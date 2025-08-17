<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$key = $_POST['key'];
$type = $_POST['type'];
$st_len = $_POST['len'];
$en_len = $_POST['len'] + 5;

$where = "";
$arr = explode("+", $key);
foreach($arr as $k=>$v){
	if($k > 0) $where .= " {$type}";
	$where .= "(instr(rsv.redate, '{$v}') or cast(rsv.room as char) like '%{$v}%' or cast(review.memo as char) like '%{$v}%')";
}
function str($str){
	$show = substr($str, 0, 2);
	$hide = substr($str, 2);
	$len = strlen($hide);
	$star = "";
	for($i = 1; $i <= $len; $i++){
		$star .= "*";
	}
	return $show.$star;
}
?>
<?php
$list_q = $pdo->query("select review.*, rsv.userid, rsv.room, rsv.redate from review inner join rsv where review.ridx = rsv.idx and {$where} limit {$st_len}, {$en_len}");
while($list = $list_q->fetch()){
?>
<tr>
	<td>
    	<img src="/image/
			<?php
				if($list['room'] == "모던한 식기가 가지런한 옥내 테이블"){
					echo "1111151_69665882.jpg";
				} else if($list['room'] == "모여앉아 화목한 다목적 테이블"){
					echo "1306681_69145046.jpg";
				} else if($list['room'] == "맛있는 고기와 함께하는 옥외 테이블"){
					echo "1351819_10121866.jpg";
				} else if($list['room'] == "단체 회원이 좋아하는 지하실 테이블"){
					echo "1381101_52402725.jpg";
				}
			?>"
            alt="<?php if($list['room'] == "모던한 식기가 가지런한 옥내 테이블"){
					echo "모던한 식기가 가지런한 옥내 테이블";
				} else if($list['room'] == "모여앉아 화목한 다목적 테이블"){
					echo "모여앉아 화목한 다목적 테이블";
				} else if($list['room'] == "맛있는 고기와 함께하는 옥외 테이블"){
					echo "맛있는 고기와 함께하는 옥외 테이블";
				} else if($list['room'] == "단체 회원이 좋아하는 지하실 테이블"){
					echo "단체 회원이 좋아하는 지하실 테이블";
				} ?>"
                
            title="<?php if($list['room'] == "모던한 식기가 가지런한 옥내 테이블"){
					echo "모던한 식기가 가지런한 옥내 테이블";
				} else if($list['room'] == "모여앉아 화목한 다목적 테이블"){
					echo "모여앉아 화목한 다목적 테이블";
				} else if($list['room'] == "맛있는 고기와 함께하는 옥외 테이블"){
					echo "맛있는 고기와 함께하는 옥외 테이블";
				} else if($list['room'] == "단체 회원이 좋아하는 지하실 테이블"){
					echo "단체 회원이 좋아하는 지하실 테이블";
				} ?>">
    </td>
	<td>
    	<ul class="list_style">
        	<li>예약자 : <?php echo str($list['userid']); ?></span></li>
            <li>평점 : <?php for($i = 1; $i <= $list['mark']; $i++){ echo "★"; } ?></li>
            <li>예약날짜 : <?php echo hit($list['redate'], $arr); ?></li>
            <li>예약 룸 : <?php echo hit($list['room'], $arr); ?></li>
            <li>칭찬 한마디 : <?php echo hit($list['memo'], $arr); ?></li>
        </ul>
    </td>
		<?php if($_SESSION['lv'] == "관리자"){ ?>
    <td>
    	<button title="삭제" onClick="del(this, <?php echo $list['idx']; ?>)">삭제</button>
    </td>
		<?php } ?>
</tr>
<?php } ?>