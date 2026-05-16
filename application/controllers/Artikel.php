<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Komentar_model');
        $this->load->helper('url');
    }
    
    public function index() {
        $per_page = 6;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('artikel?page=');
        $config['total_rows'] = $this->Artikel_model->count_artikel();
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
        
        $data['artikel'] = $this->Artikel_model->get_artikel($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Artikel - RT 9 Sambiroto';
        
        $this->load->view('template/header', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('template/footer');
    }
    
    public function detail($id) {
        $data['artikel'] = $this->Artikel_model->get_artikel_by_id($id);
        
        if (!$data['artikel']) {
            show_404();
        }
        
        $data['komentar'] = $this->Komentar_model->get_komentar($id);
        $data['title'] = $data['artikel']->judul . ' - RT 9 Sambiroto';
        
        $this->load->view('template/header', $data);
        $this->load->view('artikel/detail', $data);
        $this->load->view('template/footer');
    }
    
    public function tambah_komentar() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required|min_length[5]');
        $this->form_validation->set_rules('artikel_id', 'Artikel ID', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Data tidak valid!');
        } else {
            $data = array(
                'artikel_id' => $this->input->post('artikel_id'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'komentar' => $this->input->post('komentar'),
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            );
            
            if ($this->Komentar_model->insert_komentar($data)) {
                $this->session->set_flashdata('success', 'Komentar Anda berhasil dikirim dan menunggu persetujuan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengirim komentar!');
            }
        }
        
        redirect('artikel/detail/' . $this->input->post('artikel_id'));
    }
}
?>