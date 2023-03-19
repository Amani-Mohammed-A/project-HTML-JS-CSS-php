
<?php
session_start();
//mangers
if(isset($_SESSION['role']) && $_SESSION['role'] =='patient') {//تتاكد من تحقق الي جوتها
    header('Location: ./PatientLogin.php');
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
            
            
            
            
$login_error = false;
if(isset($_POST['submit'])){
    $emp_number = trim($_POST['number']);//whitespace
    $Phonenumber = $_POST['Phonenumber'];

    
            $sql = "SELECT * FROM patient  WHERE Filenumber=" .$emp_number ." AND Phonenumber='".$Phonenumber."'";
            $result = mysqli_query($connection, $sql);
        
    if(mysqli_num_rows($result)) {
          $row_employee = mysqli_fetch_array($result);
          $_SESSION['role']="patient";
          $_SESSION['Filenumber']=$emp_number;
          $_SESSION['Phonenumber']=$Phonenumber;
          
        header('Location: ./choose.php');
           exit;
    } else {
        $login_error = true;
    }
}  

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
	<title>Patient Log in </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/icons/clock.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="logins.css">

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-bage" class="jumbotron text-center"  id="navv">
        <div class="container-fluid">
               <a class="navbar-brand" href="ksamc.png">
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
                          <a class="nav-link active" href=".\المشروع بالعربي\PatientLogin.php">اللغة العربية</a>
                    </li>  
                </ul>   
            </div>
        </div>
    </nav>
	<header>
 <div class="header">     
            </div>
			<ul class="breadcrumb">
  <li>Home</li>
  <li>Patient Log in</li>
</ul>
         </header>
	<div class="limiter">
		<div class="container-login100" style="background-image:url(imgg.PNG) "> 
			<div class="wrap-login100">
                            
     <form class="login100-form" method="POST" 
     action="PatientLogin.php"><!--action		Specifies  to which the form’s data is sent when submitted. //post Sends form data via the server-->
					

					<span class="login100-form-title p-b-34 p-t-27">
					Patient Login
					</span>
          <?php if($login_error) {?>
                                <div class="error_login"> Cannot log in.. please check the given information.</div>
                                                             <?php } ?>
                                                            
															 <div class="wrap-input100 validate-input">
						<input class="input100" type="text" id="Filenumber" name="number" pattern=".{4,}" title="The File number must be at least 4 numbers" required placeholder="File Number">
						
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" id="Phonenumber" name="Phonenumber" pattern="^(966)(5)([0-9]{8})$" title="The phone number must start with 966 and 12" required placeholder="Phone Number">
					
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Login" name="submit" class="login100-form-btn" >
					</div>


				</form>
			</div>
		</div>
	</div>
  <?php
include("footer.php")
 ?>
<script>  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>