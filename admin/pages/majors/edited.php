<?php
    $url = root() . "/" . $this->objUrl->getCurrent(array('action', 'id'));
    require_once('_header.php');
?>
<h1>Major :: Edited </h1>
<p>This record has been updated successfully.<br /><a href="<?php echo $url; ?>">Go back to the list of categories.</a></p>
<?php
    require_once('_footer.php');
?>