<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$file = file_get_contents("{$_SERVER['DOCUMENT_ROOT']}/data/txt/sido.txt");
$files = iconv("EUC-KR", 'UTF-8', $file);
$zone = explode("\r\n", $files);
echo json_encode($zone);