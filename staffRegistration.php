
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
<head><head> 
<title>staff raigstration</title>
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
                        <a class="nav-link active" aria-current="page" href=".\المشروع بالعربي\staffRegistration.php">اللغة العربية </a>
                        
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
<h3 class="text-center"> Registr Staff </h3>
</div>

<div class="Details">
<form action="" method="post">
<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="First Name" required>
</div>

<div class="form-group">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>

<div class="form-group">
<input type="text" class="form-control"  name="id" placeholder="ID"  required >
</div>

<div class="form-group text-center">
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



<section>

<div class="clearfix"></div>

</body>

</html>

<?php

function user_signup($data){

$name = mysqli_real_escape_string($GLOBALS['db'],$data['name']);
$email = mysqli_real_escape_string($GLOBALS['db'],$data['email']);
$id = mysqli_real_escape_string($GLOBALS['db'],$data['id']);
$qry=mysqli_query($GLOBALS['db'],"select * from staff where (email='$email' || id='$id') ");

if($qry->num_rows >0)
{
echo "<script>alert('Email Id or Phone Number already exists.')</script>";
}

else
{
$sql="INSERT INTO staff(Name,Email,ID) VALUES('$name','$email','$id')";
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