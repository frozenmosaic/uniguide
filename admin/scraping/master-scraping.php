<?php
global $college_data;
$college_data = array();

function addToList($name = null, $source = null, $attr = "class") {
    global $college_data;
    $doc = new DOMDocument();
    $doc->loadHTML($source);
    $xpath = new DOMXPATH($doc);
    
    $results = $xpath->query("//*[@" . $attr . "='" . $name . "']");
    
    if ($results->length > 0) {
        foreach ($results as $res) {
            $college_data[] = $res->nodeValue;
        }
    }
}

/*
School Name 
Type
City & State 
*/

addToList("museoSeven gray hdXLrg bold inline margin10 marginRightOnly", $_POST['cb_glance']);
addToList("rankings-category", $_POST['usn']);
addToList("addressLocality", $_POST['cb_glance'], "itemprop");
addToList("addressRegion", $_POST['cb_glance'], "itemprop");

/*
Admission Stats: RD, WL, ED & EA
Admission Criteria
*/

addToList("defTitle2 copySm ltGray", $_POST['cb_app']);
addToList("defDesc2 copySm gray", $_POST['cb_app']);

addToList("smallDottedList arial copySm ltGray padBottom20 visible", $_POST['cb_app']);

/*
SAT Ranges & Percentiles
*/

addToList("grid_1 grid_1_ao alpha museoSeven copyMed", $_POST['cb_sat_cr']);
addToList("grid_1 grid_1_ao alpha museoSeven copyMed", $_POST['cb_sat_wr']);
addToList("grid_1 grid_1_ao alpha museoSeven copyMed", $_POST['cb_sat_m']);

addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_cr']);
addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_wr']);
addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_m']);

/*
Fin Aid
*/

addToList("bold", $_POST['intl']);

/*
Popular Majors
*/
addToList("defTitle3", $_POST['pop_majors']);
addToList("defDesc3 bold", $_POST['pop_majors']);

/*
All Majors
*/
addToList("leftTh", $_POST['majors']);

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
foreach ($array->data as $arr) {
    global $college_data;
    $college_data[] = $arr->value;
}

$attr = "data-field-name";
$name = "g_student_gender_distribution";

$doc = new DOMDocument();
$doc->loadHTML($_POST['usn']);
$xpath = new DOMXPATH($doc);

$results = $xpath->query("//*[@" . $attr . "='" . $name . "']");
$array = json_decode($results->item(1)->nodeValue);
foreach ($array->data as $arr) {
    global $college_data;
    $college_data[] = $arr->value;
}

// echo json_encode($college_data);
print_r($college_data);
