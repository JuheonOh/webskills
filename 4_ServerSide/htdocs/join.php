<?php
	include_once("header.php");

	if(isset($_POST['join'])){
		$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}'")->rowCount();

		if($idchk){
			alert("이미 존재하는 이메일입니다.");
			move("join.php");
		} else {
			if($_POST['pw'] != $_POST['pw2']){
				alert("비밀번호가 서로 다릅니다. 다시 확인해주세요.");
				move("join.php");
			} else {
				$pdo->query("insert into member set userid='{$_POST['userid']}', pw='{$_POST['pw']}', username='{$_POST['username']}'");

				alert("회원가입이 완료되었습니다.");
				move("/");
			}
		}
	}
?>
		<div class="row">

			<!-- 블로그 글 쓰기 -->
			<div class="col-md-9">

				<!-- 블로그 글쓰기 폼 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2>회원가입</h2></h3>
					</div>
					<div class="panel-body">

						<form class="form-horizontal" method="post">
							<input type="hidden" name="join" value="">
							<div class="form-group">
								<label for="userid" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" name="userid" id="userid" placeholder="email@domain.com" required>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">이름</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="username" id="username" placeholder="이름" required>
								</div>
							</div>												
							<div class="form-group">
								<label for="userpass" class="col-sm-2 control-label">비밀번호</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="pw" id="userpass" placeholder="비밀번호" required>
								</div>
							</div>
							<div class="form-group">
								<label for="userpass2" class="col-sm-2 control-label">비밀번호확인</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="pw2" id="userpass2" placeholder="비밀번호 확인 " required>
								</div>
							</div>																				
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">회원가입</button>
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