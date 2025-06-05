<?php
	include_once("lib.php");

	session_destroy();

	alert("로그아웃이 완료되었습니다.");
	move("/");