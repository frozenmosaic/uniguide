<?php 
    Login::restrictAdmin();
    $action = $this->objUrl->get('action');
    $id = $this->objUrl->get('id');
    $objMajors = new Majors();

    switch($action) {
        case 'add':
        require_once('majors/add.php');
        break;
        case 'added':
        require_once('majors/added.php');
        break;
        case 'added-failed':
        require_once('majors/added-failed.php');
        break;
        
        case 'edited':
        require_once('majors/edited.php');
        break;
        case 'edited-failed':
        require_once('majors/edited-failed.php');
        break;
        
        case 'edit':
        case 'remove':
        if ($objMajors->recordExist($id)) {
            switch ($action) {
                case 'edit':
                    require_once('majors/edit.php');
                    break;
                
                case 'remove':
                    require_once('majors/remove.php');   
                    break;
            }
             
        } else {
            require_once('record_not_exist.php');
        }

        break;

        default:
        require_once('majors/list.php');
    }
?>