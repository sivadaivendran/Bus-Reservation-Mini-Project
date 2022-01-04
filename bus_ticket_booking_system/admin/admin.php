<?php

if(isset($_GET['history']))
{
    header("location:history.php");
}


if(isset($_GET['user']))
{
    header("location:manage_user.php");
}
if(isset($_GET['buses']))
{
    header("location:manage_buses.php");
}

if(isset($_GET['request']))
{
    header("location:requests.php");
}

if(isset($_GET['providers']))
{
    header("location:manage_providers.php");
}
if(isset($_GET['transaction']))
{
    header("location:transaction.php");
}
if(isset($_GET['logout']))
{
    header("location:index.php");
}


?>
<html>
    <link href="admin.css" type="text/css" rel="stylesheet">
     <meta http-equiv="refresh"content="10">
    <title>
       Admin
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
    <body>
	
	<form method="GET" action="admin.php">
	
     <input type="submit" class="button" name="logout" value="Log Out">

	 
	 <div class="content1">
	    <input type="submit" class="button" name="providers" value="Manage Providers">

</div>

	</form>
    <h1><center>ADMIN PANEL</center></h1><br>
     <hr><br><br>
    <div class="d">
       
        <div class="d1">
     <input type="image" src="user.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="admin.php">
    &nbsp&nbsp<input type="submit" class="button" name="user" value="MANAGE USER">
            </form>
            
    </div>
	&nbsp&nbsp&nbsp&nbsp
    <div class="d2">
        
        &nbsp&nbsp&nbsp <input type="image" src="bus.png" name="img" value="d2" width="170" height="250"><br><br>
        <form method="GET" action="admin.php">
             <input type="submit" class="button" name="buses" value="MANAGE BUSES">
            </form>
			
        </div>

            
    </div>
		  &nbsp&nbsp&nbsp&nbsp
        <div class="d3">
    &nbsp&nbsp<input type="image" src="request.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="admin.php">
    <input type="submit" class="button" name="request" value="REQUESTS">
            </form>
           
    </div>
	 
        &nbsp&nbsp&nbsp&nbsp
        <div class="d4">
    &nbsp&nbsp<input type="image" src="transaction.png" name="img" value="d1" width="170" height="250"><br><br>
     <form method="GET" action="admin.php">
    <input type="submit" class="button" name="history" value="TRANSACTION">
            </form>
           
    </div>
	
	</div>
	<br>

    </body><hr>
    </html>
