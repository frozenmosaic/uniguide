<?php 
    Login::restrictAdmin();
    $action = $this->objUrl->get('action');
    switch($action) {
        case 'add':
        require_once('school_facts/add.php');
        break;
        case 'added':
        require_once('school_facts/added.php');
        break;
        case 'added-failed':
        require_once('school_facts/added-failed.php');
        break;
        case 'added-no-upload':
        require_once('school_facts/added-no-upload.php');
        break;
        case 'edit':
        require_once('school_facts/edit.php');
        break;
        case 'edited':
        require_once('school_facts/edited.php');
        break;
        case 'edited-failed':
        require_once('school_facts/edited-failed.php');
        break;
        case 'edited-no-upload':
        require_once('school_facts/edited-no-upload.php');
        break;
        case 'remove':
        require_once('school_facts/remove.php');
        break;
        default:
        require_once('school_facts/list.php');
    }
?>