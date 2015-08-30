<?php
    class Core {
        
        public $objUrl;
        public $objNavigation;
        // public $objAdmin;
        
        public $_meta_title = 'E-commerce project';
        public $_meta_description = 'E-commerce project';
        public $_meta_keywords = 'E-commerce project';
        
        public function __construct() {
            $this->objUrl = new Url();
            $this->objNavigation = new Navigation($this->objUrl);
        }
        
        public function run() {
            ob_start();
            switch(Url::$_first) {
                case 'admin' :
                    set_include_path(implode(PATH_SEPARATOR, array( //path separator la de phan tach cac path noi chung va include path noi rieng
                        realpath(ROOT_PATH.DS.'admin'.DS.TEMPLATE_DIR),
                        realpath(ROOT_PATH.DS.'admin'.DS.PAGES_DIR),
                        get_include_path() //lay nhung duong dan mac dinh trong include path trong file php.ini cua server
                    )));
                    $this->objAdmin = new Admin();
                    require_once(ROOT_PATH.DS.'admin'.DS.PAGES_DIR.DS.$this->objUrl->_cPage.'.php');
                break;
                default:
                    set_include_path(implode(PATH_SEPARATOR, array( //path separator la de phan tach cac path noi chung va include path noi rieng
                        realpath(ROOT_PATH.DS.TEMPLATE_DIR),
                        realpath(ROOT_PATH.DS.PAGES_DIR),
                        get_include_path() //lay nhung duong dan mac dinh trong include path trong file php.ini cua server
                    )));
                    require_once(ROOT_PATH.DS.PAGES_DIR.DS.$this->objUrl->_cPage.'.php'); 
                    //construct cua Url se goi method process, method process se tra va _cPage
            }
            ob_get_flush();            
        }
    }
?>