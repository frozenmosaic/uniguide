<?php 
    Login::restrictAdmin();
    $action = $this->objUrl->get('action');
    switch($action) {
        case 'add':
        require_once('articles/add.php');
        break;
        case 'added':
        require_once('articles/added.php');
        break;
        case 'added-failed':
        require_once('articles/added-failed.php');
        break;
        case 'added-no-upload':
        require_once('articles/added-no-upload.php');
        break;
        case 'edit':
        require_once('articles/edit.php');
        break;
        case 'edited':
        require_once('articles/edited.php');
        break;
        case 'edited-failed':
        require_once('articles/edited-failed.php');
        break;
        case 'edited-no-upload':
        require_once('articles/edited-no-upload.php');
        break;
        case 'remove':
        require_once('articles/remove.php');
        break;
        default:
        require_once('articles/list.php');
    }
?>