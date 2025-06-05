<?php
	include_once("header.php");
?>
		<div class="row">
			<!-- 블로그 글 목록 -->
			<div class="col-md-9">
				<?php
					$page = isset($_GET['page']) ? $_GET['page'] : "1";
					$type = isset($_GET['type']) ? $_GET['type'] : NULL;
					$val = isset($_GET['val']) ? addslashes($_GET['val']) : NULL;

					// 한 페이지에 보여지는 글의 개수
					$line = 5;

					// 글 보여지는 시작 개수
					$start = ($page - 1) * $line;

					$where = "";
					if($type){
						$where = "and {$type}='{$val}'";
					}

					// 검색할 때
					if($type == "search"){
						$where = "and title like '%{$val}%' or contents like '%{$val}%'";
					}

					$list_r = $pdo->query("select * from board where 1=1 {$where} order by date desc limit {$start}, {$line}");
					while($rs = $list_r->fetch(2)){
						$member = $pdo->query("select * from member where idx='{$rs['midx']}'")->fetch(2);
				?>
				<!-- 블로그 글 -->
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><h2><?php echo htmlspecialchars($rs['title']); ?></h2></h3>
					</div>
					<div class="panel-body">
						<p>
							<?php if($rs['file'] != ""){ ?>
							<img class="img-responsive list-img" src="upload/<?php echo $rs['file']; ?>" alt="<?php echo $rs['file']; ?>" title="<?php echo $rs['file']; ?>" align="left" style="max-width:200px; max-height:200px;">
							<?php } ?>
							<?php echo htmlspecialchars(mb_substr($rs['contents'], 0, 299)); ?>
						</p>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><strong>[<?php echo $rs['cat']; ?>]</strong></span>&nbsp;&nbsp;<span class="writer"><?php echo $member['username']; ?></span>&nbsp;&nbsp;<span class="date"><?php echo $rs['date']; ?></span>&nbsp;&nbsp;<span class="commentcount">댓글수 <span class="badge"><?php echo $pdo->query("select * from comment where bidx='{$rs['idx']}'")->rowCount(); ?></span></span></div>
							<div class="col-md-6 btns">
								<?php if($rs['midx'] == $_SESSION['idx']){ ?>
								<a href="modify.php?idx=<?php echo $rs['idx']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>수정</a>
								<a href="#" class="btn btn-danger deleteBtn" data-idx="<?php echo $rs['idx']; ?>"><span class="glyphicon glyphicon-trash"></span> 삭제</a>
								<?php } ?>
								<a href="view.php?idx=<?php echo $rs['idx']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-zoom-in"></span> 더보기</a>
							</div>
						</div>						
					</div>
				</div>				
				<!-- //블로그 글 -->
			<?php } ?>
				<!-- 페이지네이션(pagination) -->
				<nav>
					<ul class="pagination pagination-lg">
						<?php
							$total = $pdo->query("select * from board where 1=1 {$where}")->rowCount();

							// 버튼 페이지
							$btnPage = ceil($page / $line);
							// 버튼 전체 페이지
							$totalPage = ceil($total / $line);

							// 처음 버튼
							$startPage = ($btnPage - 1) * $line + 1;
							// 마지막 버튼
							$lastPage = $btnPage * $line;

							// 이전
							$prev = $page - 1;
							// 다음
							$next = $page + 1;
						?>

						<li <?php if($prev == 0) echo "class='disabled'"; ?>>
							<a <?php if($prev == 0){ echo 'href="javascript:void(0);"'; } else { echo "href='/?page={$prev}&type={$type}&val={$val}'"; } ?> aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<?php
							for($i = $startPage; $i <= $lastPage; $i++){
								if($i <= $totalPage){
						?>
						<li <?php if($i == $page) echo "class='active'"; ?>><a href="<?php echo "/?page={$i}&type={$type}&val={$val}"; ?>"><?php echo $i; ?></a></li>
						<?php } } ?>
						<li <?php if($next > $totalPage) echo "class='disabled'"; ?>>
							<a <?php if($next > $totalPage){ echo "href='javascript:void(0);'"; } else { echo "href='/?page={$next}&type={$type}&val={$val}'"; } ?> aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>				

			</div>
			<!-- //블로그 글 목록 -->

			<?php include_once("right.php"); ?>

		</div>
		<div class="footer">
			Copyright &copy; <strong>Our Blog</strong> All rights reserved.
		</div>
	</div>
</body>
</html>