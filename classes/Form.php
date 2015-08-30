<?php 
class Form {

	/*
	check whether a $field (input box) is stored in the $_POST array
	 */
	public function isPost($field = null) {
		if (!empty($field)) {
			if (isset($_POST[$field])) {
				return true;
			}
			return false;
		} else {
			if (!empty($_POST)) {
				return true;
			}
			return false;
		}
	}

	public function getPost($field = null) {
		if (!empty($field)) {
			if ($this->isPost($field)) {
				// if (is_array($_POST[$field])) {
				// 	return $_POST[$field];
				// } else {
				// 	return strip_tags($_POST[$field]);
				// }

				return is_array($_POST[$field]) ? $_POST[$field] : strip_tags($_POST[$field]);
			} else {
				return null;
			}
		} 
	}

	public function stickySelect($field, $value, $default = null) {
		if ($this->isPost($field) && $this->getPost($field) == $value) {
			return " selected=\"selected\"";
		} else {
			return !empty($default) && $default == $value ? " selected=\"selected\"" : null;
		}
	}

	public function stickyText($field, $value = null) {
		if ($this->isPost($field)) {
			return stripcslashes($this->getPost($field));
		} else {
			return !empty($value) ? $value : null;
		}
	}

	public function getCountriesSelect($record = null) {
		$objCountry = new Country();
		$countries = $objCountry->getCountries();
		if (!empty($countries)) {
			$out = "<select name=\"country\" id=\"country\" class=\"sel\">";
			if (empty($record)) {
				$out .= "<option value=\"\">Select one&hellip;</option>";
			}

			foreach ($countries as $country) {
				$out .= "<option value=\"";
				$out .= $country['id'];
				$out .= "\"";
				$out .= $this->stickySelect('country', $country['id'], $record);
				$out .= ">";
				$out .= $country['name'];
				$out .= "</option>";
			}

			$out .= "</select>";
			return $out;
		}
	}

	public function getPostArray($expected = null) {
		$out = array();
		if ($this->isPost()) {
			foreach ($_POST as $key => $value) {
				if (!empty($expected)) {
					if (in_array($key, $expected)) {
						$out[$key] = is_array($value) ? $value : strip_tags($value);
					}
				} else {
					$out[$key] = is_array($value) ? $value : strip_tags($value);
				}
			}
		}

		return $out;
	}
}
?>