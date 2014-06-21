<?php
class SqlTool{
	private $conn;
	private $host = "127.0.0.1";
	private $user = "root";
	private $password = "";
	private $db = "xxu46";
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
	//achieve update, delete, insert
	public function exec_dml($sql){	
		$b = mysql_query($sql, $this->conn) or die(mysql_error());
		echo "Record ID is: ".mysql_insert_id($this->conn);
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






$mysql = new SqlTool();
$sql = "insert into record (content) values('UIUC')";
$mysql->exec_dml($sql);
?>