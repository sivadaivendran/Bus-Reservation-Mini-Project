
<?php  
 $connect = mysqli_connect("localhost", "root", "", "bus_ticket_booking_system");  
 
 if(isset($_POST["back"])) 
 {
	 header("location:home.php");
	 
 }
 $busnoErr = $fromErr = $toErr = $ddErr = $dtErr = $tedErr = $tetErr = $fcErr = $scErr = $fcErr = $fcaErr = $scaErr = "";

 
 if(isset($_POST["insert"]))  
 {  
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
	
  
  if (empty($_POST["busno"])) {
    $busnoErr = "Bus No is requiered";
  } else {
    $busno = ($_POST["busno"]);//test_input
    // check if URL address syntax is valid
   	$busnoErr=".";

  }
  
  if (empty($_POST["from"])) {
    $fromErr = "From Place is required";
  } else {
    $from = ($_POST["from"]);
    // check if name only contains letters and whitespace
   
	$fromErr = ".";
	
  }
  if (empty($_POST["to"])) {
    $toErr = "To Place is required";
  } else {
    $to = ($_POST["to"]);
    // check if name only contains letters and whitespace
   
	$toErr = ".";
	
  }

  if (empty($_POST["ddate"])) {
    $ddErr = "Departure Date is requiered";
  } else {
    $ddate = ($_POST["ddate"]);//test_input
  	$ddErr=".";
  }
  
if (empty($_POST["dtime"])) {
    $dtErr = "Departure Time is required";
  } else {
    $dtime = ($_POST["dtime"]);
	$dtErr = ".";
  }
  
  if (empty($_POST["adate"])) {
    $tedErr = "Travel End Date is requiered";
  } else {
    $adate = ($_POST["adate"]);//test_input
  	$tedErr=".";
  }
  
if (empty($_POST["atime"])) {
    $tetErr = "Travel End Time is required";
  } else {
    $atime = ($_POST["atime"]);
	$tetErr = ".";
  }
  
  if (empty($_POST["fseat"])) {
    $fcErr = "First Class Seat Count is requiered";
  } else {
    $fseat = ($_POST["fseat"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$fseat)) {
      $fcErr = "Invalid Seat Count";
    }    
	else
	{
		$fcErr=".";
		
	}
  }

  if (empty($_POST["sseat"])) {
    $scErr = "Second Class Seat Count is requiered";
  } else {
    $sseat = ($_POST["sseat"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$sseat)) {
      $scErr = "Invalid Seat Count";
    }    
	else
	{
		$scErr=".";
		
	}
  }
if (empty($_POST["famount"])) {
    $fcaErr = "First Class Seat Ticket Amount is requiered";
  } else {
    $famount = ($_POST["famount"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$famount)) {
      $fcaErr = "Invalid Seat Amount";
    }    
	else
	{
		$fcaErr=".";
		
	}
  }

if (empty($_POST["samount"])) {
    $scaErr = "Second Class Seat Ticket Amount is requiered";
  } else {
    $samount = ($_POST["samount"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$samount)) {
      $scaErr = "Invalid Seat Amount";
    }    
	else
	{
		$scaErr=".";
		
	}
  }
  


if(($file!=NULL))         	
{
if(($busnoErr==".")&&($fromErr==".")&&($toErr==".")&&($ddErr==".")&&($dtErr==".")&&($tedErr==".")&&($tetErr==".")&&($fcErr==".")&&($scErr==".")&&($fcaErr==".")&&($scaErr=="."))	
{

$query=mysqli_query($connect,"SELECT `id` FROM `provider_id` WHERE 1") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$sid=$row['id'];

$query=mysqli_query($connect,"SELECT * FROM `provider` WHERE `id`='$sid' ") or die(mysqli_error($connect));
$row=mysqli_fetch_array($query);
$company=$row['company'];


 $query1 = "INSERT INTO `schedule`(`company`, `busno`, `from`, `to`, `ddate`, `dtime`, `adate`, `atime`, `fseat`, `sseat`, `famount`,`samount`, `status`, `image`, `st`) VALUES  ('$company','$busno','$from','$to','$ddate','$dtime','$adate','$atime','$fseat','$sseat','$famount','$samount','Not Accepted','$file',0)";  
  //$query2=mysqli_query($connect, $query1) or die(mysqli_error($connect));
if($from!=$to)
{
if(mysqli_query($connect, $query1))  
      {  
        
   $query=mysqli_query($connect,"SELECT `id` FROM `schedule` WHERE `busno`='$busno' && `from`='$from' && `to`='$to' && `ddate` ='$ddate' && `dtime`='$dtime' && `adate`='$adate' && `atime`='$atime' && `fseat`= '$fseat' ") or die(mysqli_error($conn));

$row=mysqli_fetch_array($query);
$id=$row['id'];
$bus_id=141000+$id;
$query=mysqli_query($connect,"UPDATE `schedule` SET `id`='$bus_id' WHERE `id`='$id'") or die(mysqli_error($conn));
echo ' <script language="javascript" type="text/javascript">
alert("Bus details uploaded successfully and Bus ID is '.$bus_id.' ,Thankyou");
parent.document.location="add_buses.php";
</script>';

}

else{
	echo ' <script language="javascript" type="text/javascript">
alert("Please fill all fields");
parent.document.location="add_buses.php";
     </script>';


}
}

else{
	echo ' <script language="javascript" type="text/javascript">
alert("From and To are same please select different");
parent.document.location="add_buses.php";
     </script>';

	
}

}
}
else{
	echo ' <script language="javascript" type="text/javascript">
alert("Please attach a image file");
parent.document.location="add_buses.php";
     </script>';

	}
}
	
 ?>
 
 <!DOCTYPE html>  
 <html>  
      
	  <head>
     <link href="add_buses.css" type="text/css" rel="stylesheet">
    
	     <title>Add Buses</title>
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
<form method="POST" action="add_buses.php">
	
     <input type="submit" class="button" name="back" value="Back">
	 </form>
	
 <h3 align="center" color="red">Add Buses</h3>  	 
	 </head>  
      <body>  
          
		   
		 
    
     <br />  <hr><br><br>
     <form method="post" enctype="multipart/form-data" id="form" >  
     <div class="full">
     <div class="part">
         <label>Bus Number</label>:<input type="text" name="busno">
		 <span class="error">* <?php echo $busnoErr;?></span>
  
		 <br><br>


	     <label>From</label>:
  <select name="from" form="form">
  <option value="Tirunelveli(New Bus Stand)">Tirunelveli(New Bus Stand)</option>
  <option value="Chennai(koyambedu)">Chennai(koyambedu)</option>
  <option value="Tiruchirappalli">Tiruchirappalli</option>
  <option value="Bangalore(Kempegowda Bus Station)">Bangalore(Kempegowda Bus Station)</option>
  <option value="Mumbai(MSRTC Mumbai Central)">Mumbai(MSRTC Mumbai Central)</option>
  <option value="Tirupati">Tirupati</option>
   </select>
  <span class="error">* <?php echo $fromErr;?></span>
  
  <br><br>
  
   
<label>To</label>:
<select name="to" form="form">
  <option value="Tirunelveli(New Bus Stand)">Tirunelveli(New Bus Stand)</option>
  <option value="Chennai(koyambedu)">Chennai(koyambedu)</option>
  <option value="Tiruchirappalli">Tiruchirappalli</option>
  <option value="Bangalore(Kempegowda Bus Station)">Bangalore(Kempegowda Bus Station)</option>
  <option value="Mumbai(MSRTC Mumbai Central)">Mumbai(MSRTC Mumbai Central)</option>
  <option value="Tirupati">Tirupati</option>
  </select>
<span class="error">* <?php echo $toErr;?></span>
   
 <br><br>
  
            <label>Departure Date</label>:<input type="date" name="ddate">
            <span class="error">* <?php echo $ddErr;?></span>
  <br><br>
			<label>Departure Time</label>:<input type="time" name="dtime">
			<span class="error">* <?php echo $dtErr;?></span>
			<br><br>
            <label>Travel End Date</label>:<input type="date" name="adate">
			<span class="error">* <?php echo $tedErr;?></span>
			<br><br>
            
			<label>Travel End Time</label>:<input type="time" name="atime">
			<span class="error">* <?php echo $tetErr;?></span>
			<br><br>
			  <label>First Class Seats(Sleeper)</label>:<input type="text" name="fseat">
			  <span class="error">* <?php echo $fcErr;?></span>
			  <br><br><br>
            <label>Second Class Seats(Semi Sleeper)</label>:<input type="text" name="sseat">
			<span class="error">* <?php echo $scErr;?></span>
			<br><br><br>
            <label>First Class Amount(Sleeper)</label>:<input type="text" name="famount">
			<span class="error">* <?php echo $fcaErr;?></span>
			<br><br><br>
			
			<label>Second Class Amount(Semi Sleeper)</label>:<input type="text" name="samount">
			<span class="error">* <?php echo $scaErr;?></span>
			<br><br><br>
			      
				  
					 
					<label>Bus Image</label>:<input type="file" name="image" id="image">  
                     <br>  <br>
                     <center><label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="insert" class="button" id="form" value="Insert" >  
             </label></center>   </form>  
                <br>  
                <br>    <br>  
                <br>    
           </div>  </div> 
      </body>  
 </html>  
 
 
<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  