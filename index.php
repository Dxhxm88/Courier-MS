<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KUPTM Courier Management System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>

<body>
	<div class="main">
    
    	<div class="bannerTop"><img src="image/banner.png"/></div>
        
        <div class="nav">
        
        	<ul>
            <div class="container">
            	<li><a href="index.php">Home</a></li>
                <li><a href="location.html">Location & Contact</a></li>
                <li><a href="help.html">Help</a></li>
                <li style="float:right"><a href="loginadmin.php">Admin</a></li>
            </div>
            </ul>
            
        </div> <!--End Nav-->
                
        <div class="searchParcel">
			<div class="container">
        	<br />
        	
            <form method="post" action="index.php">
            	
                <center><h1 style="font-family:'Courier New', Courier, monospace"><b>TRACK & TRACE</b></h1>
                    <label>TRACKING NO:</label>
                    <input type="text" id="tracking1" name="trackingNo" placeholder="e.g: EN26543986254MY">
                    <input type="submit" name="search" value="SEARCH" button class="btnsubmit">
                    <br><br>
             
                </form>
                
        
        <center>
        <?php

		if (isset($_POST['search'])){
			
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
		</table><br /></center><br /><br />      
                    
		</div>
				</div><!--search end-->                       
                
        
        <div class="product">
        	<div class="container">
                
                <div class="product_one">
                	<div class="product_img">
                    	<img src="image/poslaju.png" />
                    </div>
                    <div class="product_text">
                    	<h4>PosLaju</h4>
                    </div>           

                    <div class="product_price">                        
                        <div class="button">
                        	<a href="https://www.poslaju.com.my/track-trace-v2">Click Here</a>
                        </div>
                    </div>
                </div>
                
                
           		<div class="product_one product_two">
                	<div class="product_img">
                    	<img src="image/gdex.png" />
                    </div>
                    <div class="product_text">
                    	<h4>GDex</h4>
                    </div>
                   
                    <div class="product_price">                        
                        <div class="button">
                        	<a href="https://www.gdexpress.com/malaysia/e-tracking/">Click Here</a>
                        </div>
                    </div>
                </div>
                
                
             	<div class="product_one product_three">
                	<div class="product_img">
                    	<img src="image/fedex.png" />
                    </div>
                    <div class="product_text">
                    	<h4>FedEx</h4>
                    </div>                    
                    <div class="product_price">
                        
                        <div class="button">
                        	<a href="https://www.fedex.com/us/fedextracking/">Click Here</a>
                        </div>
                    </div>
                </div>
                
                
             	<div class="product_one product_four">
                	<div class="product_img">
                    	<img src="image/citylink.png"/>
                    </div>
                    <div class="product_text">
                    	<h4>City Link Express</h4>
                    </div>                   
                    
                    <div class="product_price">                        
                        <div class="button">
                        	<a href="http://www.citylinkexpress.com/MY/Tracking.aspx">Click Here</a>
                        </div>
                    </div>
                </div>	                                                                  
            </div>
        </div><!--product one-->
        
        
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
        
    </div> <!--Main div-->
</body>
</html>