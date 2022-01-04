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
$query=mysqli_query($connect,"SELECT `id` FROM `schedule` WHERE `id`='$val'") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$aid=$row['id'];
if($aid!=NULL)
{
    $query=mysqli_query($connect,"DELETE FROM `schedule` WHERE `id`=$val ") or die(mysqli_error($conn));

	echo '<script>alert("Given Bus id Deleted successfully")</script>';  
    
	
}

else
    {
	       echo '<script>alert("Given Bus ID not exists")</script>';  
    }
	
	}
}


if(isset($_POST['deleteall']))
{
    $query=mysqli_query($connect,"DELETE FROM `schedule` WHERE 1 ") or die(mysqli_error($conn));

	echo '<script>alert("All Bus id Deleted successfully")</script>';  
    
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
   <form action="manage_buses.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back"><br><br>

  <div class="full">
<center><h2>Buses List</h2></center>
<table style="width:100%">

  <tr>
     <th><font color="yellow">S.NO</font></th>
<th><font color="yellow">BUS ID</font></th>
	 <th><font color="yellow">COMPANY NAME</font></th> 
 <th><font color="yellow">IMAGE</font></th>
	 <th><font color="yellow">BUS NO</font></th>
    <th><font color="yellow">FROM</font></th> 
    <th><font color="yellow">TO</font></th>
    
    <th><font color="yellow">DEPARTURE DATE</font></th>
    
    <th><font color="yellow">TRAVEL END DATE</font></th>
    <th><font color="yellow">DEPARTURE TIME</font></th> 
    <th><font color="yellow">TRAVEL END TIME</font></th>
    <th><font color="yellow">FIRST CLASS SEATS</font></th>
    <th><font color="yellow">SECOND CLASS SEATS</font></th>
<th><font color="yellow">FIRST CLASS AMOUNT</font></th>	
<th><font color="yellow">SECOND CLASS AMOUNT</font></th>
<th><font color="yellow">ADMIN STATUS</font></th>	
<th><font color="yellow">DEPARTURE STATUS</font></th>	
        
  </tr>
  
                <?php  

				 
				 $query=mysqli_query($connect,"SELECT * FROM `schedule` WHERE `status`= 'Accepted' ") or die(mysqli_error($connect));
                 $x=1;
				 
while($row=mysqli_fetch_array($query))
{
    
    $bus_id=$row['id'];
    $company=$row['company'];
	$busno=$row['busno'];
	$from=$row['from'];
    $to= $row['to'];
    $ddate=$row['ddate'];
    $adate=$row['adate'];
    $dtime=$row['dtime'];
    $atime=$row['atime'];
    $fseat=$row['fseat'];
	
    $sseat=$row['sseat'];
    $famount=$row['famount'];
    $samount=$row['samount'];
    $status=$row['status'];
	$st=$row['st'];
    $st1="";
	if($st==0)
		$st="Not Yet Departured";
	else
		$st="Departured";
	
	 echo" <tr>
     <td>$x</td>
    <td>$bus_id</td>
	<td>$company</td>";
	
	 echo '  
                           
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="100" class="img-thumnail" />  
                               </td>  
                           
                     ';  
	
					 echo" 
	<td>$busno</td>
    <td>$from</td>
    <td>$to</td>
    <td>$ddate</td>
    <td>$dtime</td>
    <td>$adate</td>
    <td>$atime</td>
	<td>$fseat</td>
	<td>$sseat</td>
	<td>$famount</td>
	<td>$samount</td>
	<td>$status</td>
	<td>$st</td>
	
  </tr>";
  $x+=1;
  

}
?> 
</table>

</div><br><br><form method=POST action="manage_buses.php">
Bus ID :&nbsp&nbsp&nbsp&nbsp<input type="text" name="val">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="delete" class="button" value="Delete"><br><br>
<input type="submit" name="deleteall" class="button" value="Delete All"><br><br>

</body>
</html>