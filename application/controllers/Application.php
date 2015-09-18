<?php 
class Application extends CI_Controller {

	public $db;

	public function __construct() {
		$this->db = new Dbase();
	}

}