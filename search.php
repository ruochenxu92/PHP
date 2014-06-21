<?php
class search{
	public static $total= 0;//total time of search
	public $content;
	public function __construct($content){
		$this->content = $content;
	}
	public function showsearch($limit){
		require_once "table.php";
		$table1 = new table(10,10,'TOP Topic');
		$sql= "select content, count(id) number from record group by content order by number desc limit {$limit}";
		$table1->create_table($sql);
	}//statistic show

	
	
	public function insertsearch(){
			echo "your search has been recorded!";
		    $arr = explode(' ',$this->content);
		   // var_dump($arr);
		    foreach($arr as $val){
		    	if($val  != ""){  //test the isset function
					$sql = "insert into record(content) values('{$val}')";
					require_once "SqlTool.php";
					$mysql = new SqlTool();
					$mysql->exec_dml($sql);
					self::$total++;
					echo "total record is: ".self::$total."<br>";
		    	}
		    }
	}

	public function conditionsearch() {
// 			$keyword = 'CS';
// 			$location = 'Seattle';
// 			$company = 'microsoft';
// 			$school = 'UIUC';
// 			//piefriend = 1
// 			$piefriend ='1';//boolean
// 			$fulltime = '1';//boolean
// 			$salary = 5000;
		
		$keyword  = strtolower($_REQUEST['keyword']);
		$location = strtolower($_REQUEST['location']);
		$company  = strtolower($_REQUEST['company']);
		$school   = strtolower($_REQUEST['school']);
		
		$piefriend = $_REQUEST['piefriend'];//boolean
		$fulltime  = $_REQUEST['full-time'];//boolean 1 0
		// 	$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}')
		// 	and	company = '{$company}' and school = '{$school}' and piefriend = '1' and type ='full-time'";
		
		
		if(isset($fulltime)){
			if(isset($piefriend)){
				//echo "11";
				$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
				and	companyname = '{$company}' and school = '{$school}' and piefriend = '1' and type ='full-time'";
			}else{
				//echo "10";
				$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
			 and companyname = '{$company}' and school = '{$school}' and type = 'full-time'";
			}
		}else{
			if(isset($piefriend)){
				//echo "01";
				$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
				and companyname = '{$company}' and  school = '{$school}' and piefriend = '1' and type = 'part-time'";
			}else{
				//echo "00";
				$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
				and companyname = '{$company}' and school = '{$school}' and type = 'part-time'";
			}}
		
			require_once "table.php";
			$table = new table(10,10,'search for intern');
			$table->create_table($sql);
	}
	
	
	
	
	
	
	
	
	public function quicksearch(){
		
		
		$array = strtolower($this->content);
		//$array = ("microsoft stanford CS Boston Washington");
		//$array = strtolower($array);
		$values = explode(" ",$array);//data of our datebase is lowercase
		//check search for course or search for interns
		$num = 1;
		if($_REQUEST['searchcourse'] == 'Search for Courses'){
			$num = 0;
		}
		require_once "SqlTool.php";
		$mysql =new SqlTool();
		
		
		//print the thead
		$sql1 = "select * from intern1 where id = '1'";
		if(num == 1){
			$sql1 = "select * from course where id = '1'";
		}
		$res = $mysql->exec_dql($sql1);
		$col = mysql_num_fields($res);
		echo "<table border = 1 align = center width = 980   ><tr>";
		echo "<caption> <h1> Search Result </h1> </caption>";
		for($i = 0; $i < $col; $i++){
			$field_name = mysql_field_name($res,$i);
			echo "<th bgcolor= 'yellow' width =50>$field_name</th>";
		}
		
		//print the tbody
		foreach($values as $val){
		if($num == 1){
		//$sql = "select * from intern1 natural join company where keyword like '%{$val}%' or companyname like '%{$val}%'";
		$sql = "select * from intern1  where keyword like '%{$val}%' or companyname like '%{$val}%'";
		}else{
		$sql = "select * from course where coursename like '%{$val}%' or introduction like '%{$val}%'";
		}
		
		
		
		
		
		$res = $mysql->exec_dql($sql);
		$row = mysql_affected_rows(SqlTool::$connection);
		echo "<table border = 1 align = center width = 980   ><tr>";
		echo "</tr>";
		$k = 0;
				while($row = mysql_fetch_row($res)){
				if($k%2==0){
				$bgc = "#929";
				}else{
				$bgc = "#2f2";
				}
				$k++;
				echo "<tr>";
                // 			for($i = 0; $i < $col; $i++){
				// 				echo "<td bgcolor = '".$bgc."' align = center>$row[$i]";
				// 			}
				foreach($row as $val2){
				echo "<td bgcolor = '".$bgc."' align = center width =30 >$val2";
				}
				echo "</tr>";
				}
				echo "</table>";
				}
		
				//print a link
				//$google = "www.google.com";
				//echo "<br><a href = '".$google."'>Best Match</a>";
	}
}
 $s  = new search("microsoft stanford CS Boston Washington");
 $s->insertsearch($s->content);
 $s ->conditionsearch();
 $s->quicksearch();





?>

