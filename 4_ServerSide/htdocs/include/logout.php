<?php 
	include_once("lib.php");

	setcookie("login", null, -1, "/");
	session_destroy();

	alert("로그아웃이 완료되었습니다.");
	move("/");