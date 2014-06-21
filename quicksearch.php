<?php
    $array = strtolower($_REQUEST['search']);
	$values = explode(" ",$array);	
	$num = 1;
	require_once "SqlTool.php";
	$mysql =new SqlTool();
	
	//print the thead
	$sql1 = "select * from intern1 where id = '111111'";
	if(num == 1){
		$sql1 = "select * from courseinfo where id = '111111'";
	}
	
	
	
	$res = $mysql->exec_dql($sql1);
	$col = mysql_num_fields($res);
	
	echo "<table border = 1 align = center width = 980   ><tr>";
	echo "<caption> <h1> Search Result </h1> </caption>";
	
	for($i = 0; $i < $col; $i++){
		$field_name = mysql_field_name($res,$i);
		echo "<th bgcolor= 'yellow' width =50>$field_name</th>";
	}
	
	
	
	foreach($values as $val){
		if($num == 1){
			$sql = "select keyword, company.companyname, salary, type, piefriend, 
					school from intern1,company    where intern1.netid = company.netid and 
					keyword like '%{$val}%' or companyname like '%{$val}%'" ;
			$sql = "select * from intern1 natural join company where keyword like '%{$val}%' or companyname like '%{$val}%'";
			//$sql = "select * from intern1  where kw like '%{$val}%' or company like '%{$val}%'";
		}else{
			$sql = "select * from courseinfo where coursename like '%{$val}%' or courseid like '%{$val}%'";
		}
		$res = $mysql->exec_dql($sql);
		$row = mysql_affected_rows(SqlTool::$connection);
		echo "<table border = 1 align = center width = 980   ><tr>";
		echo "</tr>";
		$k = 0;
		while($row = mysql_fetch_row($res)){
			if($k%2==0){
				$bgc = "purple";
			}else{
				$bgc = "#2f2";
			}
			$k++;
			echo "<tr>";
			foreach($row as $val2){
				echo "<td bgcolor = '{$bgc}' align = center width =30 >$val2";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>
	
	