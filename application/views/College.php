<?php 
class College extends Application {

	private $_table = "school_facts";

	public function getCollegeFacts($Url = null) {
		$sql = "SELECT * FROM `{$this->_table}` WHERE `Url` = '".$this->db->escape($Url)."'";

		return $this->db->fetchOne($sql);
	}

	public function collegeExist($Url = null) {
		if (!empty($Url)) {
			$sql = "SELECT * FROM `{$this->_table}` WHERE `Url` = '".$this->db->escape($Url)."'";
			$result = $this->db->fetchOne($sql);
		}
		return !empty($result);
	}

}
?>