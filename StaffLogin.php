
<?php
session_start();
if(isset($_SESSION['role']) && $_SESSION['role'] =='staff') {
    header('Location: ./StaffHomePage.php');
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
	$Email =$_POST['Email'];
    $ID= $_POST['id'];
	$sql = "SELECT * FROM staff  WHERE Email='" .$Email ."' AND ID='".$ID."'";
	$result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)) {
		  $_SESSION['role']="staff";
          $_SESSION['id']=$ID;
		  header('Location: ./StaffHomePage.php');
		  exit;
    } else {
        $login_error = true;
    }
}    
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
	<title>Staff Log in </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/icons/clock.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="logins.css">

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
                          <a class="nav-link active" href=".\المشروع بالعربي\StaffLogin.php">اللغة العربية</a>
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
  <li>Staff Log in</li>
</ul>
         </header>

	<div class="limiter">
		<div class="container-login100" style="background-image:url(imgg.PNG) "> 
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="StaffLogin.php"  onsubmit="return login();">
					<span class="login100-form-logo">
						<!--<i class="zmdi zmdi-landscape"></i>-->
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Staff Login
					</span>
                                                            <?php if($login_error) {?>
                                <div class="error_login"> Cannot log in.. please check the given information.</div>
                                                             <?php } ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" id="Email" name="Email" required placeholder="Email" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password"pattern="{10}" title="ID must be 10 number" required>
						<input class="input100" type="password" id="id" name="id" required placeholder="ID">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					

					<div class="container-login100-form-btn">
						<input type="submit" value="Login" name="submit" class="login100-form-btn">
							
					</div>

				</form>
			</div>
		</div>
	</div>
	

	
	
	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="managerlogin.js"></script>

<?php
include("footer.php")
 ?>
<script>
 function login()
 {

	
         var  y=document.getElementById("id").value;
      
         if(y.length !=10)
         {
          alert("ID Must be 10 Numbers");
            return false;
         }
           return true;
  
        

 }
	</script>
</body>
</html>
