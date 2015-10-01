<h1>LIST</h1>
<?php  ?>
<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
        <tr>
            <th>Major</th>
            <th>Short Form</th>
            <th class="col_15 ta_r">Remove</th>
            <th class="col_5 ta_r">Edit</th>
        </tr>
        <?php foreach($data['results'] as $major) { ?>
        <tr id="major-<?php echo $major->id;?>">
            <td><?php echo $major->name; ?></td>
            <td><?php echo $major->short_form; ?></td>
            <td class="ta_r"><a href="#" data-url="" class="confirmRemoveMajor">Remove</a></td>
            <td class="ta_r"><a href="">Edit</a></td>
        </tr>
        <?php } ?>
</table>




