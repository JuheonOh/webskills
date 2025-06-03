<?php
header("content-type:image/gif");

$string = substr(sha1(uniqid(md5(true, rand()))), 0, 5);

session_start();

$_SESSION['captcha_code'] = $string;

$img = imagecreatetruecolor(100, 40);
imagefill($img, 0, 0, 0xFFFF00);
imagestring($img, 10, 30, 15, $string, 0x000000);
imageline($img, 0, 22, 120, 22, 0xFF0000);
imagegif($img);
imagedestroy($img);