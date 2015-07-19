<?php 

class Core
{
	
	public function run() {
		ob_start();
		// $uri = $_SERVER['REQUEST_URI'];

		// $uri = Url::removeSlash($uri);
  //       $uri = explode('/', $uri);
		
		// $path = Url::removeSlash(ROOT_PATH, DS);
		// $path = explode(DS, $path);
	
		// $root_folder = end($path);

		// if ($uri[0] == $root_folder) {
		// 	array_shift($uri);
		// }

		
		// //$uri = Url::getUri(); 
		// // trong truong hop $uri chi gom domain name thi array $uri van co first element va element rong

		// $first = $uri[0];
		// switch ($first) {
		// 	case "":
		// 		$this->_cPage = "index";
		// 		break;

		// 	case $this->$_admin:
		// 		# code...
		// 		break;

		// 	case $this->$_college_url:
		// 		$this->_cPage = $this->_college_temp;
		// 		break;
			
		// 	default:
		// 		$this->_cPage = $this->_article_temp;
		// }
		$objUrl = new Url();
		require_once($objUrl->getPage());
		ob_get_flush();
	}
}
