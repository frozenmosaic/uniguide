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


?>


<?php 

require_once('_footer.php'); ?>