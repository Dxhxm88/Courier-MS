<?php
		session_start();
		$database_name = "kuptmcourierms";
		$connect = mysqli_connect("localhost", "root", "", $database_name);			
		
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
        
        <div class="pickup">
            	<div class="container">
                	<center><h1><u><b>Kuptm Pick Up</b></u></h1></center><br />
                	<table >
                        <tr>
                            <th width="10%">Parcel Id</th>
                            <th width="13%">Name</th>
                            <th width="10%">Tracking No</th>                           
                            <th width="10%">Date Arrive</th>
                            <th width="10%">Courier</th>
                            <th width="10%">Status</th>
                            <th width="10%">Pickup</th>                
                        </tr>
           
           <?php
		   		$query1 = "SELECT * FROM kuptmparcelinfo WHERE status = 'UNCOLLECTED'";
				$result = mysqli_query($connect, $query1);
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result)){
					?>
                        <form method="post" action="ViewAll.php?action=add&id=<?php echo $row["id"]; ?>">						
                            <tr>                        	
                                <td><?php echo $row["id"]; ?></td>                                
                                <td><?php echo $row["name"];?></td>
                                <td><?php echo $row["trackingno"]; ?></td>
                                <td><?php echo $row["dateArrive"]; ?></td>
                                <td><?php echo $row["courier"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td><a href="kuptmcollector.php?action=pick&id=<?php echo $row["id"]; ?>">Collect</a></td>
                            </tr>                              
                        </form>
                              
                        <?php
					}
				}
		   ?> 
                   </table>	
                </div>
            </div>
        
        <?php include("footer.html"); ?><!--footer-->
    </div><!--end main-->
</body>
</html>