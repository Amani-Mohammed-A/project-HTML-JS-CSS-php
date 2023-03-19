<?php
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] =='staff') {
    header('Location: ./StaffHomePage.php');
    exit;
}

if(isset($_SESSION['role']) && $_SESSION['role'] =='patient') {
    header('Location: ./PatientHome.php');
    exit;
}
if(isset($_SESSION['role']) && $_SESSION['role'] =='adminlogin') {
  header('Location: ./adminpage.php');
  exit;
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home</title>
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="Home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center"  id="navv">
        <div class="container-fluid">
               <a class="navbar-brand" href="#">
               <img src="ksamc.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top"> </a>  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"> Home</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="PatientLogin.php">Patient Login</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="StaffLogin.php"> Staff Login</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="about us.php">about us </a>
                    </li>  
                    <li class="nav-item">
                          <a class="nav-link active" href=".\المشروع بالعربي\index.php">اللغة العربية</a>
                    </li>  
                </ul>   
            </div>
        </div>
    </nav>
    
  

    <div id="header1" class=" text-center">
		<p> AL-Madinah Al-Munawwarah Hospital<br>
			King Salman bin Abdulaziz Medical City <br>
			  <ul class="breadcrumb">
	 <li><a href="index.php">Home</a></li>
  <li>Patient Log in</li>
 
</ul>

	</div>
        <div class="container">
          <div class="row">
          <div class="col-md-3" >
           <button   class="pulse" onclick="document.location='PatientLogin.php'">Patient Login</button>
            </div>
           
             <div class="col-md-3">
               <button class="pulse" onclick="document.location='StaffLogin.php'">Staff Login </button>
              </div>
             
                <div class="col-md-3">
                    <button   class="pulse" onclick="document.location='indexad.php'">Admin Login </button>
                </div>
                <div class="col-md-3" >
           
           </div>
                </div>

      

           <div>


      
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</body>
</html>

