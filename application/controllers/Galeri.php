<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Galeri_model');
    }
    
    public function index() {
        $per_page = 12;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('galeri?page=');
        $config['total_rows'] = $this->Galeri_model->count_galeri();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['galeri'] = $this->Galeri_model->get_galeri($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Galeri - RT 9 Sambiroto';
        
        $this->load->view('template/header', $data);
        $this->load->view('galeri/index', $data);
        $this->load->view('template/footer');
    }
}
?>