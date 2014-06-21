<?php
	class table{
		public $row;
		public $col;
		public $title;
		public $mysql;
	
		public function __construct($row, $col, $title){
			$this->row = $row;
			$this->col = $col;
			$this->title = $title;
		}
		public function lookup($res){
			$row = mysql_affected_rows(SqlTool::$connection);
			$col = mysql_num_fields($res);
				
			echo "<table border = 1 align = center width = 980   ><tr>";
			echo "<caption> <h1> $this->title </h1> </caption>";
			for($i = 0; $i < $col; $i++){
			$field_name = mysql_field_name($res,$i);
			echo "<th bgcolor= 'yellow'>$field_name</th>";
			}
			echo "</tr>";
			$k = 0;
			while($row = mysql_fetch_row($res)){
			
						if($k%2==0){
						$bgc = "#9a9";
						}else{
							$bgc = "#2f2";
						}
						$k++;
							echo "<tr>";
							for($i = 0; $i < $col; $i++){
							echo "<td bgcolor = '".$bgc."' align = center>$row[$i]";
							if($i == $col-2)
							echo "<a href ='google.com'>Google</a>"."</td>";
					}
				echo "</tr>";
			}
									echo "</table>";
							//$this->mysql->close();
		}
		public function create_table($sql){
			require_once "SqlTool.php";
			$this->mysql = new SqlTool();
			$res =  $this->mysql->exec_dql($sql);
			
			$row = mysql_affected_rows(SqlTool::$connection);
			$col = mysql_num_fields($res);
			
			echo "<table border = 1 align = center width = 980   ><tr>";
			echo "<caption> <h1> $this->title </h1> </caption>";
			for($i = 0; $i < $col; $i++){
				$field_name = mysql_field_name($res,$i);
				echo "<th bgcolor= 'yellow'>$field_name</th>";
			}
			echo "</tr>";
			$k = 0;		
			while($row = mysql_fetch_row($res)){
				
				if($k%2==0){
					$bgc = "#9a9";
				}else{
					$bgc = "#2f2";
				}	
				$k++;
				echo "<tr>";
					for($i = 0; $i < $col; $i++){
						echo "<td bgcolor = '".$bgc."' align = center>$row[$i]";
					    					}
				echo "</tr>";
			}
			echo "</table>";
			//$this->mysql->close();
		}
		
		
		
		
		
		
		
		
		
		
	}
	/*
	$table_name = "needPair";
	$intern1 = "intern1";
	$CS = "CS";
	$table1 = new table(10,10,$table_name);
	$sql = "select id,name,needPair from {$table_name} where needPair='0'";
	$sql = "select * from {$intern1} where kw like '%{$CS}%'";
	$table1->create_table($sql);
	
	*/
?>