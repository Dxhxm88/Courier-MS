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
		
		if(isset($_POST["search"])){
			if($_POST['searchParcel'] == "collected"){
				$query1 = "SELECT * FROM parcelinformation WHERE statusParcel = 'COLLECTED'";
			}
			elseif($_POST['searchParcel'] == "uncollected"){
				$query1 = "SELECT * FROM parcelinformation WHERE statusParcel = 'UNCOLLECTED'";
			}
			else{
				$query1 = "SELECT * FROM parcelinformation ORDER BY id ASC";
			}
			
		}
		else{
			$query1 = "SELECT * FROM parcelinformation ORDER BY id ASC";
		}//end search
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
        
        
        <div class="search-parcel" style="text-align:right">
        	<div class="container">
            <center><u><b><H1>View All Parcel</H1></b></u></center>
            <br />
            	<form method="post" action="ViewAll.php">
                	<label>Filter</label>                 
      					<select name="searchParcel">
    						<option>View All</option>
    						<option value="collected">Collected parcel</option>  
                            <option value="uncollected">Uncollected parcel</option>             
                         </select> 
                  	<button type="submit" id="submit" name="search" value="Search" /> <i class='fas fa-filter'></i></button>
                </form>
            </div>
        </div><!--end search parcel-->

        <div class="list">
        	<div class="container">
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
                <th width="10%">Remove Parcel</th> 
                <th width="8%">Edit Item</th>               
            </tr>
           
           <?php
		   		
				$result = mysqli_query($connect, $query1);
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result)){
					?>
                        <form method="post" action="ViewAll.php?action=add&id=<?php echo $row["id"]; ?>">
						
						<tr>                        	
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["trackingnum"]; ?></td>
							<td><?php echo $row["name"];?></td>
							<td><?php echo $row["nophone"]; ?></td>
                            <td><?php echo $row["dateArrive"]; ?></td>
                            <td><?php echo $row["courier"]; ?></td>
                            <td><?php echo $row["statusParcel"]; ?></td>
							<td><a href="ViewAll.php?action=delete&id=<?php echo $row["id"]; ?>" onclick="return confirm('Are sure to delete data?')"><i class='far fa-trash-alt' style='font-size:18px'></i></a></td>
                            <td><a href="personalEditparcel.php?action=edit &id=<?php echo $row['id']; ?>"><i class='fas fa-cog' style='font-size:18px'></i></a></td>
						</tr> 
                             
                        </form>
                              
                        <?php
					}
				}
		   ?> 
                   </table>
                   </center>
                   
                   	<div class="print" style="text-align:right">
                    <div class="container">
                        <button id="hide" onclick="myFunction()">Print this page</button>
        
                        <script>
                        function myFunction() {
							//Get the print button and put it into a variable
							var printButton = document.getElementById("hide");
							//Set the print button visibility to 'hidden' 
							printButton.style.visibility = 'hidden';
							//Print the page content
							window.print()
							//Set the print button to 'visible' again 
							//[Delete this line if you want it to stay hidden after printing]
							printButton.style.visibility = 'visible';                     
                        }
                        </script>
                    </div>
                   </div><!--end print-->
               </div>
           </div><!--end list-->
           
           
        <div id="hide"
        <?php include("footer.html"); ?><!--footer-->
        </div>
</body>
</html>