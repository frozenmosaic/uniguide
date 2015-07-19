<?php 
class Url {

	private static $_folder = PAGES_DIR;
	private static $_cPage;

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
				$this->_cPage = "index";
				break;

			case $this->$_admin:
				# code...
				break;

			case $this->$_college_url:
				$this->_cPage = $this->_college_temp;
				break;
			
			default:
				$this->_cPage = $this->_article_temp;
				break;
		}
	}

	public static function getUri() {
		$uri = $_SERVER['REQUEST_URI'];

		$uri = $this->removeSlash($uri);
        $uri = explode('/', $uri);
		
		$path = $this->removeSlash(ROOT_PATH, DS);
		$path = explode(DS, $path);
	
		$root_folder = end($path);

		if ($uri[0] == $root_folder) {
			array_shift($uri);
		}

		return $uri;
	}

	/*==== ARTICLE PROCESS METHODS ====*/

	public function getPage() {
		$page = self::$_folder.DS.self::$_cPage."php";
		$error = self::$_folder.DS."error.php";

		return is_file($page) ? $page : $error;
	}

	public function removeSlash($uri = null, $separator = "/") {
		if !empty($uri) { 
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

	/*==== COLLEGE PROCESSING METHODS ====*/
	public static function getSchoolUrl() {
		return self::getUri()[1];
	}

	/*==== ADMIN PROCESSING METHODS ====*/

	public function getParam() {}

	public function process() {}

	public function getCurrent() {}

}
?>