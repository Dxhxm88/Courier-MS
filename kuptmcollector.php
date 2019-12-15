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
				
				//check for date arrive
				if(empty($_POST ['dateArrive'])){
					$error[] ='You forgot to enter date arrive.';
				}
				else{
					$da = $_POST['dateArrive'];
				}
				
				//check for date arrive
				if(empty($_POST ['img'])){
					$error[] ='You forgot to enter sign.';
				}
				else{
					$img = $_POST['img'];
				}
				
				//if no prob occured
				if(empty($error)){	
					
					$q = "INSERT INTO kuptmcollectorinfo (id, name, trackingno, date, idparcel, sign ) 
			 Values(' ', '$n', '$tn', '$da', '$id', '$img')";
			 					
					$result = @mysqli_query($connect, $q);
					
									$q2 = "SELECT * FROM kuptmcollectorinfo";
										
									$result = @mysqli_query($connect, $q2);
										
									//get information
									$row = mysqli_fetch_array($result, MYSQLI_NUM);
					
									$collector = $_GET["id"];
									
					
					$q1 = "UPDATE kuptmparcelinfo SET status = 'COLLECTED' WHERE id= '$id' LIMIT 1 ";
					$result =@mysqli_query($connect, $q1);
					header('location: kuptmViewParcel.php'); //redirect to index page after inserted
				}
				else{
					echo '<p class="error"> The following error (s) occured:<br>';
					foreach($error as $msg){
						echo "-$msg<br> \n";
					}
					echo '<script>alert("Try Again, ERROR!")</script>';
					header('location: kuptmViewParcel.php');
				}
	}			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KUPTM Courier Management System</title>
<link href="sign/css/jquery.signaturepad.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="sign/js/numeric-1.2.6.min.js"></script> 
		<script src="sign/js/bezier.js"></script>
		<script src="sign/js/jquery.signaturepad.js"></script> 
		
		<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
		<script src="sign/js/json2.min.js"></script>
		<link href="sign/css/app_style.css" rel="stylesheet">
</head>

<body>
	<div class="main">
    	<?php include("topbanner.html" );?><!--top nav-->
        	
        <div class="collector">
                <div class="container">
                	<center><h1><b><u>Collector Information</u></b></h1></center>
                    	
                        <form method="post" action="kuptmcollector.php">
                        	<?php
									$id = $_GET["id"];
									
									$q = "SELECT * FROM kuptmparcelinfo WHERE id = $id LIMIT 1";
										
									$result = @mysqli_query($connect, $q);
										
									//get information
									$row = mysqli_fetch_array($result, MYSQLI_NUM);	
							?>
                                <div class="input-group">
                                    <label>Tracking No.</label>
                                    <input type="text" name="trackingno" id="tracking" value="<?php 
                                        echo $row["2"];?>" />
                                </div>                                                                
                                
                                <div class="input-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" value="<?php echo $row["1"];?>" />
                                </div>                                                                
                                
                                <div class="input-group">
                                    <label>Date Collect</label>
                                    <input type="date" name="dateArrive" id="date"/>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row["0"];?>" /> 
                                
                                
                               
                                <div id="signArea" >
                                <h2 class="tag-info">Put signature below,</h2>
                                <div class="sig sigWrapper" style="height:auto;">
                                    <div class="typed"></div>
                                    <canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
                                </div>
                            </div>
                           
                            
                            <div class="sign-container">
								<?php
                                $image = "sign/signature/$id.png";
                                
								?>
								<input type="hidden" name="img" value="<?php echo $image; ?>"/>
								                          
								</div>                                                             
                                
                                
                                <div class="input-group">
                                    <center><button type="submit" class="btn_login" name="edit" id="btnSaveSign">Collect</button>
                                    <button type="button" class="btn_login" name="back" style="background-color:red;"><a href="kuptmpickup.php" style="text-decoration:none; color:white;">Cancel</a></button></center>
                                </div>
                        </form>
                        </div>
           </div>
                        
                        <script>
							$(document).ready(function() {
								$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
							});
							
							$("#btnSaveSign").click(function(e){
								html2canvas([document.getElementById('sign-pad')], {
									onrendered: function (canvas) {
										var canvas_img_data = canvas.toDataURL('image/png');
										var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
										
										//ajax call to save image inside folder
										$.ajax({
											url: 'sign/save_sign.php',
											data: { img_data:img_data,  id:<?php echo $_GET['id'];?>},							
											type: 'post',
											dataType: 'json',
											success: function (response) {
											   window.location.reload();
											}
										});
									}
								});
							});
							
							document.getElementById('clear').addEventListener('click', function () {
							  signaturePad.clear();
							});
					  </script>
                        <?php 		
						mysqli_close($connect);
						?>
                    
                    
        
        <?php include("footer.html"); ?><!--footer-->
    </div>
    
    
</body>
</html>