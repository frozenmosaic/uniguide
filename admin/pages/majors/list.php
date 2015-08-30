<?php
    $objMajors = new Majors();
    $majors = $objMajors->getMajors();
    $objPaging = new Paging($this->objUrl, $majors, 30);
    $rows = $objPaging->getRecords();
    require_once('_header.php');
?>
<h1>Majors</h1>
<p><a href="/<?php echo $this->objUrl->getCurrent(array('action', 'pg')).'/action/add/'; ?>">New major</a></p>
<?php if(!empty($rows)) { ?>
    <table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
        <tr>
            <th>Major</th>
            <th>Short Form</th>
            <th class="col_15 ta_r">Remove</th>
            <th class="col_5 ta_r">Edit</th>
        </tr>
        <?php foreach($rows as $major) { ?>
        <tr id="major-<?php echo $major['id'];?>">
            <td><?php echo Helper::encodeHTML($major['name']); ?></td>
            <td><?php echo Helper::encodeHTML($major['short_form']); ?></td>
            <td class="ta_r"><a href="#" data-url="<?php echo root() . "/" . $this->objUrl->getCurrent('action').'/action/remove/id/'; ?>" class="confirmRemoveMajor">Remove</a></td>
            <td class="ta_r"><a href="<?php echo root() . "/" . $this->objUrl->getCurrent('action').'/action/edit/id/' . $major['id']; ?>">Edit</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php echo $objPaging->getPaging(); ?>
<?php 
    } else {
        echo '<p>There are currently no majors.</p>' ;
    } 
?>
<?php require_once('_footer.php'); ?>