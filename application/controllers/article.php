<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		// $this->load->view('welcome_message');
        
        $this->load->view('template/header');
        // $this->load->view('pages/index');
        // $this->load->view('template/_footer');
    
	}
}
