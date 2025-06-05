<?php access($_SESSION['lv'] == "관리자", "접근할 수 없는 페이지입니다.");?>
<?php include_once("{$_SERVER['DOCUMENT_ROOT']}/include/slide_ok.php"); ?>
<p class="tt">■ 추가</p>
<div class="slide_insert mb30">
	<form action="/admin/slide" method="post" onSubmit="return frmChk(this, 'file');" enctype="multipart/form-data">
    	<div>
        	<input type="hidden" name="action" value="insert">
        </div>
        <ul>
        	<li><label for="file">업로드 이미지</label></li>
            <li><input type="file" id="file" name="file" title="업로드 이미지"></li>
            <li class="dotum ml5 fd8 black"><span class="red">*</span> png, jpg, gif 만 업로드 가능</li>
        </ul>
        <div class="tac"><input type="submit" title="추가" value="추가" class="btn"></div>
    </form>
</div>
<p class="tt">■ 수정</p>
<div class="slide_update">
<?php
	$slide = $pdo->query("select * from slide order by sidx asc");
	if($slide->rowCount()){
?>
<form action="/admin/slide" method="post">
	<div>
   	  <input type="hidden" name="action" value="update">
    </div>
    <ul>
    	<li>업로드 이미지</li>
        <li>선택</li>
    </ul>
    <?php while($list = $slide->fetch()){ ?>
    <ul>
    	<li><label for="image<?php echo $list['sidx']; ?>"><img src="/data/slide/<?php echo $list['file']; ?>" alt="<?php echo $list['file']; ?>" title="<?php echo $list['file']; ?>"></label></li>
        <li><input type="checkbox" id="image<?php echo $list['sidx']; ?>" name="type[]" title="선택" value="<?php echo $list['sidx']; ?>"<?php if($list['type'] == 1) echo "checked"; ?>></li>
    </ul>
    <?php } ?>
    <div class="tac"><input type="submit" title="수정" value="수정" class="btn"></div>
</form>
</div>
<?php } else { ?>
<p>현재 업로드된 이미지가 없습니다.</p>
<?php } ?>