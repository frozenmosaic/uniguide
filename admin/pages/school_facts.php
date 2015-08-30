<?php 
    Login::restrictAdmin();
    $action = $this->objUrl->get('action');
    switch($action) {
        case 'add':
        require_once('school_facts/add-source.php');
        break;
        case 'added':
        require_once('school_facts/added.php');
        break;
        case 'added-failed':
        require_once('school_facts/added-failed.php');
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
        
        case 'review':
        require_once('school_facts/review.php');
        break;

        default:
        require_once('school_facts/list.php');
    }
?>