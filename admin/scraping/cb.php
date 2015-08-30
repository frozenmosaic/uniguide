<?php 

$doc = new DOMDocument();
$doc->loadHTMLFile("cb-applying.html");
$xpath = new DOMXPath($doc);

// $classname = "museoSeven copyLrg gray marginBtmTen visible";
// $results = $xpath->query("//*[@class='" . $classname . "']");

// if ($results->length > 0) {
// 	foreach ($results as $res) {
//     	echo $res->nodeValue . "<br/>";		
// 	}
// }

$file_glance = 'cb-glance.html';
$sj_glance = file_get_contents($file_glance);

/*=== CITY & STATE ===*/
$pattern = '#(?<=class="locality">).*(?=<\/span><span class="region")#';
preg_match($pattern, $sj_glance, $city);

echo $city[0] . "<br/>";

$pattern = '#(?<=class="region">, ).*(?=<\/span>&nbsp;)#';
preg_match($pattern, $sj_glance, $state);

echo $state[0] . "<br/>";

/*====== ADMISSION STATS =======*/
/* REGULAR */
$file_applying = 'cb-applying.html';
$sj_applying = file_get_contents($file_applying);

// $pattern = '#(?<=class="defTitle2 copySm ltGray">)[a-zA-Z0-9_ ]*(?=<\/div>)#';
// preg_match_all($pattern, $sj_applying, $app_stats);
// print_r($app_stats);
// echo "<br/>";

// $classname = "defTitle2 copySm ltGray";
// $results = $xpath->query("//*[@class='" . $classname . "']/text()");

// if ($results->length > 0) {
// 	foreach ($results as $res) {
//     	echo $res->nodeValue . "<br/>";		
// 	}
// }


$pat = '#(?<=name="regular)(.*)(>)(\d{1,3}(,\d{3})*(\.\d+)?)#';
preg_match_all($pat, $sj_applying, $reg);
print_r($reg[3]);
echo "<br/>";

/* WAITLIST */
$pat = '#(?<=name="waitList)(.*)(>)(\d{1,3}(,\d{3})*(\.\d+)?)#';
preg_match_all($pat, $sj_applying, $wl);
print_r($wl[3]);
echo "<br/>";

/* ED & EA */
$pat = '#(?<=name="early)(.*)(>)(\d{1,3}(,\d{3})*(\.\d+)?)#';
preg_match_all($pat, $sj_applying, $early);
print_r($early[3]);
echo "<br/>";

/* AD CRITERIA */

$classname = "smallDottedList arial copySm ltGray padBottom20 visible";
$results = $xpath->query("//*[@class='" . $classname . "']");

if ($results->length > 0) {
	foreach ($results as $res) {
    	echo $res->nodeValue . "<br/>";		
	}
}

// $lists = $doc->getElementsByTagName('li');
// foreach ($lists as $ls) {
//     echo $ls->nodeValue . "<br/>";
// }

/*======= SAT ========*/
$cr = 'cb-sat-cr.html';
$sj_cr = file_get_contents($cr);

/* RANGES */
$pat = '#(?<=class="grid_1 grid_1_ao alpha museoSeven copyMed">)[a-zA-Z0-9_ -]*(?=<\/div>)#';
preg_match_all($pat, $sj_cr, $res);
print_r($res[0]);
echo "<br/>";

/* PERCENTILE */

/* CR */
$pat = '#(?<=class="percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray">)[0-9_ -%]*(?=<\/span>)#';
preg_match_all($pat, $sj_cr, $res);
print_r($res[0]);
echo "<br/>";

/* MATH */
$cr = 'cb-sat-math.html';
$sj_cr = file_get_contents($cr);
$pat = '#(?<=class="percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray">)[0-9_ -%]*(?=<\/span>)#';
preg_match_all($pat, $sj_cr, $res);
print_r($res[0]);
echo "<br/>";

/* WRITING */
$cr = 'cb-sat-wr.html';
$sj_cr = file_get_contents($cr);
$pat = '#(?<=class="percentageBarDisplayText padTen padLeftOnly copyXXLrg museoSeven gray">)[0-9_ -%]*(?=<\/span>)#';
preg_match_all($pat, $sj_cr, $res);
print_r($res[0]);
echo "<br/>";

/*===== FIN AID ====*/
$doc = new DOMDocument();
$doc->loadHTMLFile("cb-intl.html");
$xpath = new DOMXPATH($doc);

$classname = "bold";
$results = $xpath->query("//*[@class='" . $classname . "']");

if ($results->length > 0) {
	foreach ($results as $res) {
    	echo $res->nodeValue . "<br/>";		
	}
}

/*==== MAJORS ====*/
$doc = new DOMDocument();
$doc->loadHTMLFile("cb-majors.html");
$xpath = new DOMXPATH($doc);

$classname = "defTitle3";
$results = $xpath->query("//*[@class='" . $classname . "']");

if ($results->length > 0) {
	foreach ($results as $res) {
    	echo $res->nodeValue . "<br/>";		
	}
}

$classname = "defDesc3 bold";
$results = $xpath->query("//*[@class='" . $classname . "']");

if ($results->length > 0) {
	foreach ($results as $res) {
    	echo $res->nodeValue . "<br/>";		
	}
}

/*==== ALL MAJORS ====*/
$doc = new DOMDocument();
$doc->loadHTMLFile("cb-allmajors.html");
$xpath = new DOMXPATH($doc);

$targetname = "_new";
$results = $xpath->query("//*[@target='" . $targetname . "']");

if ($results->length > 0) {
	foreach ($results as $res) {
    	echo $res->nodeValue . "<br/>";		
	}
}

/*==== CLASS SIZE ====*/
$doc = new DOMDocument();
$doc->loadHTMLFile("usn.html");
$xpath = new DOMXPATH($doc);

$name = "g_class_sizes";
$results = $xpath->query("//*[@data-field-name='" . $name . "']");

// if ($results->length > 0) {
// 	foreach ($results as $res) {
//     	echo $res->nodeValue . "<br/>";		
// 	}
// }

$array = json_decode($results->item(1)->nodeValue);

foreach($array->data as $arr) {
	echo $arr->value . "<br/>";
}

$name = "g_student_gender_distribution";
$results = $xpath->query("//*[@data-field-name='" . $name . "']");

$array = json_decode($results->item(1)->nodeValue);

foreach($array->data as $arr) {
	echo $arr->value . "<br/>";
}


