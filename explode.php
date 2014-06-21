<html>
<head> 
</head>
<body>
	<h1>  Calculate the average grade</h1>
	
	<?php 
		error_reporting(E_ALL ^ E_NOTICE);
		$grades = $_POST['grade'];
		$grades = explode(" ", $grades);
		$allGrades = 0;
		
		foreach($grades as $k=>$v){
			$allGrades+= $v;
		} 
	?>
</body>
</html>
