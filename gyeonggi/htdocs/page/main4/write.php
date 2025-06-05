<?php
	access(isset($_SESSION['userid']));
?>
<div id="main4_write">
	<p><button title="목록으로" onClick="link('/main4');">목록으로</button></p>
    <form id="main4_frm" action="/include/ok.php" method="post" onSubmit="return frmChk(this, 'memo', 'info', 'mark');">
    	<div>
        	<input type="hidden" name="action" value="insert">
            <input type="hidden" name="table" value="review">
        </div>
        <table class="table1 mt10">
        	<tr>
            	<td><label for="main4_memo">칭찬 한마디</label></td>
                <td><input type="text" id="main4_memo" name="memo" title="칭찬 한마디" value="" placeholder="칭찬 한마디"></td>
            </tr>
            <tr>
            	<td><label for="main4_info">이용정보</label></td>
                <td>
                	<select id="main4_info" name="ridx" title="이용정보">
                    	<option value="">예약 룸, 예약날짜, 예약시간대</option>
                        <?php
							$list_q = $pdo->query("select * from rsv where userid='{$_SESSION['userid']}'");
							while($list = $list_q->fetch()){
								$redate = strtotime($list['redate']." ".$list['en_time']);
								$date = strtotime(date("Y-m-d H:i:s"));
						?>
                        <option value="<?php echo $list['idx']; ?>"<?php if($redate >= $date) echo " disabled"; ?> <?php if($list['review'] == 1) echo "disabled"; ?>><?php echo $list['room'].", ".$list['redate'].", ".date("H:i", strtotime($list['st_time']))."~".date("H:i", strtotime($list['en_time'])); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><label for="main4_mark">평점</label></td>
                <td>
                	<ul id="mark_list">
                    	<li><input type="radio" id="star1" name="mark" title="평점" value="1"><label for="star1">★</label></li>
                        <li><input type="radio" id="star2" name="mark" title="평점" value="2"><label for="star2">★★</label></li>
                        <li><input type="radio" id="star3" name="mark" title="평점" value="3"><label for="star3">★★★</label></li>
                        <li><input type="radio" id="star4" name="mark" title="평점" value="4"><label for="star4">★★★★</label></li>
                        <li><input type="radio" id="star5" name="mark" title="평점" value="5"><label for="star5">★★★★★</label></li>
                    </ul>
                </td>
            </tr>
        </table>
        <p class="mt30"><input type="submit" title="작성완료" value="작성완료" class="btn"></p>
    </form>
</div>