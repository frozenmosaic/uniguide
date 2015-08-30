<?php 
class Article extends Application {

	private $_table = "articles";

	public function getArticles() {
		$sql = "SELECT * FROM `articles` ORDER BY `name` ASC";

		return $this->db->fetchAll($sql);
	}

	public function getArticle($id = null) {
		$sql = "SELECT * FROM `{$this->_table}` WHERE `id` = '".$this->db->escape($id)."'";
		return $this->db->fetchOne($sql);
	}

	public function addArticle($params = null) {
		if (!empty($params)) {
			$this->db->prepareInsert($params);
			$out = $this->db->insert($this->_table);
			$this->_id = $this->db->_id;
			return $out;
		}
		return false;
	}

	public function removeArticle($id = null) {
		if (!empty($id)) {
			$article = $this->getArticle($id);
			if ($article) {
				$sql = "DELETE FROM `{$this->_table}` WHERE `id` = '".$this->db->escape($id)."'";
				return $this->db->query($sql);
			}
			return false;
		}
		return false;
	}

	public function updateArticle($params = null, $id = null) {
		if (!empty($params) && !empty($id)) {
			$this->db->prepareUpdate($params);
			return $this->db->update($this->_table, $id);
		}
	}

	// get search results
	public function getAllArticles($srch) {
		$sql = "SELECT * FROM `{$this->_table}`";
		if (!empty($srch)) {
			$srch = $this->db->escape($srch);
			$sql .= " WHERE `name` LIKE '%{$srch}%' || `id` = {$srch}'";
		}
		$sql .= " ORDER BY `timestamp` DESC";
		return $this->db->fetchAll($sql);
	} 

	public function getLevelArticles($level = null) {
		if (!empty($level) && is_numeric($level)) {
			$sql = "SELECT * FROM `{$this->_table}` WHERE `level` = '{$level}'";
			return $this->db->fetchAll($level);
		}
	}

	public function checkArticleExist($Url = null, $level = null) {
		if (!empty($Url) && !empty($level) && is_numeric($level)) {
			$sql = "SELECT * FROM `{$this->_table}` WHERE 'level` = '{$level}' AND `Url` = '".$this->db->escape($Url)."'";
			return $this->db->fetchOne($sql);
		}
		return false;
	}
}
?>