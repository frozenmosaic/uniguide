<?php 

$objCollege = new College();
$college = $objCollege->getCollegeFacts(Url::getSchoolUrl());

?>
<h1>College Profile</h1>
<p>
<?php 
echo $college['name'];
?>
</p>

