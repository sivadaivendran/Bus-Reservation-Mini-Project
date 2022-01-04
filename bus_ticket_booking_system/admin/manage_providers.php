<?php

session_start();
$user="root";
$password="";
$db="bus_ticket_booking_system";
$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");

if(isset($_POST['back']))
{
    header("location:admin.php");
}
if(isset($_POST['delete']))
{
if(isset($_POST['val']))
{
    $val=$_POST['val'];
$query=mysqli_query($connect,"SELECT * FROM `provider` WHERE `id`='$val'") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$aid=$row['id'];
$company=$row['company'];
if($aid!=NULL)
{
	$query=mysqli_query($connect,"DELETE FROM `schedule` WHERE `company`='$company' ") or die(mysqli_error($connect));

    $query=mysqli_query($connect,"DELETE FROM `provider` WHERE `id`='$val' ") or die(mysqli_error($connect));

 
	echo '<script>alert("Given Provider id and its Buses Deleted successfully")</script>';  
    
	
}

else
    {
	       echo '<script>alert("Given Provider ID not exists")</script>';  
    }
	
	}
}


if(isset($_POST['deleteall']))
{
    $query=mysqli_query($connect,"DELETE FROM `user_details` WHERE 1 ") or die(mysqli_error($connect));

 
	echo '<script>alert("All User id Deleted successfully")</script>';  
    
	}

?>

<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>
    
<link href="manage_user.css" type="text/css" rel="stylesheet">
   <form action="manage_providers.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back"><br><br>

  <div class="full">
<center><h2>Providers List</h2></center>
<table style="width:100%">

  <tr>
     <th><font color="yellow">S.NO</font></th>
<th><font color="yellow">PROVIDER ID</font></th>
	 <th><font color="yellow">COMPANY NAME</font></th> 
 <th><font color="yellow">EMAIL</font></th>
	 <th><font color="yellow">CONTACT NO</font></th>
    <th><font color="yellow">ADDRESS</font></th> 
    <th><font color="yellow">BANK</font></th>
    <th><font color="yellow">ACCOUNT NO</font></th>
    <th><font color="yellow">IFSC</font></th>
    
  </tr>
  
                <?php  

				 
				 $query=mysqli_query($connect,"SELECT * FROM `provider` WHERE 1 ") or die(mysqli_error($connect));
                 $x=1;
				 
while($row=mysqli_fetch_array($query))
{
    
    $provider_id=$row['id'];
    $company_name=$row['company'];
	$email=$row['email'];
	$contact=$row['contact'];
    $address= $row['address'];
    $bank=$row['bank'];
	$accountno=$row['accountno'];
	$ifsc=$row['ifsc'];
	 echo" <tr>
     <td>$x</td>
    <td>$provider_id</td>
	<td>$company_name</td>";
	
					 echo" 
	<td>$email</td>
    <td>$contact</td>
    <td>$address</td>
    <td>$bank</td>
	<td>$accountno</td>
	<td>$ifsc</td>
  </tr>";
  $x+=1;
  

}
?> 

</table>

</div><br><br><form method=POST action="manage_provider.php">
PROVIDER ID :&nbsp&nbsp&nbsp&nbsp<input type="text" name="val">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="delete" class="button" value="Delete"><br><br>

</body>
</html>