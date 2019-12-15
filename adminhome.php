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
        
        <div class="searchParcel">
        <div class="container">
        
        	<form action="adminhome.php" method="post">
                <br /><center><h1><b><u>SEARCH PARCEL</u></b></h1><br>
                TRACKING NO: <input type="text"  id="tracking" name="trackingNo" placeholder="e.g: EN26543986254MY">
                <input type="submit" name="search" value="Search" button class="btnsubmit"><br>
                <A STYLE="background-color: yellow" HREF="ViewAll.php">View All Parcel</A><br><br><br><br></center>
    		</form>
            <center>
            <?php

		if (isset($_POST['search']))
		{
				extract($_POST);
			$database_name = "kuptmcourierms";
			$connect = mysqli_connect("localhost", "root", "", $database_name);
			
			if(!empty ($_POST['trackingNo'])){
			$t = mysqli_real_escape_string($connect,$_POST['trackingNo']);
			}
			else{
				$t= FALSE;
				echo '<script>alert("Wrong Tracking Number")</script>';
			}
		
			if($t){
			
			$query ="Select id, trackingnum, name, nophone, dateArrive, courier, statusParcel From parcelinformation Where trackingnum = '$trackingNo' limit 1";
			$result= mysqli_query($connect, $query);
			
			if(@mysqli_num_rows ($result) == 1){
				
				print("<table>");
				print("<th>ID Parcel </th> <th>Tracking No </th> <th> Name </th> <th> Phone No </th> <th> Date arrive </th> <th> Courier</th> <th> status Parcel </th>");
		
		
				while ($row = mysqli_fetch_row($result)){
					print("<tr>");
					foreach ($row as $field){
						print("<td> $field </td>");
					}
					print("</tr>");
				}
			}else{
				echo '<script>alert("Your Parcel has not arrived!")</script>';
			}
	
			}else{
				echo '<script>alert("Please try again")</script>';
			}
		}

			?>
			</table><br /></fieldset></center><br /><br />
						
        </div>
        </div><!--end searchParcel-->
        
        <?php include("footer.html"); ?><!--footer-->
        
    </div><!--Main div-->
</body>
</html>