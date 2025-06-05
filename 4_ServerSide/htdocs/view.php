<?php
	include_once("header.php");

	$rs = $pdo->query("select * from board where idx='{$_GET['idx']}'")->fetch(2);
	$member = $pdo->query("select * from member where idx='{$rs['midx']}'")->fetch(2);

	// 댓글 프로그램
	if(isset($_POST['commentOk'])){
		$_POST['comment'] = addslashes($_POST['comment']);

		$pdo->query("insert into comment set midx='{$_SESSION['idx']}', bidx='{$_POST['bidx']}', comment='{$_POST['comment']}', date=now()");

		alert("댓글 작성이 완료되었습니다.");
		move("view.php?idx={$_POST['bidx']}");
	}
?>
		<div class="row">
			<!-- 블로그 글 본문 보기 -->
			<div class="col-md-9">
				<!-- 블로그 글 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2><?php echo htmlspecialchars($rs['title']); ?></h2></h3>
					</div>
					<div class="panel-body">
						<p>
							<?php if($rs['file'] != ""){ ?>
							<img class="img-responsive" src="upload/<?php echo $rs['file']; ?>" alt="image sample" style="max-width:100%;">
							<?php } ?>
							<?php echo htmlspecialchars($rs['contents']); ?>														
						</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><span class="category"><strong>[<?php echo $rs['cat']; ?>]</strong></span>&nbsp;&nbsp;<span class="writer"><?php echo $member['username']; ?></span>&nbsp;&nbsp;<span class="date"><?php echo $rs['date']; ?></span>&nbsp;&nbsp;<span class="commentcount">댓글수 <span class="badge"><?php echo $pdo->query("select * from comment where bidx='{$rs['idx']}'")->rowCount(); ?></span></span></div>
							<div class="col-md-6 btns">
								<?php if($rs['midx'] == $_SESSION['idx']){ ?>
								<a href="modify.php?idx=<?php echo $rs['idx']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>수정</a>
								<a href="#" class="btn btn-danger deleteBtn" data-idx="<?php echo $rs['idx']; ?>"><span class="glyphicon glyphicon-trash"></span> 삭제</a>
								<?php } ?>
								<a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-th-list"></span> 목록으로</a>
							</div>
						</div>						
					</div>
				</div>
				<!-- //블로그 글 -->

				<!-- 댓글 폼 -->
				<div class="row">
					<form class="form-horizontal" method="post">
						<input type="hidden" name="commentOk" value="">
						<input type="hidden" name="bidx" value="<?php echo $_GET['idx']; ?>">
						<div class="form-group">
							<label for="userid" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="userid" id="userid" value="<?php echo $_SESSION['userid']; ?>" placeholder="hongkildong@hongkildong.com" readonly <?php if(!$_SESSION['idx']) echo "disabled"; ?>>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="col-sm-2 control-label">작성자</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" placeholder="홍길동" readonly <?php if(!$_SESSION['idx']) echo "disabled"; ?>>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword3" class="col-sm-2 control-label">댓글내용</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="3" name="comment" id="comment" required <?php if(!$_SESSION['idx']) echo 'placeholder="로그인 후 이용할 수 있습니다." disabled' ?>></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default" <?php if(!$_SESSION['idx']) echo "disabled"; ?>>댓글저장</button>
							</div>
						</div>
					</form>
				</div>
				<!-- //댓글 폼 -->

				<!-- 댓글 리스트 -->
				<div class="commentlist">
					<?php
						$sql = $pdo->query("select * from comment where bidx='{$_GET['idx']}' order by date desc");
						while($rs = $sql->fetch(2)){
							$member = $pdo->query("select * from member where idx='{$rs['midx']}'")->fetch(2);
					?>
						<h3><?php echo $member['username']; ?> <?php echo $member['userid']; ?> <?php echo $rs['date']; ?></h3>
					<div class="comment">
						<p><?php echo htmlspecialchars($rs['comment']); ?>
						<?php if($rs['midx'] == $_SESSION['idx']){ ?>
						<a href="include/deleteComment.php?idx=<?php echo $rs['idx']; ?>&bidx=<?php echo $_GET['idx']; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></p>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<!-- //댓글 리스트 -->

			</div>
			<!-- //블로그 글 본문 보기 -->

			
			<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->
			<?php
				include_once("right.php");
			?>

		</div>
		<div class="footer">
			Copyright &copy; <strong>Our Blog</strong> All rights reserved.
		</div>
	</div>
</body>
</html>