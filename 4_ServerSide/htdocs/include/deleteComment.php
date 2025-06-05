<?php
	include_once("lib.php");

	$pdo->query("delete from comment where idx='{$_GET['idx']}'");

	alert("댓글 삭제가 완료되었습니다.");
	move("../view.php?idx={$_GET['bidx']}");