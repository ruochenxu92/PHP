<?php
        //add new friends
        require_once "table.php";
    	$sql = "select * from intern1 ";
    	$table1=  new table(10,10,'add friends');
    	$table1->create_hyper($sql);
        //add new friend   
?>