<?php 

$id = $this->objUrl->get('id');
if (!empty($id)) {
	$objMajors = new Majors();
	echo Helper::json($objMajors->removeMajor($id));
} else {
	throw new Exception('Record can not be removed');
}

