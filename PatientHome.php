<?php
session_start();

//manager goes to his/her page
if(isset($_SESSION['role']) && $_SESSION['role'] =='staff') {
    header('Location: ./StaffHomePage.php');
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
           
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<title>Patient Homepage</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="pHomestyle.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>


<body>
<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center"  >
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
                          <a class="nav-link active" href=".\المشروع بالعربي\PatientHome.php">اللغة العربية</a>
                    </li>   
                </ul>   
            </div>
        </div>
    </nav>

<header >
    <div class="header">
        <div class="header-right">
          <a class="active" href="choose.php">Home</a>
          <a href="request.php">Add Request +</a>
       
          <a href="SignOut.php">Sign out</a>
        </div>
      </div>
      <ul class="breadcrumb">
  <li>Home</li>
  <li>Patient Log in</li>
  <li>Patient Home page</li>
</ul>
  </header>
    <main>
  <br>

 <br>
 <br>

  <h2 class="welcome" id="new">Requests:</h2>
  <br>
 
  <div class="newReq">
  <table>
    <tr>
      <th>Clinicname</th>
      <th>Filenumber</th>
      <th>Phonenumber</th>
      <th>Edit</th>
    </tr>
    
     <?php
     //in progress

 $req_sql = "SELECT * FROM requests WHERE Filenumber ='". $_SESSION['Filenumber']."'";
 if($req_result = mysqli_query($connection, $req_sql)){
         
     while($req_row = mysqli_fetch_assoc($req_result)){
      echo "<td>".$req_row['Clinicname']."</td>";
                echo "<td>".$req_row['Filenumber']."</td>";
               echo "<td>".$req_row['Phonenumber']."</td>";
               if($req_row['statue']==0)
               {
               echo " <td><a href='edit.php?id=".$req_row['id']."'>"."Edit"."</a></td>";

               }
               else{
                echo " <td></td>";
               }
               echo "</tr>";
     }
 
 }
 
 ?>
    


  </table>
  </div>



    </table>
     
  </div>
 
</main>  <?php
include("footer.php")
 ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

  
</html>