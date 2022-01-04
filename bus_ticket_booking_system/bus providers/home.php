<?php
 $connect = mysqli_connect("localhost", "root", "", "bus_ticket_booking_system");  
 
 
if(isset($_GET['history']))
{
    header("location:history.php");
}
if(isset($_GET['add']))
{
    header("location:add_buses.php");
}
if(isset($_GET['manage']))
{
    header("location:manage.php");
}

if(isset($_GET['status']))
{
    header("location:status.php");
}

if(isset($_GET['booking']))
{
    header("location:bookings.php");
}
if(isset($_GET['logout']))
{
				$query=mysqli_query($connect,"UPDATE `bus_id` SET `id`=0 WHERE 1 ") or die(mysqli_error($conn));
     
    header("location:index.php");
}


?>
<html>
    <link href="home.css" type="text/css" rel="stylesheet">
     <meta http-equiv="refresh"content="10">
    <title>
       Bus
    </title>
	<style>     
hr { 
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 10px;
} </style>
<div class="content1">
	
	
	</div>
    <body>
	<form method="GET" action="home.php">
	
     <input type="submit" class="button" name="logout" value="Log Out">
	</form>
	
	
	
    <h1><center>Bus Providers PANEL</center></h1><br>
     <hr><br><br>
    <div class="d">
       
        <div class="d1">
     <input type="image" src="add.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="home.php">
    &nbsp&nbsp<input type="submit" class="button" name="add" value="ADD Buses">
            </form>
            
    </div>
	&nbsp&nbsp&nbsp&nbsp
    <div class="d2">
        
        &nbsp&nbsp&nbsp <input type="image" src="manage.png" name="img" value="d2" width="170" height="250"><br><br>
        <form method="GET" action="home.php">
             <input type="submit" class="button" name="manage" value="Manage Buses">
            </form>
        </div>
		  &nbsp&nbsp&nbsp&nbsp
        <div class="d3">
    &nbsp&nbsp<input type="image" src="status.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="home.php">
    <input type="submit" class="button" name="status" value="Status Update">
            </form>
           
    </div>
	  &nbsp&nbsp&nbsp&nbsp
        <div class="d4">
    &nbsp&nbsp<input type="image" src="bookings.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="home.php">
    <input type="submit" class="button" name="history" value="Bookings">
            </form>
            
    </div>
        &nbsp&nbsp&nbsp&nbsp
    </div>
	<br>

    </body><hr>
    </html>
