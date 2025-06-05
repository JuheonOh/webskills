<?php
header("content-type:application/octet-stream");
header("content-disposition:attachment; filename={$_GET['file']}");
readfile("{$_SERVER['DOCUMENT_ROOT']}/data/download/{$_GET['file']}");