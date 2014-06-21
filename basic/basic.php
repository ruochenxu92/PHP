<?php
	require_once 'SqlTool.php';
	
	$mysql = new SqlTool();
	
	//$sql = "insert into pcourse(courseid,professor,netid) values('cs225','Cinda','xxu46')";
	//$sql = "update pcourse set courseid = 'cs438' where courseid = 'cs225'";
	//$sql = "delete from pcourse where courseid = 'cs498' or courseid =''";
	$mysql->exec_dml($sql);
	$sql1= "select * from pcourse ";
	require_once "table.php";
	$table1 = new table(10,10 ,'Personal Course');
	
	$table1->create_table($sql1);
	
	/*
	switch($operator){
		case '0':
			$sql = "update ??? set ??? where id= ";
			break;
		case '1':
			$sql = 'delete from ??? where id = ';
		case '2':
			$sql = 'insert into ';
			
	}
	*/
	
?>