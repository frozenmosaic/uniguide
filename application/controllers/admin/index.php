<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->model('admin_model');
	}
	
	public function index()
	{
		// $this->load->view('welcome_message');
        
        // $this->load->view('template/_header');
        // $this->load->view('pages/index');
        $this->load->view('template/_footer');
    
	}

	// public function majors() {
	// 	redirect(base_url('../admin_majors'));
	// }
}
