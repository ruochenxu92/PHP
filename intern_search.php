<?php
	class search{
		public $kw;
		public $location;
		public $company;
		public $salary;
		public $type;
		public static $search_id = 0;
		public $mysql;
		
		//?check whether $kw, $location, $company, $salary, $type is empty var_dump(isset($_POST['name']);
		public function __contruct($kw, $location, $company,$salary, $type){
			$this->kw = $kw;
			$this->location = $location;
			$this->company = $company;
			$this->salary = $salary;
			$this->type = $type;
		}
		
		public function quicksearch(){
			require_once "SqlTool.php";
			$this->mysql = new SqlTool();
			//query 
			$sql = "select * from intern1 where kw like '%".$this->kw."%'";
				
			//create table	
			$res =  $this->mysql->exec_dql($sql);
			require_once "table.php";
			$t1 = new table(10,10,"My intern");
			$t1->create_table($sql);
		}
		
		public function conditionsearch(){
			
		}
	}
	
	require_once "table.php";
	$sr = new search("CS","WA","microsoft",1000,"full-time");
	$sr->quicksearch();	
	
?>
	
	
	
	
	
	
	
	
	