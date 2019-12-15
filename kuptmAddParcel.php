<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	extract($_POST);
	$database_name = "kuptmcourierms";
    $connect = mysqli_connect("localhost", "root", "", $database_name);
	
	$query = "Insert Into kuptmparcelinfo (id, name, trackingno, dateArrive, courier, status) Values (' ','$name','$trackingno','$dateArrive', '$courier', '$statusParcel')";
	$result= mysqli_query($connect, $query);
	
	if($result){
		echo '<script>alert("New Parcel has been Added!")</script>';
		header('location: adminhome.php'); //redirect to index page after inserted
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
        
        <div class="add-parcel">
        	<div class="container">
            	<center><br /><h1><u>Parcel Information</u></h1><br /></center>
                
                <form method="post" action="kuptmAddParcel.php">
                
                	<label><b>Name</b></label>
      				<input type="text" id="name" placeholder="e.g: John" name="name" required><br />

      				<label><b>Tracking No.</b></label>
      				<input type="text" id="tracking" placeholder="e.g: MY23456789" name="trackingno" title="Insert number phone without '-'" required><br />

      				<label><b>Date Arrive</b></label>
      				<input type="date" id="date" name="dateArrive" required><br />
                    
                    <label><b>Courier</b></label>
      					<select name="courier" id="courier">
    						<option>PosLaju</option>
    						<option>FedEx</option>
                            <option>Ninja Van</option>
                            <option>DHL</option>
                         </select><br />
                    
                    <label><b>Status Parcel</b></label>
                    	<select name="statusParcel" id="status">    						    						
                            <option>UNCOLLECTED</option>
                            <option>COLLECTED</option>
                       	</select><br />
      			
        			<center><button type="reset" class="cancelbtn"><a href="adminhome.php" style="text-decoration:none; color:white;">Cancel</a></button>
        			<input type="submit" class="submitbtn" name="submit"/></center>
                </form>                                
            </div>
        </div><!--end add parcel-->
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div><!--Main div-->
</body>
</html>