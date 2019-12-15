<?php
	
	
	$database_name = "kuptmcourierms";
	$connect = mysqli_connect("localhost", "root", "", $database_name);
	
	//This section processes submission from the login form
	//Check if the form has been submitted
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//validate the username
		if(!empty ($_POST['username'])){
			$u = mysqli_real_escape_string($connect,$_POST['username']);
		}
		else{
			$u= FALSE;
			echo '<script>alert("Wrong Username")</script>';
		}
		
		//validate the password
		if(!empty ($_POST['password'])){
			$p = mysqli_real_escape_string($connect,$_POST['password']);
		}
		else{
			$p= FALSE;
			echo '<script>alert("Wrong Password")</script>';
		}
		
		//if no problem
		if($u && $p){
			//retrive the id, firstname, lastname, for the username and password combination
			
			$q= "SELECT * FROM admininformation WHERE (username = '$u' AND password= '$p')";
			
			//run the query and asssign it to the variable $result
			
			$result =mysqli_query ($connect, $q);
			
			//count the number of row that match the username /password combo
			//if one database row (record) mathces theinput;
			if(@mysqli_num_rows ($result) == 1){
			session_start();
			$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);
			
			echo '<script>alert("Welcome Admin")</script>';
			echo '<script>window.location="adminhome.php"</script>';
			
			//cancel the rest of the script
			exit();
			
			mysqli_free_result($result);
			mysqli_close($connect);
			//no match was made
		}
		else{
			echo '<script>alert("The username and password not macth our record")</script>';
		}
		
		//if therewas aproblem
		}
		else{
			echo '<script>alert("Please try again")</script>';
		}
		mysqli_close($connect);
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KUPTM Courier Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="main">
    	
        <div class="bannerTop"><img src="image/banner.png"/></div>
        
        <div class="nav">
        	<ul>
            <div class="container">
            	<li><a href="index.php">Home</a></li>
                <li><a href="location.html">Location & Contact</a></li>
                <li><a href="help.html">Help</a></li>
                <li style="float:right"><a href="loginadmin.php">Admin</a></li>
            </div>
            </ul>
        </div> <!--End Nav-->
        
        <div class="login-form">
        	<div class="container">
        
                <br />
                <center><h1><u>ADMIN LOGIN</u></h1><br />
                <form method="post" action="loginadmin.php">                             
                    
                <div class="admin-login">
                    <div class="input-group">
                        <label>Username</label>
                        <input type="text" id="username" class="input-text" name="username" value="<?php 
                            if(isset($_POST['username']))
                                echo $_POST['username'];?>" />
                    </div>
                    <br />
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" id="password" class="input-text" name="password" value="<?php 
                            if(isset($_POST['password']))
                                echo $_POST['password'];?>" />
                    </div>
                    <br />
                    <div class="input-group">
                        <button type="submit" class="btnsubmit" name="login_user">Login</button>
                        <button type="reset" class="btnReset" name="reset">Clear</button>
                    </div>
				</div>                    
                    
                </form>
                <br />
		
        	</div>
        </div>
        
        <div class="footer">
        	<div class="container">
        		<div class="logoBot"><img src="image/footerlogo.PNG" /></div>
            
            	<div class="AddressBot">
                	<h4>CONTACT</h4>
                    <p>Tel:03-9206 9700 Fax:03-9281 5764</p><br /> 
                    <p><b>ADDRESS :</b></p>
                    <p class="address">Kolej Universiti Poly-Tech MARA Kuala Lumpur © 2018. All Rights Reserved.
                    Jalan 6/91, Taman Shamelin Perkasa, Cheras, 56100, Kuala Lumpur.</p>                   
            	</div>
            </div>
        </div><!--Footer div-->
        
    </div><!---end main-->
</body>
</html>