<?php
class subcourse{
	public $courseid;
	public $grade;    //A      A     A
	public $hours;    //10     20   30
	public $useful;   //5     5      0    based on
	public $level;    //1     3      0                1-5
	public $credit;
	public $netid;
		//$one is array
	public function __construct($one){
		$this->courseid = $one[0];
		$this->grade    = $one[1];
		$this->hours    = $one[2];
		$this->useful   = $one[3];
		$this->level    = $one[4];
		$this->credit   = $one[5];
		$this->netid    = $one[6];
	}
}

	class personcourse{  
//      personal course
// 		public $netid;
// 		public $credit;//from koofers
// 		public $level; //difficulties      from Koofers
// 		public $hours;  //student need to pay to an A B C D
// 		public $active; //answer questions, answer other students, do projects
// 		public $professor;
// 		public $grades;

		public $totalcourseid;
		public $totalgrade;    //           
		public $totalhours;    //10     20   30
		public $totaluseful;   //5     5      0    based on
		public $totallevel;    //1     3      0                1-5
		public $netid;
		public $totalcredit;
		public $course;
		
// 		public $netid;
// 		public $totalcourseid; //cs125 cs225 cs373
// 		public $averlevel;
// 		public $totalhours;
// 		public $gpa;

		
		public function __construct($coursearray,$netid){
			//$this->course = array();
			foreach($coursearray as $key => $one){
				   //var_dump($one);
			       $this->course[$key] = new subcourse($one);	
				  // echo $key;
			}
			//var_dump($this->course);
			$this->totalcourseid = count($this->course);	
			
			$this->netid = $netid;
		}
		
		public function gettotalgrade(){
			//var_dump($this->course);
			return $this->gettotalgrade1($this->course);
			
		}

		public function gettotalgrade1($course){
			$this->totalgrade = 0;
			$this->totalcredit = 0;
			$this->totalhours = 0;
			$this->totaluseful=0;
			$this->totallevel = 0;
			//var_dump($course);
			foreach($course as $key => $val){
				//$this->print_var($key);	
				//var_dump($val);
				$this->totalgrade += $val->grade * $val->credit;   
				if($this->grade != 0){
					$this->totalcredit+= $val->credit;
				}
				$this->totalhours += $val->hours;
				$this->totallevel += $val->level;
				$this->totaluseful+= $val->useful;
// 				echo $val->totaluseful;
// 				echo $this->totaluseful;
// 				echo $this->totallevel;
			}
			return $this->totalgrade;
		}
	
		public function GPA(){
			$this->gettotalgrade($this->course);
			return doubleval($this->totalgrade)/$this->totalcredit;
		}
		
		public function gettotalhours($totcourse){
			
			$this->gettotalgrade($totcourse);
			
			return $this->totalhours;
		}
		
// 		public function print_var($val){
// 			echo "It is: ";
// 			var_dump($val);
// 			echo "<br>";
// 		}
		
		public function copy($arr1,$arr2){
			foreach($arr2 as $key=> $val){
				$arr1[$key] = $val;
			}
		}
		

// 		public function __construct($netid,$course){
// 			$this->netid = $netid;
// 			$this
// 		}
		
// 		course  0     1    2    3   
// 		course  125  241  421  411
//                    p
//                    grade
//                    level
//                    credits	
// 		              hours
		public function showcourse(){
			require_once 'SqlTool.php';
			$mysql = new SqlTool();
			require_once 'table.php';
			$table1 = new table(10,10,'Personal Course');
			
			$sql_lookup = "select distinct courseid,netid from subcourse";
			$res  = $mysql->exec_dql($sql_lookup);
			$table1->lookup($res);
		}
		
		public function showcourse1(){
			require_once 'SqlTool.php';
			$mysql = new SqlTool();
			require_once 'table.php';
			$table1 = new table(10,10,'{$this->netid} Personal Course');
			$sql_lookup = "select distinct courseid,coursename from subcourse natural join courseinfo where netid = '{$this->netid}'";
			//$sql_lookup = "select courseid,coursename,introduction from pcourse natural join course";
			//$sql_lookup = "select distinct courseid from pcourse where netid = '{$_GET['netid']}'";
			$res = $mysql->exec_dql($sql_lookup);
			$table1->lookup($res);
		}
		
		public function LPA(){
			echo doubleval($this->totallevel)/$this->totalcourseid;
		}
		public function UPA(){ 
			echo doubleval($this->totaluseful)/$this->totalcourseid;
		}
		
		
		
		
		
		public function exec_dml($c1, $c2, $c3,$s){    
// 		echo "<br>{$_REQUEST['courseid']}";
// 		echo "<br>{$_REQUEST['netid']}";
// 		echo "<br>{$_REQUEST['orginalid']}";
		 
// 		$courseid =($_POST['courseid']);
// 		$netid = ($_POST['netid']);
// 		$orginalid = ($_POST['orginalid']);
		$courseid = $c1;
		$netid = $c2;
		$orginalid = $c3;
		 
		require_once "SqlTool.php";
		$mysql = new SqlTool();
		//
// 		if(  $_REQUEST['dml1'] == '1'){
// 			$val = $_REQUEST(['dml1']);
// 		}
// 		$val = $_REQUEST(['dml2']);
		$val = $s;
    	switch($val){
		    	case 'insert':
		    	echo "insert <br>";
		    	/*$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netid}'");
		    	if(mysql_fetch_row($res))
		    		echo "Duplicate course, please enter the distinct course!".die();*/
		    	$sql = "insert into pcourse(courseid,netid) values('{$courseid}','{$netid}')";
		
		    	break;
		    	case 'update':
		    	echo "update";
		    	/*	$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netid}'");
		    	if(!mysql_fetch_row($res))
		    		echo "Course not exists, try again!".die();*/
		    	$sql= "update pcourse set courseid = '{$courseid}' where courseid = '{$orginalid}' and netid = '{$netid}'";
		    	break;
		    	case 'delete':
		    	echo "delete";
		    	/*	$res = $mysql->exec_dql("select * from pcourse where courseid = '{$courseid}' and netid = '{$netid}'");
		    	if(!mysql_fetch_row($res))
		    		echo "No such course, try again!".die();*/
		    	$sql = "delete from pcourse where courseid = '{$courseid}' and netid = '{$netid}'";
		    	break;
		    	default:
		    		echo "please enter the courseid and netid, thank you!";
		    	}
		    	$mysql->exec_dml($sql);
		    	echo "OK";
		    	echo "<a href = 'basic_service.php'>Back </a>";
	
		}
	}
	
	
	
	
	
	
    //$course = array();
//  $course[] =array ('cs173',	2,	20,	3,	3,	3,	'xxu46');
// 	$course[] =array ('cs125',	2,	20,	3,	3,	3,	'xxu46');
// 	$course[] =array ('cs225',	2,	20,	3,	3,	3,	'xxu46');
//  $course[] =array ('cs325',	2.3,	20,	3,	3,	3,	'xxu46');
//  $course[] =array ('cs425',	2.3,	20,	3,	3,	3,	'xxu46');	
//  $course[] =array ('cs173',	2.3,	20,	3,	3,	3,	'xxu46');
        

    
    
    
    
    
    
    
?>
	