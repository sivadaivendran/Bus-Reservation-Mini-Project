<?php
$tot=0;
$mtot=0;
session_start();
$user="root";
$password="";
$db="bus_ticket_booking_system";
$connect=new mysqli("localhost",$user,$password,$db) or die("not connected");
$flg=0;
if(isset($_POST['back']))
{
    header("location:home.php");
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
<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.js" type="text/javascript"></script> 
		<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.ui.draggable.js" type="text/javascript"></script> 
		<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.alerts.js" type="text/javascript"></script> 
		<link href="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 

</head>
<body>
    
<link href="manage.css" type="text/css" rel="stylesheet">
   <form action="status.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back">

  <div class="full">
<center><h2>Status Updates</h2></center>
<table style="width:100%">

  <tr>
     <th><font color="yellow">S.NO</font></th>
     <th><font color="yellow">BUS ID</font></th>
	 <th><font color="yellow">COMAPNY NAME</font></th> 
     <th><font color="yellow">IMAGE</font></th>
	 <th><font color="yellow">BUS NO</font></th>
     <th><font color="yellow">FROM</font></th> 
     <th><font color="yellow">TO</font></th>
    
    <th><font color="yellow">DEPARTURE DATE</font></th>
    
    <th><font color="yellow">ARRIVAL DATE</font></th>
    <th><font color="yellow">DEPARTURE TIME</font></th> 
    <th><font color="yellow">ARRIVALTIME</font></th>
   
	<th><font color="yellow">Departure Status</font></th>
	
  </tr>
  
                <?php  
			     $query=mysqli_query($connect,"SELECT * FROM `provider_id` WHERE 1 ") or die(mysqli_error($connect));
                 $row=mysqli_fetch_array($query);
                 $cid=$row['id'];
				 
				 $query=mysqli_query($connect,"SELECT * FROM `provider` WHERE `id`='$cid' ") or die(mysqli_error($connect));
                 $row=mysqli_fetch_array($query);
                 $company=$row['company'];
				 
				 $query=mysqli_query($connect,"SELECT * FROM `schedule` WHERE `company`= '$company' && `status` = 'Accepted' && `st` = 0 ") or die(mysqli_error($connect));
                 $x=1;
				 
while($row=mysqli_fetch_array($query))
{
	
	$bus_id=$row['id'];
    $company=$row['company'];
	$busno=$row['busno'];
	$from=$row['from'];
    $to= $row['to'];
    $ddate=$row['ddate'];
    $dtime=$row['dtime'];
    $adate=$row['adate'];
$atime=$row['atime'];
  
	
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
				<td>$adate</td>
				<td>$dtime</td>
                <td>$atime</td>
	
	
<td><form method=\"POST\" action=\"status.php\"><input type=\"submit\" name=\"$bus_id\" value=\"Departured\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>";
	
	if((isset($_POST[$bus_id])))
{
	$query=mysqli_query($connect,"UPDATE `schedule` SET `st`=1 WHERE `id`= '$bus_id' ") or die(mysqli_error($connect));
	
echo ' <script language="javascript" type="text/javascript">
alert("Departure status updated successfully");
parent.document.location="status.php";
</script>';

break;
}
 $x+=1;
}
?> 
</table>
<br><br>
</body>
</html>
