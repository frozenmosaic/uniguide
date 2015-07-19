<?php 

echo 'abc';

$id = Url::getParam('id');

if (!empty($id)) {

$objCatalogue = new Catalogue();
$category = $objCatalogue->getCategory($id);

if (!empty($category)) {

$objForm = new Form();
$objValid = new Validation($objForm);

if ($objForm->isPost('name')) {
	$objValid->_expected = array('name');
	$objValid->_required = array('name');

	$name = $objForm->getPost('name');

	if ($objCatalogue->duplicateCategory($name, $id)) {
			$objValid->add2Errors('name_duplicate');	
	} 

	if ($objValid->isValid()) {
		if ($objCatalogue->updateCategory($name, $id)) {
			$url = Url::getCurrentUrl(array('action', 'id')).'&action=edited';
			$url = substr_replace($url, "/start/admin/", 0, 7);
			Helper::redirect($url);
		} else {
			$url = Url::getCurrentUrl(array('action', 'id')).'&action=edited-failed';
			$url = substr_replace($url, "/start/admin/", 0, 7);
			Helper::redirect($url);

		}
	}
}

require_once('template/_header.php'); ?>

<h1>Categories :: Edit</h1>

<form action="" method="post">
	
	<table cellspacing="0" cellpadding="0" border="0" class="tbl_insert">

		<tr>
			<th><label for="name">Name: *</label></th>
			<td>
				<?php 
					echo $objValid->validate('name_duplicate'); 
					echo $objValid->validate('name');
				?>
				<input type="text" name="name" id="name" value="<?php echo $objForm->stickyText('name', $category['name']);?>" class="fld" />
			</td>
		</tr>

		<tr>
			<th>&nbsp;</th>
			<td>
				<label for="btn" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn" class="btn" value="Update">
				</label>
			</td>
		</tr>

	</table>

</form>

<?php 
		require_once('template/_header.php'); 
	}	
}
?>