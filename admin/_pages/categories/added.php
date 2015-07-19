<?php 
$url = Url::getCurrentUrl(array('action', 'id'));
$url = substr_replace($url, "/start/admin/", 0, 7);

require_once('template/_header.php');
?>

<h1>Categories :: Add</h1>
<p>The new record has been added successfully. <br/> 
<a href="<?php echo $url;?>">Go back to list of categories.</a></p>

<?php require_once('template/_footer.php'); ?>