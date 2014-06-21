<?php
	session_start();
	$netID=$_SESSION['netid'];
	//echo $netID;
	include "session.php";
?>
<?php
// 	$sql = "select courseid from averageinfo where hours <= 10";
// 	$sql = "select courseid from averageinfo where  <= 20 AND hours > 10";
// 	$sql = "select courseid from averageinfo where hours <= 30 AND hours > 20";
// 	$sql = "select courseid from averageinfo where hours <= 40 AND hours > 30";
// 	$sql = "select courseid from averageinfo where hours <= 50 AND hours > 40";
	
	$netid = $netID;//change this			
    $sqlinfo = "select * from averageinfo1";

	require_once "pcourse.php";
	require_once "SqlTool.php";
	$mysql = new SqlTool();
	//$course  = $mysql-> getfromdb($sql);
	
	
	$mostuseful = "select courseid,useful from averageinfo1 where courseid not in
	(select courseid from subcourse where netid <> '{$netid}')  order by useful desc limit 1 ";
	
	$useful = $mysql->getfromdb($mostuseful);
	
	//echo $useful[0][0];

	$sqli = "select courseid,hours from subcourse where netid = '{$netid}'";
	$ihours = $mysql->getfromdb($sqli);
	
	$len =  count($ihours);
	
	//var_dump($course);
 	
	$sqlmyinfo = "select * from averageinfo1 where courseid in
	( select courseid from subcourse where netid = '{$netid}' and grade = 0
	)";
	 
	$courseinfo = $mysql->getfromdb($sqlmyinfo);
	
	//cs438     
	//echo $courseinfo[0][1]."<br>";
	//echo $courseinfo[0][2];
    


	
	$mhours  = max($courseinfo[0][2],$courseinfo[1][2],$courseinfo[2][2],$courseinfo[3][2]);
	$mdiff   = max($courseinfo[0][4],$courseinfo[1][4],$courseinfo[2][4],$courseinfo[3][4]);
	$museful = max($courseinfo[0][3],$courseinfo[1][3],$courseinfo[2][3],$courseinfo[3][3]);
	
	$besthours = 0;
	$totalhours = 0;
	
	for($i = 1; $i < $len; $i++){
		if($courseinfo[$i][2] > $courseinfo[$besthours][2])
			$besthours = $i;
		$totalhours+=$courseinfo[$i][2];
	}
	$itotal = 0;
	for($i =1; $i < $len; $i++){
		$itotal += $ihours[$i][1];
	}
	//echo "$itotal";
	$bestuseful = 0;
	for($i = 1; $i < $len; $i++){
		if($courseinfo[$i][3] > $courseinfo[$bestuseful][3])
			$bestuseful = $i;
	}
	
	
	$bestdiff = 0;
	for($i = 1; $i < $len; $i++){
		if($courseinfo[$i][4] > $courseinfo[$bestdiff][4])
			$bestdiff = $i;
	}
// 	echo $besthours;
// 	echo $bestuseful;
// 	echo $bestdiff;
	

	$totalnum = "select count(netid) from totalhours";
	$tnum = $mysql->getfromdb($totalnum);
	//echo ($tnum[0][0]);
	

	$mnum = "select count(netid) from totalhours where hours >= {$itotal}";
	$m  = $mysql->getfromdb($mnum);
	//var_dump ($tnum[0][0]);
	//var_dump ($m[0][0]);	
	//echo ( $m[0][0]);
	$percent = 1-  doubleval($m[0][0])/$tnum[0][0];
	
	
	
	$percent_friendly = number_format( $percent * 100, 2 ) . '%';
	
	
	

	
	
	
	
	
// 	echo $mhours;
// 	echo $museful;
//     echo $mdiff;
	$me = "";
	
	if($itotal < 40){
		$me = "I guess your major is art, what a party guy";
	}else if($itotal <60){
		$me = "Good, but you should work more, try to do better! <h1 >rank: $percent_friendly </h1> <h2> oh, boy </h2>";
	}else if($itotal <80){
		$me = "Fantastic, keep going, <h1>rank: $percent_friendly </h1> <h2> IT Hacker </h2>";
	}else if($itotal < 100){
		$me = "Guess what, you are <h1>rank: $percent_friendly </h1> <h2> IT Elite </h2>";
	}else{
		$me = "Stupid, why you work so hard? Keep stupid,<br> <h1>rank: $percent_friendly  </h1> <h2> Superman </h2> ";
	}
	
	
	if($itotal < $totalhours){
	for($i= 0; $i < $len; $i++){
		if($ihours[$i][1] < $courseinfo[$i][2]){
			echo "<h2>You have too many courses please drop:\r</h2><h1> {$ihours[$i][0]}<br></h1>";
		}
	}
	echo "<h2>Consider dropping </h2><h1> {$ihours[$besthours][0]} </h1><h2> or 
	             </h2><h1> {$courseinfo[$bestdiff][0]}<br><br><br></h1>";
	}else if($itotal-$totalhours > 30){
		echo "<h2>Consider dropping </h2><h1> {$ihours[$besthours][0]} </h1><h2> or 
	             </h2><h1> {$courseinfo[$bestdiff][0]}<br><br><br></h1><br>";
	}else{	
		echo "<h1> Balance courses, come on!!! </h1> <br>";
	}
	
	
	echo "<h1> $me </h1> ";
	
	
	
//     $myinfo= $mysql->getfromdb($sql);
	
// 	$pcourse = new personcourse($course, $netid);
// 	$pcourse->gettotalgrade();
	
 ?>
	