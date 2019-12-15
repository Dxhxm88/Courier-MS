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
				
				//check for courier
				if(empty($_POST ['courier'])){
					$error[] ='You forgot to enter courier.';
				}
				else{
					$c = $_POST['courier'];
				}
				
				//check for status
				if(empty($_POST ['status'])){
					$error[] ='You forgot to enter status.';
				}
				else{
					$s = $_POST['status'];
				}
				
				//if no prob occured
				if(empty($error)){	
					
					$q = "UPDATE kuptmparcelinfo SET id= '$id',  name = '$n',trackingno = '$tn',  dateArrive='$da', courier='$c', status = '$s' WHERE id= '$id' LIMIT 1";						
					$result = @mysqli_query($connect, $q);
					header('location: kuptmViewParcel.php'); //redirect to index page after inserted
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
    
    	<?php include("topbanner.html" );?><!--top nav-->
        
       	<div class="edit-header">
        <div class="container">
        	<center><b><h1><u>Edit Parcel</u></h1></b></center>
     
        	<form id="loginform" method="post" action="kuptmEditParcel.php">
            
            <?php
					$id = $_GET["id"];
					$q = "SELECT * FROM kuptmparcelinfo WHERE id = $id LIMIT 1";
						
					$result = @mysqli_query($connect, $q);
						
					//get admin information
					$row = mysqli_fetch_array($result, MYSQLI_NUM);	
			?>

            <div class="input-group">
                <label>Id</label>
                <input type="text" id="id" name="id" value="<?php 
					echo $row["0"];?>" />
            </div>
            <div class="input-group">
                <label>Tracking No.</label>
                <input type="text" id="tracking" name="trackingno" value="<?php 
					echo $row["2"];?>" />
            </div>
            
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row["1"];?>" />
            </div>           
            
            <div class="input-group">
                <label>Date Arrive</label>
                <input type="text" name="dateArrive" id="date" value="<?php 
					echo $row["3"];?>" />
            </div>
            
            <div class="input-group">
                <label><b>Courier</b></label>
      					<select name="courier" id="courier">
    						<option>PosLaju</option>
    						<option>FedEx</option>
                            <option>Ninja Van</option>
                            <option>DHL</option>
                         </select><br />
            </div>
            
            <div class="input-group">
                <label><b>Status</b></label>
      					<select name="status" id="status">
    						<option>UNCOLLECTED</option>
    						<option>COLLECTED</option>               
                         </select><br />
            </div>
            
            
            <div class="input-group">
                <center><button type="submit" class="btn_login" name="edit">Update</button>
                <button type="button" class="btn_login" name="back" style="background-color:red;"><a href="kuptmViewParcel.php" style="text-decoration:none; color:white;">Cancel</a></button></center>
            </div>
		</form>
        
		<?php 		
	mysqli_close($connect);
		?>
      </div>
        </div><!--end edit-->
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div><!--Main div-->
</body>
</html>