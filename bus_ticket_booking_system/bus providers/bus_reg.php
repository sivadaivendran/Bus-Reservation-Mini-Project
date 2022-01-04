<?php
session_start();
$user="root";
$password="";
$db="bus_ticket_booking_system";
$conn=new mysqli("localhost",$user,$password,$db) or die("not connected");
$nameErr = $bankErr = $emailErr = $accountnoErr = $companyErr = $addressErr = $contactErr = $ifscErr = "";

if(isset($_POST['back']))
{
    header("location:index.php");
}

if(isset($_POST['submit']))
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = ($_POST["name"]);
    // check if name only contains letters and whitespace
   
	$nameErr = ".";
	
  }
	
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = ($_POST["email"]);//test_input
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
	else{
	   $emailErr = ".";
   	
		
	}
  }
	
  if (empty($_POST["contact"])) {
    $contactErr = "contact is requiered";
  } else {
    $contact = ($_POST["contact"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$contact)) {
      $contactErr = "Invalid Contact";
    }    
	else
	{
		$contactErr=".";
		
	}
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "address is requiered";
  } else {
    $address = ($_POST["address"]);//test_input
  	$addressErr=".";
  }
  
if (empty($_POST["bank"])) {
    $bankErr = "Bank Name is required";
  } else {
    $bank = ($_POST["bank"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$bank)) {
      $bankErr = "Only letters and white space allowed";
    }
	else
	{
	$bankErr = ".";
	}
  }
  
  if (empty($_POST["accountno"])) {
    $accountnoErr = "account no is requiered";
  } else {
    $accountno = ($_POST["accountno"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$accountno)) {
      $accountnoErr = "Invalid accountno";
    }    
	else
	{
		$accountnoErr=".";
		
	}
  }

  if (empty($_POST["ifsc"])) {
    $ifscErr = "IFSC no is requiered";
  } else {
    $ifsc = ($_POST["ifsc"]);//test_input
    // check if URL address syntax is valid
    if (!preg_match("/^[0-9]*$/",$ifsc)) {
      $ifscErr = "Invalid IFSC number";
    }    
	else
	{
		$ifscErr=".";
		
	}
  }
	}

if(($nameErr==".")&&($bankErr==".")&&($emailErr==".")&&($contactErr==".")&&($addressErr==".")&&($accountnoErr==".")&&($ifscErr=="."))	
{
	
$query=mysqli_query($conn,"SELECT `id` FROM `provider` WHERE `company`='$name'") or die(mysqli_error($conn));
$row=mysqli_fetch_array($query);
$cid=$row['id'];
if($cid==NULL)
{
$query=mysqli_query($conn,"INSERT INTO `provider`( `company`, `email`, `contact`, `address`, `bank`, `accountno`, `ifsc`) VALUES ('$name','$email','$contact','$address','$bank','$accountno','$ifsc')") or die(mysqli_error($conn));

$query=mysqli_query($conn,"SELECT `id` FROM `provider` WHERE `company`='$name' && `contact`='$contact'") or die(mysqli_error($conn));

$row=mysqli_fetch_array($query);
$id=$row['id'];
$provider_id=121000+$id;
$query=mysqli_query($conn,"UPDATE `provider` SET `id`='$provider_id' WHERE `id`='$id'") or die(mysqli_error($conn));
echo ' <script language="javascript" type="text/javascript">
alert("Company details uploaded successfully and Company ID is '.$provider_id.' and your contact will be your password,Thankyou");
parent.document.location="bus_reg.php";
</script>';
}
else
{
echo ' <script language="javascript" type="text/javascript">
alert("Company name already exists");
parent.document.location="bus_reg.php";
</script>';}


}
}

?>
<html>
     <link href="bus_reg.css" type="text/css" rel="stylesheet">
     <title> Registration </title>
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
     <form method="POST" action="bus_reg.php" id="form">
     <input type="submit" class="button"  name="back" value="Back">
        <br><br>
        <center><h2>Registration</h2></center><br>
        <hr>
    <br><br>
     
    <div class="full">
    <div class="part">
    <center> <p><span class="error">* required field</span></p></center>

  <label>Company Name</label>:
  <select name="name" form="form">
  <option value="SRS Travels">SRS Travels</option>
  <option value="Parveen Travels">Parveen Travels</option>
  <option value="ARM Travels">ARM Travels</option>
  <option value="SRM Transports">SRM Transports</option>
  <option value="SJT Nellai">SJT Nellai</option>
  <option value="Tippu sultan travels chni">Tippu sultan travels chni</option>
  <option value="Apple Travels">Apple Travels</option>
  </select>
   <span class="error">* <?php echo $nameErr;?></span>

  <br><br><label>Email</label>:<input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
 <br><br>
     <label>Contact No:</label>:<input type="text" maxlength="10" name="contact">
	 <span class="error">* <?php echo $contactErr;?></span>
  
	 <br><br>
     <label>Head Office Address</label>:<input type="text" name="address">
	 <span class="error">* <?php echo $addressErr;?></span>
  
	 <br><br>
	 <label>Bank</label>:
	
<select name="bank" form="form">
 <option value="State Bank of India">State Bank of India</option>
  <option value="Canara Bank">Canara Bank</option>
  <option value="Indian Bank">Indian Bank</option>
  <option value="Indian Overseas Bank">Indian Overseas Bank</option>
  <option value="Tamilnadu Mercandile Bank">Tamilnadu Mercandile Bank</option>
  <option value="HDFC Bank">HDFC Bank</option>
  <option value="KVB Bank">KVB Bank</option>
  </select>
<span class="error">* <?php echo $bankErr;?></span>

  <br><br>
  
     <label>Account No</label>:<input type="text" maxlength="16" name="accountno">
  <span class="error">* <?php echo $accountnoErr;?></span>
<br><br>  
 <label>IFSC Code</label>:<input type="text" maxlength="6" name="ifsc">
  <span class="error">* <?php echo $ifscErr;?></span><br><br>
  
 <br><br>
	   <center><input type="submit" class="button" name="submit" value="submit"></center>
<br><br>
     </div>
    </form>
     </body>
</html>