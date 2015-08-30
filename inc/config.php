<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    
    defined("COUNTRY_LOCAL")
        || define("COUNTRY_LOCAL", 229);
        
    defined("INTERNATIONAL_VAT")
        || define("INTETNATIONAL_VAT", false);
    
    defined("PAGE_EXT")
        || define("PAGE_EXT", "");
    //define phan duoi cua Url 

    defined("DS")
        || define("DS", DIRECTORY_SEPARATOR);
    //dau phan cach duong dan trong he dieu hanh window la dau \, vi du nhw C:\program file, con trong Linus va Mac la dau "/"
    //directory separator co vai tro tim xem dau phan cach duong dan la dau gi
    //tim duoc roi thi gan cho DS
    //
    defined("ROOT_PATH")
        || define("ROOT_PATH", realpath(dirname(__FILE__).DS."..".DS));
    //dirname(__FILE__) tra ve duong dan den folder chua file hien dang dung 
    //dau hai cham la de nhay ve truoc mot tang folder
    //ket qua la quay ve thu muc goc

    
    function removeSlash($uri = null, $separator = "/") {
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
    
    function checkRootFolderExist() {
        $path = ROOT_PATH;
        $path = removeSlash($path);
        $path = explode(DS, $path);
    
        $root_folder = end($path);

        $uri = $_SERVER['REQUEST_URI'];

        $uri = removeSlash($uri);
        $uri = explode('/', $uri);

        if ($uri[0] == $root_folder) {
            define("SITE_Url", $_SERVER['HTTP_HOST'].'/'.$root_folder);
            define("ROOT_FOLDER", '/'.$root_folder);
        } else {
            define("SITE_Url", $_SERVER['HTTP_HOST']);
            define("ROOT_FOLDER", '');
        }
    }
    
    checkRootFolderExist();

    function root() {

        return ROOT_FOLDER;
    }

    defined("CLASSES_DIR")
        || define("CLASSES_DIR", "classes");
    //ten folder classes
    
    defined("CLASSES_PATH")
        || define("CLASSES_PATH", ROOT_PATH.DS.CLASSES_DIR);
        
    defined("PLUGIN_PATH")
        || define("PLUGIN_PATH", ROOT_PATH.DS."plugin");
    
    defined("PAGES_DIR")
        || define("PAGES_DIR", "pages");    
    
    defined("MODULE_DIR")
        || define("MODULE_DIR", "mod");
        
    defined("INC_DIR")
        || define("INC_DIR", "inc");
    
    defined("TEMPLATE_DIR")
        || define("TEMPLATE_DIR", "template");
        
    defined("EMAILS_DIR")
        || define("EMAILS_DIR", ROOT_PATH . DS . "emails");
        
    defined("CATALOGUE_PATH")
        || define("CATALOGUE_PATH", ROOT_PATH . DS . "media" . DS . "catalogue");
        
    set_include_path(implode(PATH_SEPARATOR, array(
    //them tat ca cac duong dan o tren vao include path
        realpath(ROOT_PATH . DS . MODULE_DIR),
        realpath(ROOT_PATH . DS . INC_DIR),
        get_include_path()
    )));
    
    require_once(CLASSES_PATH.DS.'Autoloader.php');


    
    spl_autoload_register(array('autoloader', 'load'));
    //ten class la autloader, method la load
    
?>