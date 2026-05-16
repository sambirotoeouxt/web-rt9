<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Galeri_model');
    }
    
    public function index() {
        $data['artikel'] = $this->Artikel_model->get_artikel(6, 0);
        $data['galeri'] = $this->Galeri_model->get_galeri(6, 0);
        $data['title'] = 'Home - RT 9 Sambiroto';
        
        $this->load->view('template/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
}
?>