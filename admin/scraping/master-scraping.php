<?php
global $college_data;
$college_data = array();

/**
 * EXTRACT DATA
 */

// function getXPath($source = null) {
// 	$doc = new DOMDocument();
//     $doc->loadHTML($source);
//     $xpath = new DOMXPATH($doc);
// }

/**
 * Use XPath to extract data from HTML string.
 * @param [type] $attr_name [value of attribute of data]
 * @param [type] $source    [source string]
 * @param [type] $key       [key of data in JSON object]
 * @param string $attr      [type of attribute to fetch data]
 */
function addToList($attr_val = null, $source = null, $key = null, $attr = "class") {
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

function addArrayToList() {

}

/*
School Name 
Type
City 
State 
*/

addToList("museoSeven gray hdXLrg bold inline margin10 marginRightOnly", $_POST['cb_glance'], "name");
addToList("rankings-category", $_POST['usn'], "type");
addToList("addressLocality", $_POST['cb_glance'], "city", "itemprop");
addToList("addressRegion", $_POST['cb_glance'], "state", "itemprop");

/*
Admission Stats: RD, WL, ED & EA
*/

$doc = new DOMDocument();
$doc->loadHTML($_POST['cb_app']);
$xpath = new DOMXPATH($doc);

$attr = "class";
$attr_val = "defDesc2 copySm gray";

$ad_stats = array();

$exp = "//*[@" . $attr . "='" . $attr_val . "']";
$results = $xpath->query($exp);

foreach ($results as $stat) {
	$ad_stats[] = $stat->textContent;
}
$college_data["ad_stats"] = $ad_stats;

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

for($i=0; $i < $results->length; $i++) {
	$node = $results->item($i);

	global $college_data;
	$crit_group = array();

	$children = $node->childNodes;

	for ($j=0; $j < $children->length; $j = $j+2) {
		$crit_group[] = $children->item($j)->nodeValue;
	}
	$college_data["crits_" . $i] = $crit_group;

}


/*
SAT Ranges & Percentiles
*/

/*=== ranges ===*/
// addToList("grid_1 grid_1_ao alpha museoSeven copyMed", $_POST['cb_sat_cr'], "sat_ranges");
$doc = new DOMDocument();
$doc->loadHTML($_POST['cb_sat_cr']);
$xpath = new DOMXPATH($doc);

$attr = "class";
$attr_val = "grid_1 grid_1_ao alpha museoSeven copyMed";

$ad_stats = array();

$exp = "//*[@" . $attr . "='" . $attr_val . "']";
$results = $xpath->query($exp);

foreach ($results as $stat) {
	$ad_stats[] = $stat->textContent;
}
$college_data["sat_ranges"] = $ad_stats;

/*=== percentiles ===*/
// addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_cr']);
$doc = new DOMDocument();
$doc->loadHTML($_POST['cb_sat_cr']);
$xpath = new DOMXPATH($doc);

$attr = "class";
$attr_val = "percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gra";

$ad_stats = array();

$exp = "//*[@" . $attr . "='" . $attr_val . "']";
$results = $xpath->query($exp);

foreach ($results as $stat) {
	$ad_stats[] = $stat->textContent;
}
$college_data["cr"] = $ad_stats;

// addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_wr']);

$doc = new DOMDocument();
$doc->loadHTML($_POST['cb_sat_wr']);
$xpath = new DOMXPATH($doc);

$attr = "class";
$attr_val = "percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gra";

$ad_stats = array();

$exp = "//*[@" . $attr . "='" . $attr_val . "']";
$results = $xpath->query($exp);

foreach ($results as $stat) {
	$ad_stats[] = $stat->textContent;
}
$college_data["wr"] = $ad_stats;

// addToList("percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray", $_POST['cb_sat_m']);
$doc = new DOMDocument();
$doc->loadHTML($_POST['cb_sat_m']);
$xpath = new DOMXPATH($doc);

$attr = "class";
$attr_val = "percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gra";

$ad_stats = array();

$exp = "//*[@" . $attr . "='" . $attr_val . "']";
$results = $xpath->query($exp);

foreach ($results as $stat) {
	$ad_stats[] = $stat->textContent;
}
$college_data["m"] = $ad_stats;

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

/**
 * EDIT AND CLEAN UP DATA
 */
$college_data[3] = substr($college_data[3], 2);

echo json_encode($college_data);
?>

