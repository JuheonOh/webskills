<?php
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	$view = $pdo->query("select * from educate order by code");
	while($list = $view->fetch(2)){
		$sum = $pdo->query("select * from educate_list where code='{$list['code']}'")->rowCount();
?>
<li>
	<a href="javascript:educate_modify('<?php echo $list['idx']; ?>')" title="<?php echo $list['title']; ?>">
    	<div class="view_top">
            <img src="/data/main2/<?php echo $list['image']; ?>" title="<?php echo $list['title']; ?>" alt="<?php echo $list['title']; ?>">
            <div class="view_title"><?php echo $list['title']; ?></div>
            <div class="details">Modify</div>
        </div>
        <div class="view_content">
        	<ul>
            	<li>강좌코드 : <?php echo $list['code']; ?></li>
                <li>개강일 : <?php echo $list['st_date']; ?></li>
                <li>수강신청자 수 : <b><?php echo $sum; ?></b> 명</li>
            </ul>
        </div>
    </a>
</li>
<?php } ?>