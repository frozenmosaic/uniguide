Vy2<?php
class Majors extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('model_majors');
    }
    
    
    /**
     * load list of all majors in database
     * @return [type] [description]
     */
    public function index() {
        
        // $config['base_url'] = site_url('admin/majors');
        // $config['total_rows'] = 1212;
        // $config['per_page'] = 20;
        // $config['use_page_numbers'] = TRUE;
        
        // $this->pagination->initialize($config);
        
        $data['results'] = $this->model_majors->getMajors();
        
        // $data['links'] = $this->pagination->create_links();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/list', Array('data' => $data));
        $this->load->view('admin/template/footer');
    }
}
