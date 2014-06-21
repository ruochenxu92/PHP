<?php
	class Monkey{
		public $age;
		public $name;
		
		public function climbing(){
			echo "Monkey can climb <br>";
		}
	}
	

	
	class LittleMonkey extends Monkey implements iBirdable,iFishable{
		public function fly(){
			echo "Monkey flying <br>";	
		}
		public function swimming(){
			echo "Monkey Swimming <br>";
		}
	}
	$LittleMonkey = new LittleMonkey();
	$LittleMonkey->climbing();
	$LittleMonkey->fly();
	$LittleMonkey->swimming();
	