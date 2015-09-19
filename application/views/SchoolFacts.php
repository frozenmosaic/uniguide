<?php 
class SchoolFacts extends Application {

	private $_tbl_main = "school_facts";
	private $_tbl_s_major = "school_major";
	private $_tbl_major = "major_name";
	private $_tbl_criteria = "school_criteria";
	private $_tbl_sat = "school_sat";

	/*=== RETURN RESULTS ===*/
	// return names of all schools in profile databases
	public function getSchools() {
		$sql = "SELECT `name` FROM {$this->_tbl_main} ORDER BY `name` ASC";

		return $this->db->fetchAll($sql);
	}

	// return full facts of a school, drawing from various tables: major_name, school_criteria, school_major, school_sat 
	public function getSchool($id = null, $Url = null) {
		$sql = "SELECT f.*, c.*, s.*, sm.*, mj.* FROM 
		`{$this->_tbl_main}` `f` , 
		`{$this->_tbl_criteria}` `c` , 
		`{$this->_tbl_sat}` `s` , 
		`{$this->_tbl_s_major} `sm` , 
		`{$this->_tbl_major}` `mj` 
		WHERE f.id = c.school_id AND f.id = s.school_id AND f.id = sm.school_id AND f.id = ";
	}

	public function getFacts() {}

	public function getSat() {}

	public function getCriteria() {}

	public function getSchoolMajors() {}

	/*=== UPDATE INFO ===*/
	// update info in each of the related tables
	
	public function updateFacts() {}

	public function updateSat() {}

	public function updateMajor() {}

	public function updateCrit() {}

	/*=== REMOVE SCHOOLS ===*/

	// remove ALL data of a school from all related table
	public function removeSchool($id = null, $Url = null) {}

}