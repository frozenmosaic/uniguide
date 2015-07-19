<?php 

$id = Url::getParam('id');

if (!empty($id)) {

	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($id);

	if (!empty($category)) {

		$url = Url::getCurrentUrl().'&amp;remove=1';
		$yes = substr_replace($url, "/start/admin/", 0, 6);
		$no = 'javascript:history.go(-1)';

		$remove = Url::getParam('remove');

		if (!empty($remove)) {
			$objCatalogue->removeCategory($id);

			Helper::redirect(substr_replace(Url::getCurrentUrl(array('action', 'remove', 'srch', Paging::$_key)), "/start/admin/", 0, 6));
		}
require_once('template/_header.php'); ?>

<h1>Categories :: Remove</h1>
<p>Are you sure you want to remove this record?<br/>
There is no undo!<br />
<a href="<?php echo $yes;?>">Yes</a> | <a href="<?php echo $no;?>">No</a></p>

<?php 
		require_once('template/_footer.php'); 
	}

}
?>
