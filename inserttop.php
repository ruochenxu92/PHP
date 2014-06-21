<?php
	$array = strtolower($_REQUEST['search']);
	//$array = ("facebook stanford Boston Washington");
	//$array = strtolower($array);
	$values = explode(" ",$array);
	
	require_once "SqlTool.php";
	$mysql =new SqlTool();
	
	
	foreach($values as $val){
		$val = ucfirst($val);
		//echo "<br>".$val;
		$sql = "insert into record(content) values('".$val."')";
		
		$mysql->exec_dml($sql);
	}
	
	//print a link
	$google = "www.google.com";
	echo "<br><a href = '".$google."'>Best Match</a>";
?>	
	
	






