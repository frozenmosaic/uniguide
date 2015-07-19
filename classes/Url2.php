<?php 
class Url {

    public static $_page = "page";
    public static $_folder = PAGES_DIR;
    public static $_params = array();

    public static function processUrl($url) {
        $firstChar = substr($url, 0, 1);
        if ($firstChar == "/") {
            $url = substr($url, 1);
        }
        $lastChar = substr($url, -1);
        if ($lastChar == "/") {
            $url = substr($url, 0, -1);
        }

        $url = explode('/', $url);
        $first = $url[0];

        switch ($first) {
            case 'admin':
                # code...
                break;

            case 'du-lieu-truong':
                if (!empty($url[1])) {
                    
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    public static function getParam($par) {
        return isset($_GET[$par]) && $_GET[$par] != "" ? $_GET[$par] : null;
    }

    public static function cPage() {
        return isset($_GET[self::$_page]) ? $_GET[self::$_page] : 'index';
    }

    public static function getPage() {
        $page = self::$_folder.DS.self::cPage().".php";
        $error = self::$_folder.DS."error.php";
        return is_file($page) ? $page : $error;
    }
}
?>