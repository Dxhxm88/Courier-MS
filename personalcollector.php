<?php
	session_start();
	$database_name = "kuptmcourierms";
	$connect = mysqli_connect("localhost", "root", "", $database_name);		
			
		if(isset($_POST['edit'])){
		
			$error = array();
			
				//check for id
				if(empty($_POST ['id'])){
					$error[] ='You forgot to enter parcel id.';
				}
				else{
					$id = $_POST['id'];
				}
				
				//check for trackingno
				if(empty($_POST ['idcard'])){
					$error[] ='You forgot to enter Id card no.'; 
				}
				else{
					$ic = $_POST['idcard'];
				}
				
				//check for trackingno
				if(empty($_POST ['trackingno'])){
					$error[] ='You forgot to enter Tracking no.';
				}
				else{
					$tn = $_POST['trackingno'];
				}
				
				//check for Name
				if(empty($_POST ['name'])){
					$error[] ='You forgot to enter Name.';
				}
				else{
					$n = $_POST['name'];
				}
				
				//check for phone
				if(empty($_POST ['phone'])){
					$error[] ='You forgot to enter phone number.';
				}
				else{
					$p = $_POST['phone'];
				}
				
				//check for date arrive
				if(empty($_POST ['dateArrive'])){
					$error[] ='You forgot to enter date arrive.';
				}
				else{
					$da = $_POST['dateArrive'];
				}
				
				
				//if no prob occured
				if(empty($error)){	
					
					$q = "INSERT INTO collectorinformation (id, idcardcollector, namecollector, nophonecollector, datecollect, idparcel ) 
			 Values(' ', '$ic', '$n', '$p', '$da', '$id')";
			 					
					$result = @mysqli_query($connect, $q);
					
									$q2 = "SELECT * FROM collectorinformation";
										
									$result = @mysqli_query($connect, $q2);
										
									//get information
									$row = mysqli_fetch_array($result, MYSQLI_NUM);
					
									$collector = $_GET["id"];
									
					
					$q1 = "UPDATE parcelinformation SET statusParcel = 'COLLECTED' WHERE id= '$id' LIMIT 1 ";
					$result =@mysqli_query($connect, $q1);
					header('location: ViewAll.php'); //redirect to index page after inserted
				}
				else{
					
					echo '<p class="error"> The following error (s) occured:<br>';
					header('location: ViewAll.php');
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
</head>

<body>
	<div class="main">
    	<?php include("topbanner.html" );?><!--top nav-->
        	
           <div class="collector">
                <div class="container">
                	<center><h1><b><u>Collector Information</u></b></h1></center>
                    	
                        <form method="post" action="personalcollector.php">
                        	<?php
									$id = $_GET["id"];
									$q = "SELECT * FROM parcelinformation WHERE id = $id LIMIT 1";
										
									$result = @mysqli_query($connect, $q);
										
									//get information
									$row = mysqli_fetch_array($result, MYSQLI_NUM);	
							?>
                                <div class="input-group">
                                    <label>Tracking No.</label>
                                    <input type="text" name="trackingno" id="tracking" value="<?php 
                                        echo $row["1"];?>" />
                                </div>
                                
                                <div class="input-group">
                                    <label>Id Card</label>
                                    <input type="text" name="idcard" id="name" />
                                </div>
                                
                                <div class="input-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo $row["2"];?>" />
                                </div>
                                
                                <div class="input-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" value="<?php 
                                        echo $row["3"];?>" />
                                </div>
                                
                                <div class="input-group">
                                    <label>Date Collect</label>
                                    <input type="date" name="dateArrive" id="date"/>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row["0"];?>" />                                                              
                                
                                
                                <div class="input-group">
                                    <center><button type="submit" class="btn_login" name="edit">Collect</button>
                                    <button type="button" class="btn_login" name="back" style="background-color:red;"><a href="personalpickup.php" style="text-decoration:none; color:white;">Cancel</a></button></center>
                                </div>
                        </form>
                        <?php 		
						mysqli_close($connect);
						?>
                    
                </div>
           </div>
            
        <?php include("footer.html"); ?><!--footer-->
    </div><!--end main-->
</body>
</html>