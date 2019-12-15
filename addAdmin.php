<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	extract($_POST);
	$database_name = "kuptmcourierms";
    $connect = mysqli_connect("localhost", "root", "", $database_name);
	
	$query = "Insert Into admininformation (id, username, password, AdminName, phone) Values (' ','$username','$password','$name','$nophone')";
	$result= mysqli_query($connect, $query);
	
	if($result){
		echo '<script>alert("New admin has been register!")</script>';
		header('location: manageAdmin.php'); //redirect to index page after inserted
	}
	else{
		echo '<script>alert("Error. Please try again!")</script>';
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
    
    	<?php include("topbanner.html" );?><!--top nav-->
        
        <div class="add-admin">
        	<div class="container">
            
            	<center><h1><u>Register Admin</u> </h1></center>
                
                <form method="post" action="addAdmin.php">
                
                	
                    	<label><b>Name</b></label>
                        <input type="text"  id="name" placeholder="e.g: John" name="name" required><br />
                         
						<label><b>No. Phone</b></label>
                        <input type="text" id="phone" placeholder="e.g: 0123456789" name="nophone" title="Insert number phone without '-'" required><br />
        
                        <label><b>Username</b></label>
                        <input type="text" id="username" placeholder="Enter Username" name="username" required><br />
                        
        
                        <label><b>Password</b></label>
                        <input type="password" id="password" name="password"placeholder="********" required><br />                        
                    
      			
        			<center><button type="reset" class="cancelbtn"><a href="adminhome.php" style="text-decoration:none; color:white;">Cancel</a></button>
        			<button type="submit" class="submitbtn" name="submit"/>Submit</button></center>
                    
                </form>
        	
        	</div>
        </div>
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div> <!--End main-->
</body>
</html>