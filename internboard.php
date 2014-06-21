
<html>
<head>
	<title> U of Illinois  </title>	                                                        
	<link rel = "stylesheet" type = "text/css"  href = "css/style.css">
</head> 
<body>        
         <?php 
                require_once "intern.php";
                $i1 = new intern();
                $i1 ->showintern();   
          ?>
              
              <h2> netid  keyword companyname salary type piefriend school</h2>
               <form action  ='internboard_doyourjob.php' method = 'post'>
					<div id = "header">
					<h1> UIUC</h1>         
			        <div id = "controls">
	          		<input type = 'text' style = 'width:180' placeholder = 'Please enter your intern here...'>
	          		<input type = 'submit' id = "send" value = 'Send'> 
	                <input checked type = "checkbox" id = "enter"/>
                     
	                <label>    Send on enter </label>
		</div>
		</form>

</body>
</html>

	