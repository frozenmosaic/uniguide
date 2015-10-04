Vy2<?php
class Majors extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('model_majors');
        $this->load->library('pagination');
        $this->load->helper('url');
    }
    
    
    /**
     * load list of all majors in database
     * @return [type] [description]
     */
    public function index() {

        $this->load->view('admin/template/header');

        $config = array();
        $data  = array();
         $config['base_url'] = base_url().'admin/majors';
         $config['total_rows'] = $this->model_majors->count_Record();
         $config['per_page'] = 30;
         $config['use_page_numbers'] = TRUE;
         $config['num_links'] = 5;  

         //---Customization a little bit---
         $config['last_link'] = "Last page";
         $config['last_tag_open'] = '<strong>';
         $config['last_tag_close'] = '</strong>';
         $config['first_link'] = "First page";
         $config['first_tag_open'] = '<strong>';
         $config['first_tag_close'] = '</strong>';
         $config['prev_link'] = "Previous";
         $config['prev_tag_open'] = '<div>';
         $config['prev_tag_close'] = '</div>';
         $config['next_link'] = "Next";
         $config['next_tag_open'] = '<div>';
         $config['next_tag_close'] = '</div>';
         $config['num_tag_open'] = ' ';
         $config['num_tag_close'] = ' ';
         $config['full_tag_open'] = '<p>';
         $config['full_tag_close'] = '</p>';

         //---Start it

        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $data['results'] = $this->model_majors->getMajors($config['per_page'], $page * $config['per_page']);
        
        $this->load->view('admin/list', $data);

        
        

        
        $this->load->view('admin/template/footer');
    }
}
