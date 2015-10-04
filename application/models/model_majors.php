<?php 
/**
* 
*/
class model_majors extends CI_Model
{

	private $_table = 'major_name';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function count_Record()
	{
		return $this->db->count_all($this->_table);
	}

	public function getMajors($limit, $offset) {
		$this->db->limit($limit, $offset);
		$this->db->order_by("name", "ASC");
		$query = $this->db->get($this->_table);

		return $query->result();

   }


// 	public function getMajor($id = null, $name = null, $shortform = null) {
// 		if (!empty($name)) {
// 			$sql = "SELECT * FROM `{$this->_table}` WHERE `name` = '".$this->db->escape($name)."'";
// 			return $this->db->fetchOne($sql);
// 		} elseif (!empty($shortform)) {
// 			$sql = "SELECT * FROM `{$this->_table}` WHERE `short_form` = '".$this->db->escape($shortform)."'";
// 			return $this->db->fetchOne($sql);
// 		} elseif (!empty($id)) {
// 			$sql = "SELECT * FROM `{$this->_table}` WHERE `id` = '".$this->db->escape($id)."'";
// 			return $this->db->fetchOne($sql);
// 		}
// 	}

// 	public function addMajor($array) { 
// 		$_insert_keys = array();
// 		$_insert_values = array();

// 		if (!empty($array)) {
// 			$params = array();
// 			for ($i=0; $i < count($array['name']); $i++) {
// 				$params['name'] = $array['name'][$i];
// 				$params['short_form'] = $array['short_form'][$i];

// 				$this->db->prepareInsert($params);
// 				$this->db->insert($this->_table);

// 				$this->db->_insert_keys = array();
//                 $this->db->_insert_values = array();

// 				$this->_id = $this->db->_id;
				
// 				// $sql = "INSERT INTO `{$this->_table}` (`name`) 
// 				// VALUES ('".$this->db->escape($array[$i])."')";
// 				// $this->db->query($sql);
// 			}		
// 			return $this->_id;
// 		} 
// 		return false;
// 	}

// 	public function updateMajor($array = null, $id) {
// 		if (!empty($array) && is_array($array) && !empty($id)) {
// 			$this->db->prepareUpdate($array);
// 			return $this->db->update($this->_table, $id);
// 		}
// 		return false;
// 	}

// 	public function removeMajor($id = null) {
// 		if (!empty($id)) {
// 			$sql = "DELETE FROM `{$this->_table}` WHERE `id` = '".$this->db->escape($id)."'";
// 			return $this->db->query($sql);
// 		}
// 		return false;
// 	}

// 	public function duplicateMajor($name = null, $id = null) {
// 		if (!empty($name)) {
// 			$sql = "SELECT * FROM `{$this->_table}` WHERE `name` = '".$this->db->escape($name)."'";
// 			$sql .= !empty($id) ? "AND `id` != '".$this->db->escape($id)."'" : null;

// 			return $this->db->fetchOne($sql);
// 		} 
// 		return false;
// 	}

// 	public function recordExist($id = null) {
// 		if (!empty($id)) {
// 			$sql = "SELECT * FROM `{$this->_table}` WHERE `id` = '".$this->db->escape($id)."'";
// 			if (!empty($this->db->fetchOne($sql))) {
// 				return true;
// 			}
// 		}
// 		return false;
// 	}
}
