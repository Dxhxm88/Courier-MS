<?php
	session_start();
	$database_name = "kuptmcourierms";
	$connect = mysqli_connect("localhost", "root", "", $database_name);		
			
		if(isset($_POST['edit'])){
		
			$error = array();
			
				//check for id
				if(empty($_POST ['id'])){
					$error[] ='You forgot to enter admin id.';
				}
				else{
					$id = $_POST['id'];
				}
				
				//check for name
				if(empty($_POST ['name'])){
					$error[] ='You forgot to enter admin name.';
				}
				else{
					$n = $_POST['name'];
				}
				
				//check for username
				if(empty($_POST ['username'])){
					$error[] ='You forgot to enter admin username.';
				}
				else{
					$i = $_POST['username'];
				}
				
				//check for phone
				if(empty($_POST ['phone'])){
					$error[] ='You forgot to enter admin phone number.';
				}
				else{
					$p = $_POST['phone'];
				}
				
				//if no prob occured
				if(empty($error)){	
					
					$q = "UPDATE admininformation SET id= '$id', username = '$i', AdminName = '$n', phone = '$p' WHERE id= '$id' LIMIT 1";						
					$result = @mysqli_query($connect, $q);
					header('location: manageAdmin.php'); //redirect to index page after inserted
				}
				else{
					echo '<p class="error"> The following error (s) occured:<br>';
					foreach($error as $msg){
						echo "-$msg<br> \n";
					}
					echo '<p> Please try again.</p>';
				}
	}			
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KUPTM Courier Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
</head>

<body>
	
    <div class="main">
    	
        <div class="bannerTop"><img src="image/banner.png"/></div>
        
        <div class="nav">
        	<ul>
            <div class="container">
            	<li><a href="adminhome.php">Home</a></li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Personal Parcel</a>
                	<div class="dropdown-content">
                    	<a href="personalAddParcel.php">Add</a>
                        <a href="ViewAll.php">View All</a>
                        <a href="personalsendnoti.php">Send Notification</a>
                    </div>
                </li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">KUPTM Parcel</a>
                <div class="dropdown-content">
                    	<a href="kuptmAddParcel.php">Add</a>
                        <a href="kuptmViewParcel.php">View All</a>
                    </div>
                </li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">ADMIN</a>
                <div class="dropdown-content">
                    	<a href="addAdmin.php">Add Admin</a>
                        <a href="manageAdmin.php">Manage Admin</a>   
                    </div>
                </li>
                <li><a href="adminhelp.html">Help</a></li>
                <li style="float:right"><a href="index.php">LOGOUT</a></li>
            </div>
            </ul>
        </div> <!--End Nav-->
        
        <div class="edit-header">
        <div class="container">
        	<center><h1><b><u>Edit Admin</u></b></h1></center>
     
        	<form id="loginform" method="post" action="editAdmin.php">
            
            <?php
					$id = $_GET["id"];
					$q = "SELECT * FROM admininformation WHERE id = $id LIMIT 1";
						
					$result = @mysqli_query($connect, $q);
						
					//get admin information
					$row = mysqli_fetch_array($result, MYSQLI_NUM);	
			?>

            <div class="input-group">
                <label>Id</label>
                <input type="text" name="id" id="id" value="<?php 
					echo $row["0"];?>" />
            </div>
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" id="name" value="<?php 
					echo $row["3"];?>" />
            </div>
            
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" id="username" value="<?php echo $row["1"];?>" />
            </div>
            
            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" id="phone" value="<?php 
					echo $row["4"];?>" />
            </div>
            
            <div class="input-group">
                <center><button type="submit" id="btn_submit" name="edit">Update</button>
                <button type="button" id="btn_cancel" name="back" style="background-color:red;"><a href="manageAdmin.php" style="text-decoration:none; color:white;">Cancel</a></button></center>
            </div>
		</form>
        
		<?php 		
	mysqli_close($connect);
		?>
      </div>
        </div><!--end edit-->
        
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
        
    </div><!--End Main-->
</body>
</html>