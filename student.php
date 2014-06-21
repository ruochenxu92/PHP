<?php
/*
class student {
	public static $money = 0;
	public $name;
	function __construct($name){
		$this->name = $name;
	}
	function enterschool($tuition){
		self::$money+=$tuition;
	}
	public static function getFee(){
		return self::$money;
	}
	
}
	$stu1 = new student("Alex");
	$stu1::enterschool(340);
	$stu2 = new student("Thomas");
	$stu2::enterschool(40);
	echo student::getFee();
*/	


class stu{
	public $name;
	private $grade;
	public $addr;
	private $age;
	public function __construct($name, $age){
		$this->name = $name;
		$this->age = $age;
	}
	public function showinfo(){
		echo $this->name."||".$this->age;
	}

}

class Pupil extends stu{
	public function hobby(){
		echo "fighting!";
	}
}

class Graduate extends stu{
	public function hobby(){
		echo "bubble girls!";
	}
}



	$p1 = new Pupil("Xiaomin",12);
	echo "<br>";
	echo "Pupil   ".$p1->showinfo()."||".$p1->hobby();
	echo "<br>";
	$p2 = new Graduate("Xiaomin",22);
	echo "Graduate <br>".$p2->showinfo()."||".$p2->hobby();
	
	
	
	
	
	/*
class Account {
	private $balance;
	private $id;
	public function Account($num){
		$id = $num;
		$balance = 0;
	}
	function withdraw($var){
		self::$balance-= $var;
	}
	function deposit($var){
		$balance += $var;
	}
	public function getbalance(){
		return self::$balance;
	}
}
	$acc1 = new Account(1);
	
	$acc1::withdraw(400);
	
	echo $acc1::getbalance();

	*/
	
class Person{
	public $name;
	private $age;
	private $salary;
	function __construct($name,$age,$salary){
		$this->name = $name;
		$this->age = $age;
		$this->salary = $salary;
	}
	function getage(){
		return $this->age;
	}
	function getsalary($user,$password){
		if($user=="xxu46" && $password=="xxu46")
			return $this->salary;
		return "wait a for correct user && password!";
	}
	
}

	echo "<br>";
	$p1 = new Person("Thomas",30,10000);
	echo "name: ".$p1->name."<br/> age: ".$p1->getage()."<br> salary:".$p1->getsalary("xxu46","xxu46");
	//"name: ".$p1->name."<br> age:".$p1->age."<br> salary:".$salary;
	
	



?>