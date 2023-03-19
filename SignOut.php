<?php
session_start();
session_destroy();
echo "<script>window.location='index.php'; alert( 'Sign Out successful.' );</script>";
//header("Location: index.php");
	
?>