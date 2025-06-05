<?php
	include_once("lib.php");

	$pdo->query("delete from board where idx='{$_GET['idx']}'");
	$pdo->query("delete from comment where bidx='{$_GET['idx']}'");

	alert("삭제가 완료되었습니다.");
	move("/");