<?php
		session_start();
		$database_name = "kuptmcourierms";
		$connect = mysqli_connect("localhost", "root", "", $database_name);
		
		if(isset($_GET["action"])){
			if($_GET["action"] == "delete"){
				$id = $_GET['id'];
				
				//make the query 
				$q = "DELETE FROM parcelinformation WHERE id = $id LIMIT 1";
				$result = @mysqli_query ($connect, $q);	
				echo '<script>alert("Parcel Deleted!")</script>';
									
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
                        <a href="personalCollected.php">Collected Parcel</a>
                        <a href="personalUncollected.php">Uncollected Parcel</a>
                        <a href="ViewAll.php">View All</a>
                    </div>
                </li>
                <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">KUPTM Parcel</a>
                <div class="dropdown-content">
                    	<a href="#">Add</a>
                        <a href="#">Collected Parcel</a>
                        <a href="#">Uncollected Parcel</a>
                        <a href="#">View All</a>
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
                <th width="10%">Remove Parcel</th>                
            </tr>
           
           <?php
		   		$query = "SELECT * FROM parcelinformation WHERE statusParcel = 'COLLECTED' ";
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
							<td><a href="personalCollected.php?action=delete&id=<?php echo $row["id"]; ?>"><i class='far fa-trash-alt' style='font-size:18px'></i></a></td>
						</tr> 
                             
                        </form>
                              
                        <?php
					}
				}
				else{
					
					header('location: adminhome.php');
					echo '<script>alert("All Parcel Collected!")</script>';
				}
		   ?> 
           </table>
           </center>
        
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
        
    </div><!--Main div-->
</body>
</html>