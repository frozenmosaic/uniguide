<?php 
class Url {

	private static $_folder = PAGES_DIR;
	public static $_cPage;

	private $_admin = "admin"; // first element cua admin panel
	private $_college_url = "du-lieu-truong"; // name of college database
	private $_article_temp = "article"; // name of articleicle template page
	private $_college_temp = "college"; // name of college profile template page

	public function __construct() {

		// get uri
		// remove slash
		// get first param
		// switch case
		
		$uri = self::getUri(); 
		// trong truong hop $uri chi gom domain name thi array $uri van co first element va element rong

		$first = $uri[0];

		switch ($first) {
			case "":
				self::$_cPage = "index";
				break;

			case $this->_admin:
				# code...
				break;

			case $this->_college_url:
				self::$_cPage = $this->_college_temp;
				break;
			
			default:
				self::$_cPage = $this->_article_temp;
		}
	}

	public static function getUri() {
		$uri = $_SERVER['REQUEST_URI'];

		$uri = self::removeSlash($uri);
        $uri = explode('/', $uri);
		
		$path = self::removeSlash(ROOT_PATH, DS);
		$path = explode(DS, $path);
	
		$root_folder = end($path);

		if ($uri[0] == $root_folder) {
			array_shift($uri);
		}

		return $uri;
	}

	/*==== ARTICLE PROCESS METHODS ====*/

	public function getPage() {
		$page = self::$_folder.DS.self::$_cPage.".php";
		$error = self::$_folder.DS."error.php";

		return is_file($page) ? $page : $error;
	}

	public static function removeSlash($uri = null, $separator = "/") {
		if (!empty($uri)) { 
			$firstChar = substr($uri, 0, 1);
	        if ($firstChar == $separator) {
	            $uri = substr($uri, 1);
	        }

	        $lastChar = substr($uri, -1);
	        if ($lastChar == $separator) {
	            $uri = substr($uri, 0, -1);
	        }

	        return $uri;
    	}
	}

	public static function getArticleUri() {
		return end(self::getUri());
	}

	/*==== COLLEGE PROCESSING METHODS ====*/
	public static function getSchoolUrl() {
		return self::getUri()[1];
	}

	/*==== ADMIN PROCESSING METHODS ====*/

	public function getParam() {}

	public function adminProcess() {
		$uri = self::getUri();
		
		// /admin/article/action/edit/id/19

		if (!empty($uri)) {
			if (!empty($uri)) {
				$first = array_shift($uri);
				if ($first == $this->_admin) {
					/*
						e.g.:
						panel/products/action/edit/id/19 
						$first = 'panel' 
						=> $this->module = 'panel' instead of 'front' to signify that the admin is accessing the website. 
						=> $first = 'products'
					 */
					
					self::$_cPage = empty($uri) ? "index" : array_shift($uri);
				}
				$this->main = $first;
				$this->cpage = $this->main;

				if (count($uri) > 1) {
					$pairs = array();
					foreach ($uri as $key => $value) {
						$pairs[] = $value;
						if (count($pairs) > 1) {
							if (!Helper::isEmpty($pairs[1])) {
								// if ($pairs[0] == $this->key_page) {
								// 	$this->cpage = $pairs[1];
								// } else if ($pairs[0] == 'c') {
								// 	$this->c = $pairs[1];
								// } else if ($pairs[0] == 'a') {
								// 	$this->a = $pairs[1];
								// }
								$this->params[$pairs[0]] = $pairs[1];
							}
							$pairs = array();
						}
					}
				}
			}
		}
	}

	public function getCurrent() {}

}
?>