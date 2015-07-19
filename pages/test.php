<?php 

require_once('_header.php');

$objCollege = new College();
$college = $objCollege->getCollege('Dickinson College');
?>

<h2><?php 
echo $objCollege->collegeExist('dickinson-college');

?></h2>

<?php require_once('_footer.php');?>