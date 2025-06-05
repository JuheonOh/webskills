<?php
	include_once("header.php");

	$rs = $pdo->query("select * from board where idx='{$_GET['idx']}'")->fetch(2);
	$member = $pdo->query("select * from member where idx='{$rs['midx']}'")->fetch(2);

	if($rs['midx'] != $_SESSION['idx']){
		exit();
	}

	// 글 수정 프로그램
	if(isset($_POST['modify'])){
		$dir = "upload/";
		$filename = $rs['file'];
		$flag = true;

		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$type = $_FILES['file']['type'];
			if($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png" || $type == "image/gif"){
				$filename = $_FILES['file']['name'];
				$filename = date("Ymd-His")."_".$filename;
				$dst = $dir.$filename;

				move_uploaded_file($_FILES['file']['tmp_name'], $dst);
			} else {
				$flag = false;
			}
		}

		if($flag){
			$_POST['title'] = addslashes($_POST['title']);
			$_POST['contents'] = addslashes($_POST['contents']);

			$pdo->query("update board set title='{$_POST['title']}', contents='{$_POST['contents']}', cat='{$_POST['cat']}', file='{$filename}' where idx='{$_POST['idx']}'");

			alert("글 수정이 완료되었습니다.");
			move("/");
		} else {
			alert("이미지 파일(JPEG, JPG, PNG, GIF)만 업로드 할 수 있습니다.");
			move("modify.php?idx={$_GET['idx']}");
		}
	}
?>
		<div class="row">

			<!-- 블로그 글 쓰기 -->
			<div class="col-md-9">

				<!-- 블로그 글쓰기 폼 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>글수정</h2></h3>
					</div>
					<div class="panel-body">

						<form class="form-horizontal" method="post" enctype="multipart/form-data">
							<input type="hidden" name="modify" value="">
							<input type="hidden" name="idx" value="<?php echo $_GET['idx']; ?>">
							<div class="form-group">
								<label for="userid" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="userid" id="userid" placeholder="<?php echo $member['userid']; ?>" readonly required>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">작성자</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="username" id="username" value="<?php echo $member['username']; ?>" placeholder="작성자" readonly required>
								</div>
							</div>							
							<div class="form-group">
								<label for="category" class="col-sm-2 control-label">카테고리</label>
								<div class="col-sm-10">
									<select class="form-control" name="cat" id="category" required>
										<option value="">카테고리</option>
										<option value="life" <?php if($rs['cat'] == "life") echo "selected"; ?>>life</option>
										<option value="art" <?php if($rs['cat'] == "art") echo "selected"; ?>>art</option>
										<option value="fashion" <?php if($rs['cat'] == "fashion") echo "selected"; ?>>fashion</option>
										<option value="technics" <?php if($rs['cat'] == "technics") echo "selected"; ?>>technics</option>
										<option value="etcs" <?php if($rs['cat'] == "etcs") echo "selected"; ?>>etcs</option>
									</select>																	
								</div>
							</div>						
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">제목</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" placeholder="글 제목" value="<?php echo $rs['title']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">글본문</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="8" name="contents" id="comment" required><?php echo $rs['contents']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">이미지</label>
								<div class="col-sm-10">
									<input type="file" name="file" class="form-control" id="upimg">
									<br>
									<?php if($rs['file'] != ""){ ?>
									현재 업로드된 파일 : <kbd><?php echo $rs['file']; ?></kbd>
									<?php } ?>
								</div>
							</div>													
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">글수정</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				<!-- //블로그 글쓰기 폼 -->

			</div>
			<!-- //블로그 글 쓰기 -->

			
			<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->
			<?php include_once("right.php"); ?>

		</div>
		<div class="footer">
			Copyright &copy; <strong>Our Blog</strong> All rights reserved.
		</div>
	</div>
</body>
</html>