<?php
if ((isset($_POST['url'])) && ($_POST['url'] != '') && (isset($_POST['token'])) && ($_POST['token'] != '') && (isset($_POST['social'])) && ($_POST['social'] != '') && (isset($_POST['count'])) && ($_POST['count'] != '')  ) 
{
	$url 	= $_POST['url'];
	$social = $_POST['social']; 
	$count 	= $_POST['count']; 
	$token 	= $_POST['token'];
	include "./models/Mysql.php";
	$nuevo = new Service();
	$ret = $nuevo->setSocialShares($url, $social, $count, $token);
	echo $ret;
}
?>