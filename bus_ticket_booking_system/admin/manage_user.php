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
$query=mysqli_query($connect,"SELECT `user_id` FROM `user_details` WHERE `user_id`='$val'") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$aid=$row['user_id'];
if($aid!=NULL)
{
    $query=mysqli_query($connect,"DELETE FROM `user_details` WHERE `user_id`=$val ") or die(mysqli_error($conn));

 
	echo '<script>alert("Given User id Deleted successfully")</script>';  
    
	
}

else
    {
	       echo '<script>alert("Given User ID not exists")</script>';  
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
   <form action="manage_user.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back"><br><br>

  <div class="full">
<center><h2>User List</h2></center>
<table style="width:100%">

  <tr>
     <th><font color="yellow">S.NO</font></th>
<th><font color="yellow">USER ID</font></th>
	 <th><font color="yellow">NAME</font></th> 
 <th><font color="yellow">EMAIL</font></th>
	 <th><font color="yellow">CONTACT NO</font></th>
    <th><font color="yellow">ADDRESS</font></th> 
    <th><font color="yellow">AADHAR NO</font></th>
    
  </tr>
  
                <?php  

				 
				 $query=mysqli_query($connect,"SELECT * FROM `user_details` WHERE 1 ") or die(mysqli_error($connect));
                 $x=1;
				 
while($row=mysqli_fetch_array($query))
{
    
    $user_id=$row['user_id'];
    $name=$row['name'];
	$email=$row['email'];
	$contact=$row['contact'];
    $address= $row['address'];
    $aadharno=$row['aadharno'];
	 echo" <tr>
     <td>$x</td>
    <td>$user_id</td>
	<td>$name</td>";
	
					 echo" 
	<td>$email</td>
    <td>$contact</td>
    <td>$address</td>
    <td>$aadharno</td>
	
  </tr>";
  $x+=1;
  

}
?> 
</table>

</div><br><br><form method=POST action="manage_user.php">
User ID :&nbsp&nbsp&nbsp&nbsp<input type="text" name="val">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="delete" class="button" value="Delete"><br><br>
<input type="submit" name="deleteall" class="button" value="Delete All"><br><br>

</body>
</html>