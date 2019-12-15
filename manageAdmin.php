<?php
		session_start();
		$database_name = "kuptmcourierms";
		$connect = mysqli_connect("localhost", "root", "", $database_name);
		
		if(isset($_GET["action"])){
			if($_GET["action"] == "delete"){
				$id = $_GET['id'];
				
				//make the query 
				$q = "DELETE FROM admininformation WHERE id = $id LIMIT 1";
				$result = @mysqli_query ($connect, $q);	
				echo '<script>alert("Admin Info Deleted!")</script>';
									
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
        
        <div class="manage-admin">
        	<div class="container">
            	<center><h1><u>Manage Admin</u></h1></center>
                
                <table class = "table ">
        	<tr>
            	<th width="10%">Admin Id</th>
                <th width="10%">Admin Name</th>
                <th width="13%">Username</th>
                <th width="10%">Phone No</th>
                <th width="10%">Remove Items</th>
                <th width="8%">Edit Item</th>
            </tr>
           
           <?php
		   		$query = "SELECT * FROM admininformation ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result)){
			?>
                        <form method="post" action="manageAdmin.php?action=add&id=<?php echo $row["id"]; ?>">
						
						<tr>                        	
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["AdminName"]; ?></td>
							<td><?php echo $row["username"];?></td>
							<td><?php echo $row["phone"]; ?></td>
							<td><a href="manageAdmin.php?action=delete&id=<?php echo $row["id"]; ?>" onclick="return confirm('Are sure to delete data?')"><i class='far fa-trash-alt' style='font-size:18px'></i></a></td>
                            <td><a href="editAdmin.php?action=edit&id=<?php echo $row['id']; ?>"><i class='fas fa-cog' style='font-size:18px'></i></a></td>
						</tr> 
                             
                        </form>
                              
           <?php
					}
				}
		   ?> 
           		</table>
                
            </div>
        </div><!--end manageAdmin-->
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div><!--End Main-->
</body>
</html>