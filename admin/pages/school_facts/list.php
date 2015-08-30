<?php 

$objSFacts = new SchoolFacts();

$sfacts = $objSFacts->getSchools();
$empty = 'There are no records.';

$objPaging = new Paging($this->objUrl, $articles, 5);
$rows = $objPaging->getRecords();

$objPaging->_Url = 'admin'.$objPaging->_Url;

require_once('_header.php') ;

?>

<h1>School Facts</h1>

<p><a href="<?php echo root() . '/'. $this->objUrl->getCurrent() . '/action/add'; ?>">New School</a></p>

<?php if (!empty($rows)) { ?>

<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
	<tr>
		<th class="col_5">ID</th>
		<th>School</th>
		<th class="col_15 ta_r">Remove</th>
		<th class="col_15 ta_r">Edit</th>
	</tr>

	<?php foreach ($rows as $article) { ?>

	<tr>
		<td><?php echo $sfacts['id'];?></td>
		<td><?php echo Helper::encodeHTML($sfacts['name']);?></td>
		<td class="ta_r"><a href="/start/admin/?page=school_facts&amp;action=remove&amp;id=<?php echo $sfacts['id'];?>">Remove</a></td>
		<td class="ta_r"><a href="/start/admin?page=school_facts&amp;action=edit&amp;id=<?php echo $sfacts['id'];?>">Edit</a></td>
	</tr>

	<?php }?>
</table>

<?php echo $objPaging->getPaging();?>

<?php } else { 
	echo '<p>'.$empty.'</p>';
} ?>
<?php require_once('template/_footer.php') ;?>