<?php
require_once 'pcourse.php';
require_once "SqlTool.php";
$mysql = new SqlTool();
$sql = "select * from subcourse";
$res = $mysql->exec_dql($sql);

$row = mysql_fetch_row($res);



$i = 0;
while($row = mysql_fetch_row($res)){
	$course[$i] = $row;
	$i++;
}



$pcourse = new personcourse($course, 'xxu46');
$pcourse->gettotalgrade()."<br>";
echo $pcourse->GPA();
echo "<br>";
echo $pcourse->LPA();
echo "<br>";
echo $pcourse->UPA();
// echo $pcourse->

$pcourse->LPA();