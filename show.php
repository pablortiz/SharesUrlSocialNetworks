<?php
if ( (isset($_POST['token'])) && ($_POST['token'] != '') && (isset($_POST['social'])) && ($_POST['social'] != '') ) 
{
	$social = $_POST['social']; 
	$token 	= $_POST['token'];
	include "./models/Mysql.php";
	$nuevo = new Service();
	$datos = $nuevo->getSocialShares($social, $token);
	echo json_encode( $datos );
}
?>