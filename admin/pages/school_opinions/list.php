<?php 

$objArticle = new Article();

$articles = $objArticle->getArticles();

$empty = 'There are no results matching your searching criteria.';

$objPaging = new Paging($this->objUrl, $articles, 5);
$rows = $objPaging->getRecords();

$objPaging->_Url = 'admin'.$objPaging->_Url;

require_once('_header.php') ;

?>

<h1>Articles</h1>

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