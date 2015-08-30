<?php 
    $objForm = new Form();
    $objValid = new Validation($objForm);

    if($objForm->isPost('name')) {
        $objValid->_expected = array('name', 'short_form');
        $objValid->_required = array();
        $objMajors = new Majors();
        
        // $array = array("name" => $objForm->getPost('name'),
        //     "short_form" => $objForm->getPost('short_form'));

        if($objMajors->duplicateMajor($name)) {
            $objValid->add2Errors('name_duplicate');
        }
        
        $names = $objForm->getPost('name');

        foreach ($names as $key => $value) {    
            if (empty($value)) {
                $objValid->add2Errors('name');
            }
        }
        
        if($objValid->isValid()) { 
            if($objMajors->addMajor($objValid->_post)) {
                Helper::redirect(root()."/".$this->objUrl->getCurrent(array('action')).'/action/added');
            } else {
                Helper::redirect(root()."/".$this->objUrl->getCurrent(array('action')).'/action/added-failed');
            }
        }
    }
    require_once('_header.php'); 
?>
<h1>Majors :: Add</h1>

<form action="" method="post">
    <a href="#" class="addMajorInAdd">Add new row</a>
    <?php echo $objValid->validate('name'); echo $objValid->validate('name_duplicate'); ?>
    <table cellpadding="0" cellspacing="0" border="1" class="tbl_insert" id="majors">
        <tr>
            <th><label for="name">Name: *</label></th>
            <th><label for="short_form">Short Form:</label></th>
            <th>Remove</th>
        </tr>
        
        <tr id="row1" data-id="1">
            <td>
                <input type="text" name="name[]" id="name" style="width:200px;" value="<?php echo $objForm->stickyText('name'); ?>" class="fld" />
            </td>
            <td>
                <input name="short_form[]" id="short_form" class="fld" style="width:100px;" value="<?php echo $objForm->stickyText('short_form'); ?>"/>
            </td>

            <td><a href="#" data-id="1" class="removeMajorInAdd">Remove</a></td>
        </tr>

    </table>
    <div class="sbm sbm_blue fl_l">
        <input type="submit" id="btn" class="btn" value="Add" />
    </div>
    <div class="dev">&#160;</div>

</form>
<?php require_once('_footer.php'); ?>