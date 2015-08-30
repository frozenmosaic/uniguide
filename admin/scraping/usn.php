<?php 

$filename = 'usn.html';
$content = file_get_contents($filename);

$subject = $content;

/* NAME */
$pattern = '#(?<=<h1 style="width: 785px;">)((\s*)).*#';
preg_match($pattern,$subject,$name);

$name = $name[0];
echo $name;
echo "<p></p>";

/* TYPE */
$pattern = '#(?<=<a class="rankings-category" href="\/best-colleges\/rankings\/national-liberal-arts-colleges">).*(?=<\/a>)#';
preg_match($pattern,$subject,$type);

$type = $type[0];
echo $type;
echo "<p></p>";

/* RANK */
$pattern = '#(?<=<span class="rankscore-bronze cluetip cluetip-stylized")(.*)(?<=<\/sup>)(\d*)#';
preg_match($pattern,$subject,$rank);

$rank = $rank[2];
echo $rank;
echo "<p></p>";

/* POPULATION */
$pattern = '#(?<=<span>)(\d,\d{3})#'; // alternative: #(?<=<div class="t-slack">)(?s).+?(?<=<span>)(\d{1,3},\d{3})#
preg_match($pattern,$subject,$pop);

$pop = $pop[0];
echo $pop;
echo "<p></p>";

/* SETTING */
$pattern = '#(?=<td class="column-last" data-test-id="setting">)(?s).+?(?<=<span>)(?s)(\s*)(\w*)#';
preg_match($pattern,$subject,$set);

$set = $set[0];
echo $set;
echo "<p></p>";

/* TUITION & FEE */


$doc = new DOMDocument();
$doc->loadHTMLFile("usn.html");
$xpath = new DOMXPath($doc);

// $classname = "museoSeven copyLrg gray marginBtmTen visible";
$results = $xpath->query("//tbody[not(@id)][not(@class)][not(@style)]/tr[not(@style)][contains(concat(' ',normalize-space(@class),' '),\" w_room_board row-even \") or contains(concat(' ',normalize-space(@class),' '),\" v_private_tuition row-first row-odd \")]");

if ($results->length > 0) {
	$str = $results->item(0)->nodeValue;
	$str = preg_replace('/\s+/', '', $str);
	$str = substr($str, 14, 7);
	echo $str . "<br/>";

	$str = $results->item(1)->nodeValue;
	$str = preg_replace('/\s+/', '', $str);
	$str = substr($str, 12, 7);
	echo $str . "<br/>";

}

?>
