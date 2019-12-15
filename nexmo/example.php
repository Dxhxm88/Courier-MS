

<?php

	extract($_POST);
	$database_name = "kuptmcourierms";
    $connect = mysqli_connect("localhost", "root", "", $database_name);

	include ( "src/NexmoMessage.php" );
	
	if(isset($_GET["action"])){
			if($_GET["action"] == "sms"){
				
				$phone = $_GET['nophone'];
				$parcel = $_GET['trackingnum'];
				
				$nexmo_sms = new NexmoMessage('19151637', 'V52uZbsPl706AlDe');
				$info = $nexmo_sms->sendText( $phone, 'CMS', 'Your parcel has arrive, please collect your parcel' );
				
				echo '<script>alert("Message Sent!")</script>';
				echo $nexmo_sms->displayOverview($info);
				
									
			}
		}


	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	//$nexmo_sms = new NexmoMessage('19151637', 'V52uZbsPl706AlDe');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	//$info = $nexmo_sms->sendText( '60172464445', 'Slot888', 'Fad taik' );

	// Step 3: Display an overview of the message
	//echo $nexmo_sms->displayOverview($info);

	// Done!
	
	
	
?>
<html>
	<head>
	<title>Test one</title>
    </head>
    
    <body>
    			<form method="post" action="example.php">
            	
                <legend><h1><b><u>TRACK & TRACE</u></b></h1></legend>
                <br><br><br><center>
   			 	TRACKING NO: <input type="text" name="trackingNo" placeholder="e.g: EN26543986254MY">
    			<input type="submit" name="search" value="Submit" button class="button button1">
   	 			<br><br>
                </form>
                
                <center>
        <table class = "table ">
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
		   	if (isset($_POST['search']))
		{
				$trackingNo = $_POST['trackingNo'];
				
		   		$query = "Select id, trackingnum, name, nophone, dateArrive, courier, statusParcel From parcelinformation Where trackingnum = '$trackingNo' ";
				$result = mysqli_query($connect, $query);
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
							<td><a href="example.php?action=sms&nophone=<?php echo $row['nophone']; ?>">Send message</a></td>
						</tr> 
                             
                        </form>
                              
                        <?php
					}
				}
				else{
					
					header('location: adminhome.php');
					echo '<script>alert("All Parcel Collected!")</script>';
				}
		}
		   ?> 
           </table>
           </center>
                
             
    </body>
    
    
</html>