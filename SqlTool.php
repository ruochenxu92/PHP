<?php
class SqlTool{
	private $conn;
	private $host = "engr-cpanel-mysql.engr.illinois.edu";
	private $user = "thegreatwall_pub";
	private $password = "cs411";
	private $db = "thegreatwall_public";
	public static $connection;
	
	public function SqlTool(){
		$this->conn = mysql_connect($this->host,$this->user,$this->password);
		if(!$this->conn){
			die("connect database Failure".mysql_error());
		}
		mysql_select_db($this->db, $this->conn);
		
		mysql_query("set names utf8");
		self::$connection =$this->conn;
	}
	//achieve select
	public function exec_dql($sql){
		$res = mysql_query($sql,$this->conn) or die(mysql_error());
		return $res;
	}
	
	public function getfromdb($sql){
	     	$res = $this->exec_dql($sql);
			$i = 0;
			//var_dump($res);
			while($row = mysql_fetch_row($res)){
				//var_dump($row);
				//echo "<br>"."salkfjadls;jfklajo;rhj";
				$ret[$i] = $row;
				//var_dump($ret[$i]);
				foreach($row as $key => $val){
					$ret[$i][$key] = $val;
					//var_dump($ret[$i][$key]);
				}
				
				$i++;
			}
			return $ret;   //return with 2d array
		
	}
	

	
	//achieve update, delete, insert
	public function exec_dml($sql){	
		$b = mysql_query($sql, $this->conn) or die(mysql_error());
		echo "New Insert Record ID is: ".mysql_insert_id($this->conn);
		echo "<br>";
			
		if(!$b){
			return 0;//Failure
		}else{
			if(mysql_affected_rows($this->conn)>0){
				return 1;//manipulate success
			}else{
				return 2;
			}
		}
	}


}
?>