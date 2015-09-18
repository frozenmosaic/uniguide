<?php
    class Navigation {
        public $objUrl;
        public $classActive = 'act';
        
        public function __construct($objUrl = null) {
            $this->objUrl = is_object($objUrl) ? $objUrl : new Url() ;
        }
        
        public function active($cPage = null, $pairs = null, $single = true) {
            if(!empty($cPage)) {
                if(empty($pairs)) {
                    if($cPage == $this->objUrl->_cPage) {
                        return !$single ? ' '.$this->classActive : ' class="'.$this->classActive.'"';
                    }
                } else { //pair duoc cho vao o dang array 1 thanh phan: key la param, element la property
                    $exceptions = array();
                    foreach($pairs as $key => $value) {
                        $paramUrl = $this->objUrl->get($key); //lay trong array param cua objUrl element co key giong voi key trong param dua vao
                        if($paramUrl != $value) { //neu property tren Url khac voi property duoc dua vao, tuc la neu giong thi khong cho vao
                            $exceptions[] = $key;
                        }
                    }
                    if($cPage == $this->objUrl->main && empty($exceptions)) { 
                        //exception trong tuc la param k dc dua vao, tuc la property cho vao giong voi property tren Url
                        return !$single ? ' '.$this->classActive : ' class="'.$this->classActive.'"'; //cho them class act
                    }
                }
            }
        }
        
    }

?>