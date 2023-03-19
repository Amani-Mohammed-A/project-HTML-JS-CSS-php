<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'staff') {
  header('Location: ./StaffLogin.php');
  exit;
}
include 'db_connection.php';

//starting the connection
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

//handling any connection errors
$connection_errors = mysqli_connect_error();
if ($connection_errors != null) {
    $msg = "<p> Unable to connect to database<p>" . $connection_errors;
    exit($msg);
}
$user="kjl";
$user = $connection->query("SELECT Name from staff WHERE id = {$_SESSION['id']}")->fetch_assoc();
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  
$update_sql="UPDATE requests SET statue='1' WHERE id=".$id;
mysqli_query($connection, $update_sql);
header("Location: StaffHomePage.php");
 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Staff Home Page </title>

  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="ManagerHomePage1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>


<body>
<header class="header">


<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center" >
        <div class="container-fluid">
               <a class="navbar-brand" href="#">
               <img src="ksamc.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top"> </a>  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-it
                    ">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="PatientLogin.php"> Patient Login</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="StaffLogin.php"> Staff Login</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link active" href="about us.php">About Us</a>
                    </li>  
                    <li class="nav-item">
                            <a class="nav-link active" href="SignOut.php">Sign out</a>
                    </li>  
                    <li class="nav-item">
                          <a class="nav-link active" href=".\المشروع بالعربي\StaffHomePage.php">اللغة العربية</a>
                    </li>  
                </ul>   
            </div>
        </div>
    </nav>
    </header>
      <div class="header-right">
    
      </div>
    </div>
    <ul class="breadcrumb">
      <li>Home</li>
      <li>Staff homepage</li>
    </ul>
 
  <br>
  <h1 id="manager_name">Welcome <span><?= $user['Name']?></span> !</h1>



  <br>
 
 <h2 class="welcome" id="new">Requests:</h2>
 <br>
 <div class="newReq">
   
 <table>
   <tr>
     <th>Clinicname</th>
     <th>Filenumber</th>
     <th>Phonenumber</th>
     <th></th>
   </tr>
   
    <?php

$req_sql = "SELECT * FROM requests ORDER by CASE WHEN requests.statue = '0' then 1
when requests.statue= '1' then 2
end" ;

if($req_result = mysqli_query($connection, $req_sql)){
  while($req_row = mysqli_fetch_assoc($req_result)){
    if($req_row['statue']==0)
    {
   echo "<td>".$req_row['Clinicname']."</td>";
             echo "<td>".$req_row['Filenumber']."</td>";
            echo "<td>".$req_row['Phonenumber']."</td>";
           
            echo " <td><a   onclick='fal();' class='btn btn-danger btn-sm delete btn-flat' href='StaffHomePage.php?id=".$req_row['id']."'>"."Accept"."</a></td>";
         
            echo "</tr>";
  }   
  
}
}

?>
   
    </table>
    <br>
    <br>
    <br>

    <?php
include("footer.php")
 ?>
  
<script src="bootstrap.min.js"></script>
<script>
  function fal()
{
  alert("You will accept the request");
}
  
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
  

</html>