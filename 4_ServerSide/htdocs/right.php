<?php
	if(isset($_POST['login'])){
		$idchk = $pdo->query("select * from member where userid='{$_POST['userid']}' and pw='{$_POST['pw']}'")->fetch(2);
		if($idchk){
			$_SESSION['idx'] = $idchk['idx'];
			$_SESSION['userid'] = $idchk['userid'];
			$_SESSION['username'] = $idchk['username'];

			alert("로그인이 완료되었습니다.");
			move("/");
		} else {
			alert("아이디와 비밀번호를 다시 확인해주세요.");
		}
	}
?>

<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->
<div class="col-md-3">
	<?php if(!$_SESSION['idx']){ ?>
	<div class="loginarea">
		<div class="panel panel-default">
		<div class="panel-body">
			<form class="form-horizontal" method="post">
				<input type="hidden" name="login" value="">
			  <div class="form-group">
			    <div class="col-sm-12">
			      <input type="email" class="form-control" name="userid" id="userid" placeholder="email@domain.com">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-12">
			      <input type="password" class="form-control" name="pw" id="userpass" placeholder="비밀번호">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-12">
			      <button type="submit" class="btn btn-default">로그인</button>
			      <button type="button" class="btn btn-info" onclick="link('join.php')">회원가입</button>
			    </div>
			  </div>
			</form>
		</div>
		</div>					
	</div>
	<?php } else { ?>
	<div class="loginarea">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					회원의 이름 : <kbd><?php echo $_SESSION['username']; ?></kbd>
				</div>
				<div class="form-group">
					회원의 email : <kbd><?php echo $_SESSION['userid']; ?></kbd>
				</div>
				<div class="form-group">
					자신이 등록한 글의 개수 : <kbd><?php echo $pdo->query("select * from board where midx='{$_SESSION['idx']}'")->rowCount(); ?>개</kbd>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary pull-right" onclick="link('include/logout.php')">로그아웃</button>
				</div>
			</div>
		</div>
	</div>
	<div>
		<a href="write.php" class="writebtn btn btn-primary btn-lg col-sm-12"><span class="glyphicon glyphicon-pencil"></span> 글쓰기</a>
	</div>
	<?php } ?>
	<div class="categories">
		<h3>Categories</h3>
		<ul>
			<li><a href="/" title="전체보기">전체보기 <span class="badge"><?php echo $pdo->query("select * from board")->rowCount(); ?></span></a></li>
			<?php
				$arr = array("life", "art", "fashion", "technics", "etcs");
				foreach($arr as $cat){
			?>
			<li><a href="/?page=1&type=cat&val=<?php echo $cat; ?>"><?php echo $cat; ?> <span class="badge"><?php echo $pdo->query("select * from board where cat='{$cat}'")->rowCount(); ?></span></a></li>
			<?php } ?>
		</ul>
	</div>

	<div class="authors">
		<h3>Authors</h3>
		<ul>
			<?php
				$member = $pdo->query("select * from member");
				while($rs = $member->fetch(2)){
					$count = $pdo->query("select * from board where midx='{$rs['idx']}'")->rowCount();
					if($count > 0){
			?>
			<li><a href="/?page=1&type=midx&val=<?php echo $rs['idx']; ?>"><?php echo $rs['username']; ?></a> <span class="badge"><?php echo $count; ?></span></li>
			<?php } } ?>
		</ul>					
	</div>

</div>
<!-- 오른쪽 칼럼(로그인, 카테고리, 글쓴이 목록) -->