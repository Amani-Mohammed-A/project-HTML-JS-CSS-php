<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !='patient') {
    header('Location: ./index.php');
    exit;
}

//include the database connection(the constants are in a different file )
            include 'db_connection.php';
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

            //handling any connection errors
            $connection_errors = mysqli_connect_error();
            if ($connection_errors != null) {
                $msg = "<p> Unable to connect to database<p>" . $connection_errors;
                exit($msg);
            }
           
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<title>Add Request</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="requeststyle.css" />
<styel>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center" >
        <div class="container-fluid">
               <a class="navbar-brand" href="#">
               <img src="ksamc.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top"> </a>  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
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
                          <a class="nav-link active" href=".\المشروع بالعربي\request.php">اللغة العربية</a>
                    </li>   
                </ul>   
            </div>
        </div>
    </nav>
      
	
<?php

$error="";
if (isset($_POST['submit'])) {

  $Clinicname=$_POST['Clinicname'];
    $Filenumber=$_POST['Filenumber']; 
    $Phonenumber=$_POST['Phonenumber'];  
    $sql = "SELECT * FROM requests  WHERE Filenumber='" .$Filenumber ."' AND Clinicname='".$Clinicname."'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)) {
      $error="Request is already exists";
    }
    else
    {
$insert_sql="INSERT INTO requests (Clinicname, Filenumber,Phonenumber) VALUES ('". $Clinicname."', ".$Filenumber.", ".$Phonenumber.")";
mysqli_query($connection, $insert_sql);
echo "<script>window.location='PatientHome.php'; alert( 'Request added successfully.' );</script>";
   


} }  

?>

  <p style="background-image: url('background1.jpg');">
<header >
    <div class="header">
        
        <div class="header-right">
          <a class="active" href="PatientHome.php">Home</a>
          
          <a href="request.php">Add Request +</a>
          
          <a href="SignOut.php">Sign out</a>
        </div>
      </div>
<ul class="breadcrumb"><li><a href="index.php">Home</a></li>
  <li>Patient Log in</li>
  <li>Patient Home page</li>
  <li>Add Request</li>
</ul>
  </header>
  

  <div class="form-style-5">
    <?php
    
    if(isset($error))
    {
      echo "<h2 style='color:red;  text-align: center;  margin-bottom:20px;      '>".$error."  </h2>";
    }
    ?>
      <form name="myForm"  method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
    <fieldset>
    <legend><span class="number">1</span> Clinicname</legend>
     
    <select id="Clinicname" name="Clinicname">
        <?php
        $serviceTypes=array(
          "Heart",
          "Spine"
          ,"Dental"
          ,"Orthopedic"
          ,"fracture"
          ,"Audiology"
          ,"Digestive"
          ,"Ear,Nose,Throat"
        ,"Internal");

          foreach($serviceTypes as $service){
              if($service == $row_status['Clinicname']){
                    echo "<option value=".$service." selected >".$service."</option>";
                    
              } else {
                 echo "<option value=".$service." >".$service."</option>";  
              }
          }
         ?>
        
        </select>   
    </fieldset>
    <fieldset>
    <legend><span class="number">2</span>Filenumber</legend>
    <input type="text" id='Filenumber' readonly name='Filenumber'pattern=".{4,}" title="The File number must be at least 4 numbers" value=<?php echo  $_SESSION['Filenumber'];?>>
  
    <legend><span class="number">3</span>Phonenumber</legend>
    <input type="text" id='Phonenumber' name='Phonenumber'pattern="^(966)(5)([0-9]{8})$" title="The phone number must start with 966 and 12" required value=<?php echo  $_SESSION['Phonenumber'];?>>

<br>
<br>
<br>
    <input name="submit" type="submit" value="Add"/>
    </form>
    </div>
<script>
    function validateForm()
     {
         var  x =document.getElementById("Phonenumber").value;
    
         if(x.length !=12)
         {
          alert("Phonenumber Must be 12 Numbers and start with 966");
            return false;
         }
         
           return true;
  
        }
        </script>
    <?php
include("footer.php")
 ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      
  </body>
  
 
  </html>
