<?php 
ob_start();
session_start();

if (isset($_SESSION['kullanici_ad'])) {
	
	header("Location:include");

} else {

	header("Location:include/login.php");

}

?>