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
   <form action="history.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back"><br><br>

  <div class="full">
<center><h2>Booking History</h2></center>
<table style="width:100%">

  <tr>
     <th><font color="yellow">S.NO</font></th>
<th><font color="yellow">BOOKING ID</font></th>
	 <th><font color="yellow">USER NAME</font></th> 
 <th><font color="yellow">AADHAR NO</font></th>
	 <th><font color="yellow">USER CONTACT</font></th>
    
	<th><font color="yellow">PROVIDER ID</font></th>
	 <th><font color="yellow">COMPANY NAME</font></th> 
 <th><font color="yellow">EMAIL</font></th>
	 <th><font color="yellow">PROVIDER CONTACT</font></th>
    
	
	<th><font color="yellow">BUS ID</font></th> 
    <th><font color="yellow">BUS NO</font></th>
    
    <th><font color="yellow">FROM</font></th>
    
    <th><font color="yellow">TO</font></th>
    <th><font color="yellow">DEPARTURE DATE</font></th> 
    <th><font color="yellow">TRAVEL END DATE</font></th>
    <th><font color="yellow">DEPARTURE TIME</font></th>
    <th><font color="yellow">TRAVEL END TIME</font></th>
	   <th><font color="yellow">CLASS CATEGORY</font></th>
<th><font color="yellow">SEATS BOOKED</font></th>	
<th><font color="yellow">USER AMOUNT</font></th>
<th><font color="yellow">ADMIN COMMISSION</font></th>
<th><font color="yellow">PROVIDER AMOUNT</font></th>
        
  </tr>
  
                <?php  
$query=mysqli_query($connect,"SELECT * FROM `user_id` WHERE 1") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$uid=$row['id'];

				 
				 $query=mysqli_query($connect,"SELECT * FROM `transaction` WHERE `user_id`= '$uid' ") or die(mysqli_error($connect));
                 $x=1;
				 
while($row=mysqli_fetch_array($query))
{
    
    $booking_id=$row['id'];
    $user_name=$row['name'];
	$aadharno=$row['aadharno'];
	$contact=$row['contact'];
	
    $provider_id=$row['provider_id'];
	$company=$row['company'];
	$email=$row['email'];
	$p_contact=$row['p_contact'];
	
	
	$bus_id=$row['bus_id'];
	
	$bus_no=$row['bus_no'];
	
	
	$from=$row['from_place'];
    $to= $row['to_place'];
	
    $ddate=$row['ddate'];
    $adate=$row['adate'];
    $dtime=$row['dtime'];
    $atime=$row['atime'];

    $bseat=$row['bseat'];
	 $total_amount=$row['total_amount'];
	 $commission=$row['commission'];
	  $pamt=$row['pamt'];
	
    $class=$row['class'];
	
	 echo" <tr>
     <td>$x</td>

	 <td>$booking_id</td>
	<td>$user_name</td>";
	echo" 
	<td>$aadharno</td>
    <td>$contact</td>
    <td>$provider_id</td>
    <td>$company</td>
    <td>$email</td>
    <td>$p_contact</td>
    
	
	<td>$bus_id</td>
    <td>$bus_no</td>
	<td>$from</td>
    <td>$to</td>
   
    <td>$ddate</td>
    <td>$adate</td>
    <td>$dtime</td>
	<td>$atime</td>
	
	<td>$class</td>
	<td>$bseat</td>
	<td>$total_amount</td>
	<td>$commission</td>
	<td>$pamt</td>
	
  </tr>";
  $x+=1;
  

}
?> 
</table>

</body>
</html>