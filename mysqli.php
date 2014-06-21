<?php
	
// 	$mysqli = new MySQLi('127.0.0.1','root','','xxu46');
	
// 	if($mysqli->connect_error()){
// 		die("Connect error(".$mysqli->connect_error);
// 	}

	// Create connection
	$con=mysqli_connect("127.0.0.1","root","","xxu46");
	
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	$sql = "select * from test";
	//$res is the result  of mysqli result 

	$res = $con->query($sql);

	
	while($row = $res->fetch_row()){
		foreach($row as $key => $val){
			echo "--$val";
		}
		echo "<br/>";
	}
	$res->free();
	$mysqli->close();
?>
