<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$comment_r = $pdo->query("select * from notice where idx='{$_POST['idx']}'");
$pdo->query("update notice set count=count+1 where idx='{$_POST['idx']}'");

while($list = $comment_r->fetch(2)){
	$list['memo'] = str_replace("\r\n", "<br>", $list['memo']);
?>
<tr class="view_tr">
	<td colspan="5">
    	<div id="view">
        	<input type="hidden" name="nidx" value="<?php echo $_POST['idx']; ?>">
        	<div class="view">
            	<div class="view_top">
                    <h3><?php echo $list['title']; ?></h3>
                    <ul>
                        <li><?php echo $list['username']; ?></li>
                        <li><?php echo $list['date']; ?></li>
                    </ul>
                </div>
                <div class="textarea">
                	<?php echo $list['memo']; ?>
                </div>
            </div>
            <div id="comment">
                <!-- Ajax -->
            </div>
            <div id="comment_write">
                <form method="post" onSubmit="return commentSubmit(this);">
                    <input type="hidden" name="nidx" value="<?php echo $_POST['idx']; ?>">
                    <?php if(isset($_SESSION['userid'])){ ?>
                    <div class="comment_write"><textarea name="comment" id="comment" title="댓글" value=""
                    placeholder="인터넷은 우리가 함께 만들어가는 소중한 공간입니다.

댓글 작성 시 타인에 대한 배려와 책임을 담아주세요."></textarea></div>
                    <div class="comment_button"><button type="submit" title="작성">등록</button></div>
                    <?php } else { ?>
                    <div class="comment_write"><textarea name="comment" id="comment" title="댓글" value="" placeholder="로그인 후 이용할 수 있습니다." disabled></textarea></div>
                    <div class="comment_button"><button type="submit" title="작성" disabled>등록</button></div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </td>
</tr>
<script>
function commentSubmit(frm){
    $.ajax({
        type:"POST",
        url:"/page/main4/sub1/comment_ok.php",
        data:$(frm).serialize(),
        success : function(data){
            
        }
    });
}

$(function(){
    var nidx = $("input[name=nidx]").val();

    $.ajax({
        type:"POST",
        url:"/page/main4/sub1/comment.php",
        data:{nidx:nidx},
        success:function(data){
            $("#comment").html(data);

            if($(".comment > ul").length == 0){
                $(".comment").css({ "padding" : "0" });
            }
        }
    });
});
</script>
<?php } ?>