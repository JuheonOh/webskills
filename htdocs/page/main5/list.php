<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

$and = "";

if(isset($_POST['line'])){
	$number = $_POST['line'];
} else {
	die("line Error!");
}

if(isset($_POST['st_date'])){
	if($_POST['st_date'] != ""){
		$st_date = $_POST['st_date'];
		$and = " and date >= '{$st_date}'";
	}
} else {
	die("st_date Error!");
}

if(isset($_POST['en_date'])){
	if($_POST['en_date'] != ""){
		$en_date = $_POST['en_date'];
		if(isset($st_date)){
			$and = " and (date between '{$st_date}' and '{$en_date}')";
		} else {
			$and = " and date <= '{$en_date}'";
		}
	}
} else {
	die("en_date Error!");
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
} else {
	die("type Error!");
}

if(isset($_POST['search_key'])){
	$key = $_POST['search_key'];
	$k = $pdo->quote($key);
	$k = substr($k, 1);	
	$k = substr($k, 0, -1);
} else {
	die("search_key Error!");
}

switch($type){
	case '0' :
		$list_query = $pdo->query("select * from board where (subject like '%{$k}%' or name like '%{$k}%') {$and} order by date desc limit {$number}, 5");
	break;
	case '1' :
		$list_query = $pdo->query("select * from board where subject like '%{$k}%' {$and} order by date desc limit {$number}, 5");
	break;
	case '2' :
		$list_query = $pdo->query("select * from board where name like '%{$k}%' {$and} order by date desc limit {$number}, 5");
	break;
}
while($list = $list_query->fetch()){
?>
<tr>
	<td>
    	<?php
			switch($type){
				case '0' :
				case '1' :
					echo hit($list['subject'], $key);
				break;
				default : 
					echo $list['subject'];
				break;
			}
        ?>
    </td>
    <td>
    	<?php
			switch($type){
				case '0' :
				case '2' :
					echo hit($list['name'], $key);
				break;
				default : 
					echo $list['name'];
				break;
			}
		?>
    </td>
    <td><?php echo $list['date']; ?></td>
</tr>
<?php } ?>