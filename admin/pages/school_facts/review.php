<?php 

$objForm = new Form();
$objValid = new Validation();

require_once('_header.php'); ?>

<h1> Schools :: Review </h1>
<form>
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
		<tr>
            <th><label for="src">Name: *</label></th>
            <td><?php echo $objValid->validate('name'); ?>
            <input type="text" name="name" id="name" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Type: *</label></th>
            <td><?php echo $objValid->validate('type'); ?>
            <input type="text" name="type" id="type" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Rank: *</label></th>
            <td><?php echo $objValid->validate('rank'); ?>
            <input type="text" name="rank" id="rank" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Population: *</label></th>
            <td><?php echo $objValid->validate('population'); ?>
            <input type="text" name="population" id="population" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">City: *</label></th>
            <td><?php echo $objValid->validate('city'); ?>
            <input type="text" name="city" id="city" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">State: *</label></th>
            <td><?php echo $objValid->validate('state'); ?>
            <input type="text" name="state" id="state" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">ED Stats: *</label></th>
            <td><?php echo $objValid->validate('ed'); ?>
            <input type="text" name="ed" id="ed" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">EA Stats: *</label></th>
            <td><?php echo $objValid->validate('ea'); ?>
            <input type="text" name="ea" id="ea" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">RD Stats: *</label></th>
            <td><?php echo $objValid->validate('rd'); ?>
            <input type="text" name="rd" id="rd" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">WL Stats: *</label></th>
            <td><?php echo $objValid->validate('wl'); ?>
            <input type="text" name="wl" id="wl" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Tuition: *</label></th>
            <td><?php echo $objValid->validate('tuition'); ?>
            <input type="text" name="tuition" id="tuition" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Room & Board: *</label></th>
            <td><?php echo $objValid->validate('rb'); ?>
            <input type="text" name="rb" id="rb" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Average Aid Package: *</label></th>
            <td><?php echo $objValid->validate('avg_aid'); ?>
            <input type="text" name="avg_aid" id="avg_aid" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Number of Aid Packages: *</label></th>
            <td><?php echo $objValid->validate('no_aid'); ?>
            <input type="text" name="no_aid" id="no_aid" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Setting: *</label></th>
            <td><?php echo $objValid->validate('setting'); ?>
            <input type="text" name="setting" id="setting" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Class Size: *</label></th>
            <td><?php echo $objValid->validate('class_size'); ?>
            <input type="text" name="class_size" id="class_size" value="" class="fld"></td>
        </tr>

        <tr>
            <th><label for="src">Gender Ratio: *</label></th>
            <td><?php echo $objValid->validate('gender_ratio'); ?>
            <input type="text" name="gender_ratio" id="gender_ratio" value="" class="fld"></td>
        </tr>

        <tr>
            <th>&nbsp;</th>
            <td><label for="btn" class="sbm sbm_blue fl_l"><input type="submit" id="btn" class="btn" value="Add To Database" /></label></td>
        </tr>
	</table>
</form>

<?php 
$usn = (string) $_POST['usn'];
$usn = str_replace("script", "", $usn);
// echo $usn;
// preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $usn);
// print_r($_POST);
// $filename = $_POST['usn'];
// $content = file_get_contents($filename);

// $subject = $_POST['usn'];

// /* NAME */
$pattern = '#(?<=<h1 style="width: 785px;">)((\s*)).*#';
preg_match($pattern,$usn,$name);

// $name = $name[0];
print_r($name);
echo "<p></p>";

/* TYPE */
// $pattern = '#(?<=<a class="rankings-category" href="\/best-colleges\/rankings\/national-liberal-arts-colleges">).*(?=<\/a>)#';
// preg_match($pattern,$subject,$type);

// $type = $type[0];
// echo $type;
// echo "<p></p>";

// /* RANK */
// $pattern = '#(?<=<span class="rankscore-bronze cluetip cluetip-stylized")(.*)(?<=<\/sup>)(\d*)#';
// preg_match($pattern,$subject,$rank);

// $rank = $rank[2];
// echo $rank;
// echo "<p></p>";

// /* POPULATION */
// $pattern = '#(?<=<span>)(\d,\d{3})#'; // alternative: #(?<=<div class="t-slack">)(?s).+?(?<=<span>)(\d{1,3},\d{3})#
// preg_match($pattern,$subject,$pop);

// $pop = $pop[0];
// echo $pop;
// echo "<p></p>";

// /* SETTING */
// $pattern = '#(?=<td class="column-last" data-test-id="setting">)(?s).+?(?<=<span>)(?s)(\s*)(\w*)#';
// preg_match($pattern,$subject,$set);

// $set = $set[0];
// echo $set;
// echo "<p></p>";

// /* TUITION & FEE */

// $doc = new DOMDocument();
// $doc->loadHTMLFile($usn);
// $xpath = new DOMXPath($doc);

// // $classname = "museoSeven copyLrg gray marginBtmTen visible";
// $results = $xpath->query("//tbody[not(@id)][not(@class)][not(@style)]/tr[not(@style)][contains(concat(' ',normalize-space(@class),' '),\" w_room_board row-even \") or contains(concat(' ',normalize-space(@class),' '),\" v_private_tuition row-first row-odd \")]");

// if ($results->length > 0) {
//     $str = $results->item(0)->nodeValue;
//     $str = preg_replace('/\s+/', '', $str);
//     $str = substr($str, 14, 7);
//     echo $str . "<br/>";

//     $str = $results->item(1)->nodeValue;
//     $str = preg_replace('/\s+/', '', $str);
//     $str = substr($str, 12, 7);
//     echo $str . "<br/>";

// }

?>


<?php 

require_once('_footer.php'); ?>