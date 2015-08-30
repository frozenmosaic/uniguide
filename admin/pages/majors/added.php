<?php
    $url = $this->objUrl->getCurrent(array('action'));
    require_once('_header.php');
?>
<h1>Majors :: Add</h1>
<p>The new record has been added successfully.<br /><a href="<?php echo $url; ?>">Go back to the list of majors.</a></p>
<?php print_r($this->objUrl->_params)?>
<?php
    require_once('_footer.php');
?>