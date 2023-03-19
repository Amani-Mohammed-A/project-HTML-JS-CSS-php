
<?php
session_start();

if(isset($_SESSION['role']) && $_SESSION['role'] =='Admin') {
    header('Location: ./adminpage.php');
    exit;
}
            include 'db_connection.php';

            //start the connection: 
            $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
            //handling any connection errors: 
            $connection_errors = mysqli_connect_error();
            if ($connection_errors != null) {
                $msg = "<p> Unable to connect to database<p>" . $connection_errors;
                exit($msg);
            }
            
         

?>
<!DOCTYPE html>
<html>
<head>
	<title>admin home</title>
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
                        <a class="nav-link active" aria-current="page" href=".\المشروع بالعربي\adminpage.php">اللغة العربية </a>
                        
                    </li>
                    <li> <a class="nav-link active" aria-current="page" href="SignOut.php">Sign out</a></li>
                </ul>   
            </div>
        </div>
    </nav>
      

	
	<div id="header" class=" text-center">
		<p> AL-Madinah Al-Munawwarah Hospital<br>
			King Salman bin Abdulaziz Medical City <br>
</p>
		
	</div>
	
<br>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-tilte">patient Registration</h5>
					
						<a href="./patientRegistration.php" class="btn btn-outline-dark">detalis</a>
					</div>
		
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-tilte">Staff Registration</h5>
					
						<a href="./staffRegistration.php" class="btn btn-outline-dark">detalis</a>
					</div>
		
				</div>
			</div>
      <?php
include("footer.php")
 ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>