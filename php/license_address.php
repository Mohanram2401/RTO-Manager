<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");

    
    $conn=mysqli_connect("localhost","root","","rto");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
	
    @mysqli_select_db($conn, "rto");

	
	 $u_id=$_SESSION['u_id'];
	
        
       $result=mysqli_query($conn,"SELECT aadhar_no FROM licen where aadhar_no='$u_id' ");
        $q2=mysqli_fetch_assoc($result);
        $a_no=$q2['aadhar_no'];
		
		if(!$u_id == $a_no)
		{
			 
		header("location:alert_license.php");
		}
		else{
      
	
	
	if(isset($_POST['reset'])){
		
		
		 $talluk=$_POST['talluk'];
		 $house_no=$_POST['house_no'];
		 $village=$_POST['village'];
		 $city=$_POST['city'];
		 $pincode=$_POST['pincode'];
		 $a_no=$_POST['a_no'];
		 if($a_no == $u_id){
		 
			 $result3=mysqli_query($conn,"UPDATE license SET talluk = '$talluk' , house_no = '$house_no' , village = '$village' , city = '$city' , pincode = '$pincode'  WHERE aadhar_no = '$u_id' ");
			 if($result3){
				 $message = "address changed";
        echo "<script type='text/javascript'>alert('$message');</script>";
			 }
	}
	else{
		$message = "not changed ...please enter correct aadhar no";
        echo "<script type='text/javascript'>alert('$message');</script>";
	
		}}}
			
?>
<html lang="en">
<head>
<title>TamilNadu RTO</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/ll.css">
<link rel="stylesheet" type="text/css" href="../css/ll2.css">
<link rel="stylesheet" type="text/css" href="../css/vehicle_mobile_update.css">
</head>
<body>
<form action="#" method="post" enctype="multipart/form-data">
<div class="top-line"> 
</div>
<header>
<div class="img_1">
<img src="../pictures/road.jfif" width = "200" height = "75">
</div>
<img src="../pictures/emblem.png" width = "70" height = "75">
<h2>E</h2>
<h3>Service</h3>
<div class="line-one">
</div>
<h1>Government of TamilNadu</h1>
<h4>Transport Commissionerate and State Transport Authority</h4>
<nav class="nav">
<ul class="nav-area">
	<li><a href="service.php">Dashboard</a></li>
	<li><a href="about us.php">About Us</a></li>
	<li><a href="externallink.php">External Links</a></li>
	<li><a href="contact.php">Contact Us</a></li>
	<li><a href="userlogout.php">Logout</a></li>
	</ul>
	</nav>

</header>


<div class="zero"></div>
<div class="image">
<img src="../pictures/transport.jfif" width = "33%" height = "110">
<img src="../pictures/transport3.jpg" width = "33.4%" height = "110">
<img src="../pictures/transport2.jfif" width = "33%" height = "110">
</div>


<div class="mobile">
		
	
	<label><input type="text" class="input-field" required="" placeholder="enter aadhar no" name="a_no" value="" /></label>
	
	<label><input type="text" class="input-field" required="" placeholder="enter new talluk" name="talluk" value="" /></label>
	
	<label><input type="text" class="input-field" required="" placeholder="enter new village" name="village" value="" /></label>
	
	<label><input type="text" class="input-field" required="" placeholder="enter new city" name="city" value="" /></label>
	
	<label><input type="text" class="input-field" required="" placeholder="enter new house no" name="house_no" value="" /></label>
	
	<label><input type="text" class="input-field" required="" placeholder="enter new pincode" name="pincode" value="" /></label>
	
	<label> <input type="submit" name="reset" value="update" </label>
	
	</div>
	</form>
</body>
</html>