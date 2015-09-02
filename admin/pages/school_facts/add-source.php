<?php
$objForm = new Form();
$objValid = new Validation($objForm);
$objSFacts = new SchoolFacts();

require_once ('_header.php');
?>
<h1>Schools :: Add Sources</h1>
<form action="" method="post" id="source" data-url="<?php
echo root() . '/' . 'admin/scraping/master-scraping.php'; ?>">
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        
        <tr>
            <th><label for="usn">US News: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
                <label class="warn" id="usn-label"></label>
            <input type="text" name="usn" id="usn" class="fld" ></td>
        </tr>

        <tr>
            <th><label for="cb_glance">CB - At A Glance: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="cb_glance-label"></label>
            <input type="text" name="cb_glance" id="cb_glance" value="<?php
echo $objForm->stickyText('cb_glance'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th><label for="cb_app">CB - Applying: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="cb_app-label"></label>
            <input type="text" name="cb_app" id="cb_app" value="<?php
echo $objForm->stickyText('cb_app'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th><label for="cb_sat_cr">CB - SAT/CR: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="cb_sat_cr-label"></label>
            <input name="cb_sat_cr" id="cb_sat_cr" value="<?php
echo $objForm->stickyText('cb_sat_cr'); ?>" class="fld"></td>
        </tr>

        <tr>
            <th><label for="cb_sat_m">CB - SAT/M: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="cb_sat_m-label"></label>
            <input  name="cb_sat_m" id="cb_sat_m" value="<?php
echo $objForm->stickyText('cb_sat_m'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th><label for="cb_sat_wr">CB - SAT/WR: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="cb_sat_wr-label"></label>
            <input  name="cb_sat_wr" id="cb_sat_wr" value="<?php
echo $objForm->stickyText('cb_sat_wr'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th><label for="pop_majors">CB - Popular Majors: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="pop_majors-label"></label>
            <input  name="pop_majors" id="pop_majors" value="<?php
echo $objForm->stickyText('pop_majors'); ?>" class="fld"   cols="70"/></td>
        </tr>
        
        <tr>
            <th><label for="majors">CB - All Majors: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="majors-label"></label>
            <input  name="majors" id="majors" value="<?php
echo $objForm->stickyText('majors'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th><label for="intl">CB - International: *</label></th>
            <td><?php
echo $objValid->validate('src'); ?>
            <label class="warn" id="intl-label"></label>
            <input  name="intl" id="intl" value="<?php
echo $objForm->stickyText('intl'); ?>" class="fld"   cols="70"/></td>
        </tr>

        <tr>
            <th>&nbsp;</th>
            <td><label for="btn" class="sbm sbm_blue fl_l"><input type="submit" id="btn" class="btn" value="Submit" /></label></td>
        </tr>
    </table>
</form>

<?php
require_once ('_footer.php'); ?>