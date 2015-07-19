<?php 
require_once ('config.php');

function __autoload($class_name) {
	// explode == string to array
	$class = explode("_", $class_name);
	// implode = array to string
	$path = implode("/", $class) . ".php";
	require_once($path);
}
