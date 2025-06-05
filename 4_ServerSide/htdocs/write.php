<?php
	include_once("header.php");
		if(isset($_POST['write'])){
			$dir = "upload/";
			$filename = "";
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

				$pdo->query("insert into board set midx='{$_SESSION['idx']}', title='{$_POST['title']}', contents='{$_POST['contents']}', cat='{$_POST['cat']}', file='{$filename}', date=now();");

				alert("글쓰기가 완료되었습니다.");
				move("/");
			} else {
				alert("이미지 파일(JPEG, JPG, PNG, GIF)만 업로드 할 수 있습니다.");
				move("write.php");
			}
		}
	?>
		<div class="row">

			<!-- 블로그 글 쓰기 -->
			<div class="col-md-9">

				<!-- 블로그 글쓰기 폼 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>글쓰기</h2></h3>
					</div>
					<div class="panel-body">

						<form method="post" class="form-horizontal" enctype="multipart/form-data">
							<input type="hidden" name="write" value="">
							<div class="form-group">
								<label for="userid" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="userid" id="userid" value="<?php echo $_SESSION['userid']; ?>" readonly required>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">작성자</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" readonly required>
								</div>
							</div>							
							<div class="form-group">
								<label for="category" class="col-sm-2 control-label">카테고리</label>
								<div class="col-sm-10">
									<select class="form-control" name="cat" id="category" required>
										<option value="">카테고리</option>
										<option value="life">life</option>
										<option value="art">art</option>
										<option value="fashion">fashion</option>
										<option value="technics">technics</option>
										<option value="etcs">etcs</option>
									</select>																	
								</div>
							</div>						
							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">제목</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="title" id="title" placeholder="글 제목" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">글본문</label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="8" name="contents" id="comment" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">이미지</label>
								<div class="col-sm-10">
									<input type="file" class="form-control" id="upimg" name="file">
								</div>
							</div>													
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">글쓰기</button>
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