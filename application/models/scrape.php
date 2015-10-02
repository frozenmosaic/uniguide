<?php
class Scrape extends CI_Model
{
    
    public $college_data = array();
    
    /*** CLASS INTERFACE ***/
    
    /**
     * scrape data
     * @param  [type] $data [array of all source codes to be scraped]
     * @return [type]       [array of extracted and edited data]
     */
    public function scrape($data) {
        
        /*
        School Name
        Type
        City
        State
        */
        
        addSingleValue("museoSeven gray hdXLrg bold inline margin10 marginRightOnly", $_POST['cb_glance'], "name");
        addSingleValue("rankings-category", $_POST['usn'], "type");
        addSingleValue("addressLocality", $_POST['cb_glance'], "city", "itemprop");
        addSingleValue("addressRegion", $_POST['cb_glance'], "state", "itemprop");
        
        /*
        Admission Stats: RD, WL, ED & EA
        */
        
        addMultipleValues("defDesc2 copySm gray", $_POST['cb_app'], "ad_stats");
        
        /*
        SAT Ranges & Percentiles
        */
        
        /*=== ranges ===*/
        
        addMultipleValues("grid_1 grid_1_ao alpha museoSeven copyMed", $_POST['cb_sat_cr'], "sat_ranges");
        
        /*=== percentiles ===*/
        
        // addSingleValue("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_cr']);
        addMultipleValues("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_cr'], "cr");
        addMultipleValues("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_wr'], "wr");
        addMultipleValues("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_m'], "m");
        
        /*
        Fin Aid
        */
        
        addMultipleValues("bold", $_POST['intl'], "fin_aid");
        
        /*
        Popular Majors
        */
        addMultipleValues("defTitle3", $_POST['pop_majors'], "pop_majors");
        addMultipleValues("defDesc3 bold", $_POST['pop_majors'], "pop_majors_perc");
        
        /*
        Admission Criteria
        */
        
        $attr = "class";
        $name = "smallDottedList arial copySm ltGray padBottom20 visible";
        
        $doc = new DOMDocument();
        $doc->loadHTML($_POST['cb_app']);
        $xpath = new DOMXPATH($doc);
        
        $separator = array();
        $exp = "//ul[@" . $attr . "='" . $name . "']";
        $results = $xpath->query($exp);
        
        for ($i = 0; $i < $results->length; $i++) {
            $node = $results->item($i);
            
            // each ul list for "Very Important", "Important", "Considered"
            
            global $college_data;
            $crit_group = array();
            
            $children = $node->childNodes;
            
            // all nodes under each ul list
            
            for ($j = 0; $j < $children->length; $j = $j + 2) {
                $crit_group[] = $children->item($j)->nodeValue;
            }
            $college_data["crits_" . $i] = $crit_group;
        }
        
        /*
        All Majors
        */
        
        // addMultipleValues("leftTh", $_POST['majors'],"majors");
        
        $attr = "class";
        $name = "leftTh";
        
        $doc = new DOMDocument();
        $doc->loadHTML($_POST['majors']);
        $xpath = new DOMXPATH($doc);
        
        $majors = array();
        $exp = "//th[@" . $attr . "='" . $name . "']";
        $results = $xpath->query($exp);
        
        foreach ($results as $major) {
            $children = $major->childNodes;
            for ($i = 0; $i < $children->length; $i = $i + 2) {
                $majors[] = $children->item($i)->textContent;
            }
        }
        $college_data["majors"] = $majors;
        
        /*
        Class Size
        */
        
        $attr = "data-field-name";
        $name = "g_class_sizes";
        
        $doc = new DOMDocument();
        $doc->loadHTML($_POST['usn']);
        $xpath = new DOMXPATH($doc);
        
        $results = $xpath->query("//*[@" . $attr . "='" . $name . "']");
        
        $array = json_decode($results->item(1)->nodeValue);
        $values = array();
        foreach ($array->data as $arr) {
            $values[] = $arr->value;
        }
        $college_data["class-size"] = $values;
        
        // addMultipleValues("g_class_sizes", $_POST['usn'], "class-size", "data-field-name");
        
        $attr = "data-field-name";
        $name = "g_student_gender_distribution";
        
        $doc = new DOMDocument();
        $doc->loadHTML($_POST['usn']);
        $xpath = new DOMXPATH($doc);
        
        $results = $xpath->query("//*[@" . $attr . "='" . $name . "']");
        
        $array = json_decode($results->item(1)->nodeValue);
        $values = array();
        foreach ($array->data as $arr) {
            $values[] = $arr->value;
        }
        $college_data["gender-ratio"] = $values;
        
        /**
         * EDIT AND CLEAN UP DATA
         */
        $college_data["state"] = substr($college_data["state"], 2);
        
        echo json_encode($college_data);
    }
    
    /**
     * EXTRACT DATA
     */
    
    /**
     * Use XPath to extract data from HTML string, and add value to $college_data
     * @param [type] $attr_name [value of attribute of data]
     * @param [type] $source    [source string]
     * @param [type] $key       [key of data in JSON object]
     * @param string $attr      [type of attribute of data]
     */
    public function addSingleValue($attr_val = null, $source = null, $key = null, $attr = "class") {
        global $college_data;
        
        // getXPath($source);
        $doc = new DOMDocument();
        $doc->loadHTML($source);
        $xpath = new DOMXPATH($doc);
        
        $results = $xpath->query("//*[@" . $attr . "='" . $attr_val . "']");
        
        if ($results->length > 0) {
            foreach ($results as $res) {
                $college_data[$key] = $res->nodeValue;
            }
        }
    }
    
    /**
     * Use XPath to extract data from HTML string, and add multiple values as arrays to $college_data
     * @param [type] $attr_val [value of attribute of data]
     * @param [type] $source   [source string]
     * @param [type] $key      [key of data in JSON object]
     * @param string $attr     [type of attribute of data]
     */
    public function addMultipleValues($attr_val = null, $source = null, $key = null, $attr = "class") {
        global $college_data;
        
        $doc = new DOMDocument();
        $doc->loadHTML($source);
        $xpath = new DOMXPATH($doc);
        
        $values = array();
        
        $exp = "//*[@" . $attr . "='" . $attr_val . "']";
        $results = $xpath->query($exp);
        
        foreach ($results as $stat) {
            $values[] = $stat->textContent;
        }
        $college_data[$key] = $values;
    }
}
