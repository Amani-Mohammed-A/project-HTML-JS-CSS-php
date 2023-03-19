
<?php
session_start();
global $db;
$GLOBALS['db'] = mysqli_connect('localhost','root', '', 'hospital');


if(isset($_POST['submit']))
{
$msg= user_signup($_POST);
}

?>

<html>
<head> 
<title>patient raigstration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/67b671a0ce.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center" class="navv">
        <div class="container-fluid">
               <a class="navbar-brand" href="#">
               <img src="ksamc.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top"> </a>  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="indexad.php">Home</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href=".\المشروع بالعربي\patientRegistration.php">اللغة العربية </a>
                        
                    </li>
                    <li> <a class="nav-link active" aria-current="page" href="SignOut.php">Sign out</a></li>
                </ul>   
            </div>
        </div>
    </nav>
<section class="bg-grey">

<div class="main">
<div class="container">
<div class="col-md-12">
<div class="form-content-box">
<div class="login-header">
<h3 class="text-center"> Registr paitent </h3>
</div>

<div class="Details">
<form action="" method="post" onsubmit="return validateForm();">
<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="First Name" required>
</div>

<div class="form-group">
<input type="text" name="file" class="form-control" placeholder="File number" pattern=".{4,}" title="The File number must be at least 4 numbers" required>
</div>

<div class="form-group">
<input type="text" class="form-control"  name="phone" placeholder="Phone number" pattern="^(966)(5)([0-9]{8})$" title="The phone number must start with 966 and 12" required>
</div>
<div>
<button  style="
	width: 100%;
	padding: 8px;
	color: #ffffff;
	background: none  #5f90a5;
	border: none;
	border-radius: 6px;
	font-size: 22px;
	cursor: pointer;
	margin: 12px 0;
"type="submit" name="submit" class="btn btn-submit">OK</button>
</div>

</form>
</div>

<div class="login-footer">

</div>
</div>
</div>
</div>
</div>

<section>

<div class="clearfix"></div>

</body>
</html>

<?php

function user_signup($data){

$name = mysqli_real_escape_string($GLOBALS['db'],$data['name']);
$file = mysqli_real_escape_string($GLOBALS['db'],$data['file']);
$phone = mysqli_real_escape_string($GLOBALS['db'],$data['phone']);
$qry=mysqli_query($GLOBALS['db'],"select * from patient where (file='$file' || phone='$phone') ");

if($qry->num_rows >0)
{
    
echo "<script>alert('Email Id or Phone Number already exists.')</script>";
}

else
{
$sql="INSERT INTO patient(Fname,Filenumber,Phonenumber) VALUES('$name','$file','$phone')";
$query=mysqli_query($GLOBALS['db'],$sql) or die("Error 2".mysqli_error($GLOBALS['db']));
if($query)
{
echo "<script>alert('Congratulations!! Registration has been done successfully.')</script>";
echo '<script>window.location.href="adminpage.php";</script>';
}
}
}
?>
<?php
include("footer.php")
 ?>