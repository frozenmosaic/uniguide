<?php 
class College extends Application {

	private $_table = "school_facts";

	public function getCollegeFacts($url = null) {
		$sql = "SELECT * FROM `{$this->_table}` WHERE `url` = '".$this->db->escape($url)."'";

		return $this->db->fetchOne($sql);
	}

	public function collegeExist($url = null) {
		if (!empty($url)) {
			$sql = "SELECT * FROM `{$this->_table}` WHERE `url` = '".$this->db->escape($url)."'";
			$result = $this->db->fetchOne($sql);
		}
		return !empty($result);
	}

}
?>