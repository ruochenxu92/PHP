<?php
	session_start();
	$netID=$_SESSION['netid'];
	echo $netID;
	include "session.php";
?>
<?php 
      
       // echo "<br> orginal id is: {$_REQUEST['orginalid']}<br>";  	
    	$courseid =($_POST['courseid']);
    	
    	//$netid = ($_POST['netid']);
    	$orginalid = ($_POST['orginalid']);
    	require_once "SqlTool.php";
        $mysql = new SqlTool();
    	
    	
    	echo "You have add this course: {$courseid}";
    	
    	switch($_POST['dml']){
    		case 'insert':
          echo "insert <br>";
    			/*$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netID}'");
    			if(mysql_fetch_row($res))
    				echo "Duplicate course, please enter the distinct course!".die();  */
    				
    				
    				
    			$sql = "insert into subcourse(courseid,netid) values('{$courseid}','{$netID}')";
    			break;
    		case 'update':
          echo "update";
    			/*$res = $mysql->exec_dql("select * from pcourse where where courseid = '{$courseid}' and netid = '{$netID}'");
    			if(!mysql_fetch_row($res))
    				echo "Courses not exist, try again!".die();*/
    		       // var_dump($netID);
                        $sql= "update subcourse set courseid = '{$courseid}' where courseid = '{$orginalid}' and netid = '{$netID}'";
                       
    			break;
    		case 'delete':
          echo "delete";
    			/*$res = $mysql->exec_dql("select * from pcourse where courseid = '{$courseid}' and netid = '{$netID}'");
    			if(!mysql_fetch_row($res))
    				echo "No such course, try again!".die();*/
    			$sql = "delete from subcourse where courseid = '{$courseid}' and netid = '{$netID}'";
                        break;
    		default:
    			echo "please enter the courseid, thank you!";
    	}
      $mysql->exec_dml($sql);
      //echo "OK";
     
        echo "<meta http-equiv='refresh' content='0;url=http://thegreatwall.web.engr.illinois.edu/StudentAccount-AddClass.php' /> ";

    
?>