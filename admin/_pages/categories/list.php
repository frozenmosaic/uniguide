<?php 

$objCatalogue = new Catalogue();
$categories = $objCatalogue->getCategories();

$objPaging = new Paging($categories, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = substr_replace($objPaging->_url, "/start/admin/", 0, 7);

require_once('template/_header.php'); ?>

<h1>Categories</h1>

<p><a href="/start/admin/?page=categories&amp;action=add">New Category</a></p>

<?php if (!empty($rows)) { ?>

<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
	<tr>
		<th>Category</th>
		<th class="col_15 ta_r">Remove</th>
		<th class="col_15 ta_r">Edit</th>
	</tr>

	<?php foreach ($rows as $category) { ?>

	<tr>
		<td><?php echo Helper::encodeHTML($category['name']);?></td>
		<td class="ta_r"><a href="/start/admin/?page=categories&amp;action=remove&amp;id=<?php echo $category['id'];?>">Remove</a></td>
		<td class="ta_r"><a href="/start/admin?page=categories&amp;action=edit&amp;id=<?php echo $category['id'];?>">Edit</a></td>
	</tr>

	<?php }?>
</table>

<?php echo $objPaging->getPaging();?>

<?php } else { ?>

<p>There are currently no categories.</p>

<?php } ?>
<?php require_once('template/_footer.php') ;?>