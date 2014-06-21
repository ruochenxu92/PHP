<?php
	require_once "table.php";
	$table1 = new table(10,10,'TOP Topic');
	$limit = 10;//???limit number to show
	$sql= "select content, count(id) number from record group by content order by number desc limit {$limit}";
	$table1->create_table($sql);
?>



