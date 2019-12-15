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
</head>

<body>
	<div class="main">
    	<?php include("topbanner.html" );?><!--top nav-->
        
        <div class="list">
        	<div class="container">
            	<center><h1><b><u>Collector Information</u></b></h1></center>
            <br />
        <center>
        <table >
        	<tr>
            	<th width="10%">Id</th>
                <th width="13%">Name</th>
                <th width="10%">Tracking No</th>
                <th width="10%">Date Collect</th>
                <th width="10%">Parcel Id</th>
                <th width="10%">Signature</th>               
            </tr>
           
           <?php
		   		$query = "SELECT * FROM kuptmcollectorinfo ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_array($result)){
					?>						
						<tr>                        	
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["trackingno"];?></td>
							<td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["idparcel"]; ?></td> 
                            <td><img src="<?php echo $row["sign"]; ?>" style="width:120px;;padding:5px;"/></td>                          							
						</tr> 
                              
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
        
        <?php include("footer.html"); ?><!--footer-->
    </div>
</body>
</html>