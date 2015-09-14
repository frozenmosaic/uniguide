<?php 
class Url {

	private static $_folder = PAGES_DIR;
	public $_cPage;
	public static $_first = '';
	public $_params = array();

	public $_admin = "admin"; // first element cua admin panel
	private $_college_Url = "du-lieu-truong"; // name of college database
	private $_article_temp = "article"; // name of article template page
	private $_college_temp = "college"; // name of college profile template page

	public function __construct() {

		// get uri
		// remove slash
		// get first param
		// switch case
		
		$uri = self::getUri(); 
		// trong truong hop $uri chi gom domain name thi array $uri van co first element va element rong

		$first = $uri[0];
		$first = "first here";
		self::$_first = $first;

		switch ($first) {
			case "":
				$this->_cPage = "index";
				break;

			case $this->_admin:
				$this->adminProcess();
				break;

			case $this->_college_Url:
				$this->_cPage = $this->_college_temp;
				break;
			
			default:
				$this->_cPage = $this->_article_temp;
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

	public function href($main = null, $params = null) {
        if(!empty($main)) {
            $out = array($main);
            if(!empty($params) && is_array($params)) {
                foreach($params as $key => $value) {
                    $out[] = $value; //array cho vao se co dang ten param va property
                }
            }
            return implode('/', $out).PAGE_EXT; //khi xuat ra se co dang main/ten param/property
        }
   	}

   public function get($param = null) {
        if(!empty($param) && array_key_exists($param, $this->_params)) {
            return $this->_params[$param];
        }
    }

	/*==== ARTICLE PROCESS METHODS ====*/

	public function getPage() {
		$page = self::$_folder.DS.$this->_cPage.".php";
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

	public static function getParam() {

	}

	public function adminProcess() {
		$uri = self::getUri();
		
		// /admin/article/action/edit/id/19

		if (!empty($uri)) {
			if (!empty($uri)) {
				$first = array_shift($uri);
				if ($first == $this->_admin) {

					$second = array_shift($uri);
					switch ($second) {
						case "":
							$this->_cPage = "index";
							break;
						
						default:
							$this->_cPage = $second;
					}
				}
				
				if (count($uri) > 1) {
					$pairs = array();
					foreach ($uri as $key => $value) {
						$pairs[] = $value;
						if (count($pairs) > 1) {
							if (!Helper::isEmpty($pairs[1])) {
								$this->_params[$pairs[0]] = $pairs[1];
							}
							$pairs = array();
						}
					}
				}
			}
		}
	}

	public function getCurrent($exclude = null, $extension = false, $add = null) {
            $out = array();
            if(self::$_first == 'admin') {
                $out[] = 'admin';
            }
            $out[] = $this->_cPage;
            if(!empty($this->_params)) {
                if(!empty($exclude)) {
                    $exclude = Helper::makeArray($exclude);
                    foreach($this->_params as $key => $value) {
                        if(!in_array($key, $exclude)) { //neu co exclude thi chi cho vao array out nhung gi khong phai exclude
                            $out[] = $key;
                            $out[] = $value;
                        }
                    }
                } else {
                    foreach($this->_params as $key => $value) {
                        $out[] = $key;
                        $out[] = $value;
                    }
                }
            }
            if(!empty($add)) {
                $add = Helper::makeArray($add);
                foreach($add as $item) {
                    $out[] = $item;
                }
            }
            $url = implode('/', $out);
            $url .= $extension ? PAGE_EXT : null;
            return $url;
            //ket qua la dang index/blah blah/blah blah
        }

}
?>