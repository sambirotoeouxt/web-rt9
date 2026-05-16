<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }
    
    public function index() {
        if ($this->session->userdata('admin_id')) {
            redirect('admin/dashboard');
        }
        
        $this->load->view('login/index');
    }
    
    public function process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->Admin_model->login($username, $password);
        
        if ($user) {
            $this->session->set_userdata('admin_id', $user->id);
            $this->session->set_userdata('admin_username', $user->username);
            $this->session->set_flashdata('success', 'Login berhasil!');
            redirect('admin/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('login');
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
        $this->session->set_flashdata('success', 'Logout berhasil!');
        redirect('login');
    }
}
?>