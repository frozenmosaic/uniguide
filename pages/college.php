<?php 

$objCollege = new College();
$college = $objCollege->getCollegeFacts(Url::getSchoolUrl());

require_once('_header.php');?>

<h1>College Profile</h1>
<p>
<?php 
echo $college['name'];
?>
</p>

<?php require_once('_footer.php');?>
