<?php
session_start();
$user="root";
$password="";
$db="bus_ticket_booking_system";
$conn=new mysqli("localhost",$user,$password,$db) or die("not connected");


if(isset($_GET['providerreg']))
{
header("location:bus_reg.php");	
}

if(isset($_GET['login']))
{
if((isset($_GET['provider']))&&(isset($_GET['pswd'])))
{
	
	    $id=$_GET['provider'];
    $pswd=$_GET['pswd'];
    
  $query=mysqli_query($conn,"SELECT * FROM `provider` WHERE  `id`='$id' && `contact`='$pswd'") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($query);
  
  $name=$row['company'];
  $username=$row['id'];
  $password=$row['contact'];
              // $id=$row['id'];

if(($username!=NULL)&&($password!=NULL))
{
if(($id==$username)&&($pswd==$password))
{
	$query=mysqli_query($conn,"UPDATE `provider_id` SET `id`='$id' ") or die(mysqli_error($conn));
  
echo ' <script language="javascript" type="text/javascript">
alert("Hello . '.$name.' You are logged in");
parent.document.location="home.php";
</script>';} 
else {
  
echo ' <script language="javascript" type="text/javascript">
alert("Provider ID and Password are not matched");
parent.document.location="index.php";
</script>';
}
}
else {
echo ' <script language="javascript" type="text/javascript">
alert("Provider ID or password Invalid");
parent.document.location="index.php";
</script>';
}

}
}
?>

<html>
<link href="index.css" type="text/css" rel="stylesheet">
<body>
	<h2><center>Welcome To Bus Providers Login Page</center></h2>
	<div class="main">
	<input id="tab1" type="radio" name="tabs" checked>
<center>	<label for="tab1"style="font-size:150%;"><u>Log In</u></label></center>
	
	<div class="content">
		<div id="content1">
			<form method="GET" action="index.php">
			<center><img src="bus.png" height="200" width="200"></center><br>
			<center><label1>Provider ID:</label1><input id="text" type="text" maxlength="12" name="provider"  value=""placeholder="Provider ID"><br><br>
			<label1>Password:</label1><input id="text" type="password" name="pswd" maxlength="10" value="" placeholder="Password" ><br><br><br>
		</center>	<center><input type="submit" class="button"  name="login" value="Login"></center>
			<br> <center><input type="submit" class="button"  name="providerreg" value="PROVIDER REGISTRATION"></center>
			</form>
		</div>
		<div id="content2">
		</div>
	</div>
	</div>
</body>
</html>