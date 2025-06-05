<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
$_POST['content'] = str_replace("<br>", "&nbsp;", $_POST['content']);
q("insert", "comment", "userid='{$_SESSION['userid']}', username='{$_SESSION['username']}', content='{$_POST['content']}', date=now();");
alert("작성이 완료되었습니다.");
move("/main4/sub1");