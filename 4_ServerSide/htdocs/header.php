<?php
	include_once("include/lib.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Our Blog</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-1.12.3.min.js"></script>
	<script src="js/app.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
  	<h1><a href="/">Our Blog</a></h1>
  	<p>Our Blog는 우리의 꿈과 희망을 나누는 곳입니다.</p>
  	<p>
			<form class="form-inline" role="search" method="get">
				<input type="hidden" name="page" value="1">
				<input type="hidden" name="type" value="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search" name="val" id="search">
				</div>
				<button type="submit" class="btn btn-default searchBtn"><span class="glyphicon glyphicon-search"></span></button>
			</form>
  	</p>
		</div>