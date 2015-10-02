<?php 

class SchoolFacts extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->model("model_schoolfacts");
	}

	
	/**
	 * load list of all schools in databse
	 * @return [type] [description]
	 */
	public function index() {

	}

	
	/**
	 * load add-source form
	 */
	public function add() {
		$this->load->view('template/header');
		$this->load->view('admin/schoolfacts/add');
		$this->load->view('template/footer');
	}

	
	/**
	 * scrape data after being added
	 */
	public function process() {
		$this->load->model('scrape');
		$this->scrape->scrape();
	}

}