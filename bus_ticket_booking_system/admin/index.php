<?php

session_start();
$user="root";
$password="";
$db="bus_ticket_booking_system";
$conn=new mysqli("localhost",$user,$password,$db) or die("not connected");

if(isset($_GET['login']))
{
if((isset($_GET['admin']))&&(isset($_GET['pswd'])))
{
	
	    $id=$_GET['admin'];
    $pswd=$_GET['pswd'];
    
  $query=mysqli_query($conn,"SELECT * FROM `admin` WHERE  `admin_id`='$id' && `password`='$pswd'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($query);
  
  $username=$row['admin_id'];
  $password=$row['password'];
  
if(($username==$id)&&($password==$pswd))
{
	header("location:admin.php");
	
}
else {
  $message = "Admin ID or Password invalid.";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
  
}
else {
  $message = "Please fill all fields";
  echo "<script type='text/javascript'>alert('$message');</script>";
}

}
  
 

 
 
?>
<html>
<link href="index.css" type="text/css" rel="stylesheet">
<body>
		<h2><center>Admin Portal</center></h2>
	<div class="main">
	
	
	<div class="content">
		<div id="content1">
			<form method="GET" action="index.php"><br><br>
			<center><label1>Admin Id</label1>:<input id="text" type="text" name="admin" maxlength="10" value=""placeholder="Admin id"><br><br>
			<label1>Password</label1>:<input id="text" type="password" name="pswd" maxlength="10" value=""placeholder="Password"><br><br><br>
		</center>	<center><input type="submit" class="button"  name="login" value="Login"></center>
		</div>
		<div id="content2">
		</div>
	</div>
	</div>
</body>
</html>