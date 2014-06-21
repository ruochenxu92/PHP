<?php
	class intern {
		public $title;
		public $date;
		public $pie_friend;
		public static $count = 0;
		
		public function __construct(){
			self::$count++;
		}	

		public function showintern(){
			require_once "table.php";
			$sql = "select * from intern1 natural join company";
			$table = new table(10,10,'Show Intern');
			$table->create_hyper($sql);
		}
		public function quickinsert($values){
			$arr = explode(" ",$values);
			if(count($arr)!=7){
				echo "please orderally enter ";
				return;
			}
// 			if($arr[5]=="no" || $arr[5]=="No")
// 				$arr[5] = 0;
// 			else 
// 				$arr[5] = 1;
			$sql = "insert into intern1 (
netid,
keyword ,
companyname,
salary,
type,
piefriend,
school ,
time) values('{$arr[0]}','{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[4]}','{$arr[5]}','{$arr[6]}',now())";
			require_once "SqlTool.php";
			$mysql = new SqlTool();
			$mysql->exec_dml($sql);
		}	
		public function forminsert($values){
		       for($i = 0; $i < count($values); $i++) 
			   $arr[i] = $values[i];
		
			// 			if($arr[5]=="no" || $arr[5]=="No")
				// 				$arr[5] = 0;
				// 			else
					// 				$arr[5] = 1;
				$sql = "insert into intern1 (
				netid,
				keyword ,
				companyname,
				salary,
				type,
				piefriend,
				school ,
				time) values('{$arr[0]}','{$arr[1]}','{$arr[2]}','{$arr[3]}','{$arr[4]}','{$arr[5]}','{$arr[6]}',now())";
				require_once "SqlTool.php";
				$mysql = new SqlTool();
					$mysql->exec_dml($sql);
				}
					
// insert into intern1 (
// netid,
// keyword ,
// companyname,
// salary ,
// type ,
// piefriend ,
// school ,
// time )
// values ('hong2','CS computer science','microsoft','5000','full-time','1','UIUC',now())
					
					
			
	}
	
	$i = new intern();
	$ss = "hong2 cs microsoft 5000 full-time 1 UIUC";
	$i->quickinsert($ss);
	
	
	
?>
	
	
	
	
	