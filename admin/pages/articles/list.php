<?php 

$objArticle = new Article();
$srch = Url::getParam('srch');

if (!empty($srch)) {
	$articles = $objArticle->getAllArticles($srch);
	$empty = 'There are no results matching your searching criteria.';
} else {
	$articles = $objArticle->getAllArticles();
	$empty = 'There are currently no records.';
}

$objPaging = new Paging($articles, 5);
$rows = $objPaging->getRecords();

$objPaging->_url = 'admin'.$objPaging->_url;

require_once('template/_header.php') ;

?>

<h1>Articles</h1>

<form action="" method="get">
	<?php echo Url::getParams4Search(array('srch', Paging::$_key));?>
	<table cellspacing="0" cellpadding="0" border="0" class="tbl_repeat">
		<tr>
			<th><label for="srch">Article:</label></th>
			<td>
				<input type="text" name="srch" id="srch" value="<?php echo stripcslashes($srch) ;?>" class="fld" />
			</td>
			<td>
				<label for="btn_add" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn_add" class="btn" value="Search" />
				</label>
			</td>
		</tr>
	</table>
</form>

<div class="dev br_td">&#160;</div>

<p><a href="/start/admin/?page=products&amp;action=add">New Article</a></p>

<?php if (!empty($rows)) { ?>

<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
	<tr>
		<th class="col_5">ID</th>
		<th>Article</th>
		<th class="col_15 ta_r">Remove</th>
		<th class="col_15 ta_r">Edit</th>
	</tr>

	<?php foreach ($rows as $article) { ?>

	<tr>
		<td><?php echo $article['id'];?></td>
		<td><?php echo Helper::encodeHTML($article['name']);?></td>
		<td class="ta_r"><a href="/start/admin/?page=products&amp;action=remove&amp;id=<?php echo $article['id'];?>">Remove</a></td>
		<td class="ta_r"><a href="/start/admin?page=products&amp;action=edit&amp;id=<?php echo $article['id'];?>">Edit</a></td>
	</tr>

	<?php }?>
</table>

<?php echo $objPaging->getPaging();?>

<?php } else { 
	echo '<p>'.$empty.'</p>';
} ?>
<?php require_once('template/_footer.php') ;?>