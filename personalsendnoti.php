<?php

	extract($_POST);
	$database_name = "kuptmcourierms";
    $connect = mysqli_connect("localhost", "root", "", $database_name);

	include ( "nexmo/src/NexmoMessage.php" );
	
	if(isset($_GET["action"])){
			if($_GET["action"] == "sms"){
				
				$phone = $_GET['nophone'];;
				
				$nexmo_sms = new NexmoMessage('19151637', 'V52uZbsPl706AlDe');
				$info = $nexmo_sms->sendText( $phone, 'CMS', 'This Kuptm Courier Management System. Your parcel has arrive, please collect your parcel' );
				
				echo '<script>alert("Message Sent!")</script>';	
									
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

        <div class="list">
        	<div class="container">
            	<center><h1><b><u>Send Notification</u></b></h1></center>
            <br />
        <center>
        <table >
        	<tr>
            	<th width="10%">Parcel Id</th>
                <th width="10%">Tracking No</th>
                <th width="13%">Name</th>
                <th width="10%">Phone No</th>
                <th width="10%">Date Arrive</th>
                <th width="10%">Courier</th>
                <th width="10%">Status</th>
                <th width="10%">Send Notification</th>               
            </tr>
           
           <?php
		   		$query1 = "SELECT * FROM parcelinformation WHERE statusParcel = 'UNCOLLECTED'";
				$result = mysqli_query($connect, $query1);
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result)){					
					?>
                        <form method="post" action="personalCollected.php?action=add&id=<?php echo $row["id"]; ?>">
						
						<tr>                        	
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["trackingnum"]; ?></td>
							<td><?php echo $row["name"];?></td>
							<td><?php echo $row["nophone"]; ?></td>
                            <td><?php echo $row["dateArrive"]; ?></td>
                            <td><?php echo $row["courier"]; ?></td>
                            <td><?php echo $row["statusParcel"]; ?></td>
							<td><a href="personalsendnoti.php?action=sms&nophone=<?php echo $row['nophone']; ?>"><i style='font-size:24px' class='far'>&#xf0e0;</i></a></td>
						</tr> 
                             
                        </form>
                              
                        <?php
					}
				}
		   ?> 
                   </table>	
                </div>
            </div><!--end list-->
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div><!--Main div-->
</body>
</html>