<?php 
	//search

	$keyword = $_REQUEST['keyword'];
	$location = strtoupper($_REQUEST['location']);
	$company = strtolower($_REQUEST['company']);
	$school = strtolower($_REQUEST['school']);
	//piefriend = 1
	$piefriend = $_REQUEST['piefriend'];//boolean
	$fulltime = $_REQUEST['full-time'];//boolean

	
// 	$keyword = 'CS';
// 	$location = 'Seattle';
// 	$company = 'microsoft';
// 	$school = 'UIUC';
// 	//piefriend = 1
// 	$piefriend ='on';//boolean
// 	$fulltime = 'on';//boolean
// 	$salary = 5000;
	

// 	$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}')
// 	and	company = '{$company}' and school = '{$school}' and piefriend = '1' and type ='full-time'";
	
	
	if($fulltime=='on'){
		if(isset($piefriend)){
			//echo "11";
			$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
		and	company = '{$company}' and school = '{$school}' and piefriend = '1' and type ='full-time'";
		}else{
			//echo "10";
		$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
	 and company = '{$company}' and school = '{$school}' and type = 'full-time'";
		}
	}else{
	if($piefriend == 'on'){
		//echo "01";
		$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
		and company = '{$company}' and  school = '{$school}' and piefriend = '1' and type = 'part-time'";
	}else{
		//echo "00";
	$sql = "select * from intern1 where keyword like '%{$keyword}%' and (state = '{$location}' or city = '{$location}' or zipcode = '{$location}')
	and company = '{$company}' and school = '{$school}' and type = 'part-time'";
	}}
	
	require_once "table.php";
	$table = new table(10,10,'search for intern');
	$table->create_table($sql);
?>