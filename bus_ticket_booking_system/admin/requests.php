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
<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.js" type="text/javascript"></script> 
		<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.ui.draggable.js" type="text/javascript"></script> 
		<script src="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.alerts.js" type="text/javascript"></script> 
		<link href="http://labs.abeautifulsite.net/projects/js/jquery/alerts/demo/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 

</head>
<body>
    
<link href="manage_user.css" type="text/css" rel="stylesheet">
   <form action="requests.php" method ="POST">

  <input type="submit" class="button" name="back" value="Back">

  <div class="full">
<center><h2>REQUESTS</h2></center>
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
    
    <th><font color="yellow">TRAVEL END DATE</font></th>
    <th><font color="yellow">DEPARTURE TIME</font></th> 
    <th><font color="yellow">TRAVEL END TIME</font></th>
	
    <th><font color="yellow">FIRST CLASS SEATS</font></th>
    <th><font color="yellow">SECOND CLASS SEATS</font></th>
<th><font color="yellow">FIRST CLASS AMOUNT</font></th>	
<th><font color="yellow">SECOND CLASS AMOUNT</font></th>
<th><font color="yellow">ACCEPTANCE</font></th>		
	
  </tr>
  
                <?php  
			$query=mysqli_query($connect,"SELECT * FROM `provider_id` WHERE 1 ") or die(mysqli_error($connect));
                 $row=mysqli_fetch_array($query);
                 $cid=$row['id'];
				 
				 $query=mysqli_query($connect,"SELECT * FROM `provider` WHERE `id`='$cid' ") or die(mysqli_error($connect));
                 $row=mysqli_fetch_array($query);
                 $company=$row['company'];
				 
				 $query=mysqli_query($connect,"SELECT * FROM `schedule` WHERE `company`= '$company' && `status` = 'Not Accepted' && `st` = 0 ") or die(mysqli_error($connect));
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
    $fseat=$row['fseat'];
	
    $sseat=$row['sseat'];
    $famount=$row['famount'];
    $samount=$row['samount'];
    $status=$row['status'];
	$st=$row['st'];
	
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
	            
				<td>$fseat</td>
				<td>$sseat</td>
				<td>$famount</td>
                <td>$samount</td>
	
	
<td><form method=\"POST\" action=\"requests.php\"><input type=\"submit\" name=\"$bus_id\" value=\"Accept\"onClick=\"document.location.reload(true)\">
	</td>
	</tr>";
	
	if((isset($_POST[$bus_id])))
{
	$query=mysqli_query($connect,"UPDATE `schedule` SET `status`='Accepted' WHERE `id`= '$bus_id' ") or die(mysqli_error($connect));
	
echo ' <script language="javascript" type="text/javascript">
alert("Acceptance status updated successfully");
parent.document.location="requests.php";
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
