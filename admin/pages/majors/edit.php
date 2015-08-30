<?php 

$objMajors = new Majors();
$major = $objMajors->getMajor($id);

$objForm = new Form();
$objValid = new Validation($objForm);

if ($objForm->isPost('name')) {

	$objForm->_required = array('name');
	$objForm->_expected = array('name', 'short_form');

	$name = $objForm->getPost('name');

	if ($objMajors->duplicateMajor($name)) {
		$objValid->add2Errors('name_duplicate');
	}

	if ($objValid->isValid()) {
		if ($objMajors->updateMajor($objValid->_post, $id)) {
			Helper::redirect(root() . "/" . $this->objUrl->getCurrent(array('action', 'id')) . '/action/edited');
		} else {
			Helper::redirect(root() . "/" . $this->objUrl->getCurrent(array('action', 'id')) . '/action/edited-failed');
		}
	}
}

require_once('_header.php');

?>
<h1> Major :: Edit :: 
<?php 
echo $major['name'];?> </h1>

<form action="" method="post">
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
        <tr>
            <th><label for="name">Name: *</label></th>
            <td><?php echo $objValid->validate('name'); echo $objValid->validate('name_duplicate'); ?>
	            <input type="text" name="name" id="name" value="<?php echo $objForm->stickyText('name', $major['name']); ?>" class="fld" />
            </td>
        </tr>
        <tr>
            <th><label for="identity">Short form: </label></th>
            <td>
	            <input type="text" name="short_form" id="short_form" value="<?php echo $objForm->stickyText('short_form', $major['short_form']); ?>" class="fld" />
            </td>
        </tr>
       
        <tr>
            <th>&nbsp;</th>
            <td><label for="btn" class="sbm sbm_blue fl_l"><input type="submit" id="btn" class="btn" value="Update" /></label></td>
        </tr>
    </table>
</form>

<?php require_once('_footer.php'); 



 