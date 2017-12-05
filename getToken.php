<?php
$token = "";
$length=64;
$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
$codeAlphabet.= "0123456789";
$max = strlen($codeAlphabet); // edited
for ($i=0; $i < $length; $i++) {
	$token .= $codeAlphabet[random_int(0, $max-1)];
}
echo  $token;
?>