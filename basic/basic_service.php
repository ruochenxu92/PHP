
<!DOCTYPE html>
<html>
 <head>
	<title>EasyAudit Home Page</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" >
 </head>
 <body>
	<div class="wrapper">
		<header class="front-panel">
			<img style="margin-left;" style="left" src="http://i.imgur.com/4ggdN7n.png" class="logo" >
			<ul>
			<li><a href="">MyIllinois</a></li>
			<li><a href="">Notification Board</a></li>
			<li><a href="upload.html" class="current">Upload</a></li>
			<li><a href="about.html">About</a></li>			
			</ul>
		</header>
		<div class="left-panel">
			<ul>
				<li><a href="" >My Courses</a></li>
				<li><a href="">My Wishlist</a></li>
				<li><a href="">SendEmail</a></li>
				<li><a href="">PersonalInfo</a></li>				
			</ul>
			
		</div>
			
	</div>
</body>


   
<?php 
	require_once 'SqlTool.php';
	$mysql = new SqlTool();
	require_once 'table.php';
	$table1 = new table(10,10,'Personal Course');
	//$sql_lookup = "select courseid,coursename,introduction from pcourse natural join course";
	//$sql_lookup = "select distinct courseid from pcourse where netid = '{$_GET['netid']}'";
	$sql_lookup = "select distinct courseid from pcourse";
	$res  = $mysql->exec_dql($sql_lookup);
	$table1->lookup($res);
	
    if(isset($_POST['dml'])){
    	$courseid =($_POST['courseid']);
    	$netid = ($_POST['netid']);
    	$orginalid = ($_POST['orginalid']);
    	switch($_POST['dml']){
    		case 'insert':
    			$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netid}'");
    			if(mysql_fetch_row($res))
    				echo "Duplicate course, please enter the distinct course!".die();
    			$sql = "insert into pcourse(courseid,netid) values('{$courseid}','{$netid}')";
    			break;
    		case 'update':
    			$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netid}'");
    			if(!mysql_fetch_row($res))
    				echo "Course not exists, try again!".die();
    			$sql= "update pcourse set courseid = '{$courseid}' where courseid = '{$orginalid}' and netid = '{$netid}'";
    			break;
    		case 'delete':
    			$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netid}'");
    			if(!mysql_fetch_row($res))
    				echo "No such course, try again!".die();
    			$sql = "delete from pcourse where courseid = '{$courseid}' where courseid = '{$courseid}' and netid = '{$netid}'";
    			break;
    		default:
    			echo "please enter the courseid and netid, thank you!";
    	}
    	
        $mysql->exec_dml($sql);
      //include ("additionsuccess.php");
       //die();
    }
?>

<div class = "output_wrapper">
   <br/>
   <br/>
   <a href ="../index.html">Go Back To Search Page</a>
   <a href ="../StudentAccount.php">Go Back To Home Page</a>

	<br/>
        <br/>
            <form method = "post" name = "basic_service" action = 'basic_service.php' >
                course id:<input type= "text" name = "courseid" width = '180' placeholder = "Input one courseid here, cs241 ..." >
                netid: <input type= "text" name = "netid" width = '180' id ="netid" placeholder = "Input the netid here ..." >
               
              Click Here: <input type= "submit" name = "dml" id = "courseid" value = "insert" > 
              <input type= "submit" name = "dml" id = "courseid" value = "delete" >
              <br> 
              <br>
               update with orginal id:<input type = "text" name = "orginalid" width ='180'placeholder = "input the orginal course id here ...">
                 <input type= "submit" name = "dml" id = "courseid" value = "update" >
            </form>
    </div>
</div>


</body>
<html>