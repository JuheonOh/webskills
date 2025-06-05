<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	$txt = "";
	$csv = iconv("utf-8", "euc-kr", "강좌코드, 강좌제목, 강사명, 개강일, 종강일, 수강신청자 수\r\n");
	$xml = "<?xml version='1.0' encoding='utf-8'?>\r\n<educate>\r\n";
	
	$query = $pdo->query("select * from educate order by code");
	
	while($list = $query->fetch(2)){
		$number = $pdo->query("select * from educate_list where code='{$list['code']}'")->rowCount();
		
		$txt .= "━━━━━━━━━━━━━━━━━━━\r\n";
		$txt .= "강좌코드 : {$list['code']}\r\n";
		$txt .= "강좌제목 : {$list['title']}\r\n";
		$txt .= "강사명 : {$list['teacher']}\r\n";
		$txt .= "개강일 : {$list['st_date']}\r\n";
		$txt .= "종강일 : {$list['en_date']}\r\n";
		$txt .= "수강신청자 수 : {$number}\r\n";

		
		$csv .= iconv("utf-8", "euc-kr", "{$list['code']}, {$list['title']}, {$list['teacher']}, {$list['st_date']}, {$list['en_date']}, {$number}\r\n");
		
		$xml .= "\t<list>\r\n";
			$xml .= "\t\t<code>{$list['code']}</code>\r\n";
			$xml .= "\t\t<title>{$list['title']}</title>\r\n";
			$xml .= "\t\t<teacher>{$list['teacher']}</teacher>\r\n";
			$xml .= "\t\t<st_date>{$list['st_date']}</st_date>\r\n";
			$xml .= "\t\t<en_date>{$list['en_date']}</en_date>\r\n";
			$xml .= "\t\t<number>{$number}</number>\r\n";
		$xml .= "\t</list>\r\n";
	}
	$txt .= "━━━━━━━━━━━━━━━━━━━\r\n";
	$xml .= "</educate>";
	
	$fp1 = fopen("{$_SERVER['DOCUMENT_ROOT']}/data/download/txt.txt", "wb");
	fwrite($fp1, $txt);
	fclose($fp1);
	
	$fp2 = fopen("{$_SERVER['DOCUMENT_ROOT']}/data/download/csv.csv", "wb");
	fwrite($fp2, $csv);
	fclose($fp2);
	
	$fp3 = fopen("{$_SERVER['DOCUMENT_ROOT']}/data/download/xml.xml", "wb");
	fwrite($fp3, $xml);
	fclose($fp3);
?>