<?php 

$usn = file_get_contents("usn.html");
// preg_replace('/script/', "", $usn);
$usn = str_replace("script", "", $usn);
// print_r($match);
echo $usn;