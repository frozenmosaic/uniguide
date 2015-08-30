<?php 
require_once('../inc/config.php');

if(isset($_POST['majors'])) {
	$objMajors = new Majors();
	if ($objMajors->addMajor($_POST['majors'])) { 
		echo Helper::json("Succeed");	
	} else { // khi ket qua tra ve la so 0, empty string va false
		echo Helper::json("Failed");
	}
	
}