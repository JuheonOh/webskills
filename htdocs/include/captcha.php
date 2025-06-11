<?php
header("content-type:image/png;");
session_start();

$str = substr(sha1(uniqid(md5(rand(), true))), 0, 5);

$_SESSION['captcha'] = $str;

$img = imagecreatetruecolor(100, 40);
imagefill($img, 0, 0, 0xffcc00);
imagestring($img, 20, 28, 13, $str, 0x000000);
imageline($img, 0, 20, 100, 20, 0xff0000);
imagepng($img);
imagedestroy($img);