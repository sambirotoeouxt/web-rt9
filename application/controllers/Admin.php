<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Galeri_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Keuangan_model');
        $this->load->model('Komentar_model');
        $this->load->library('session');
        
        if (!$this->session->userdata('admin_id')) {
            redirect('login');
        }
    }
    
    public function dashboard() {
        $data['total_artikel'] = $this->Artikel_model->count_artikel();
        $data['total_galeri'] = $this->Galeri_model->count_galeri();
        $data['total_penduduk'] = $this->Penduduk_model->count_penduduk();
        $data['total_keuangan'] = $this->Keuangan_model->count_keuangan();
        $data['title'] = 'Dashboard Admin';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }
    
    // ARTIKEL MANAGEMENT
    public function artikel() {
        $per_page = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/artikel?page=');
        $config['total_rows'] = $this->Artikel_model->count_artikel();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['artikel'] = $this->Artikel_model->get_artikel($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Kelola Artikel';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function artikel_tambah() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Artikel';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/artikel/tambah', $data);
            $this->load->view('admin/template/footer');
        } else {
            $config['upload_path'] = './uploads/artikel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time();
            
            $this->load->library('upload', $config);
            
            $gambar = 'default.jpg';
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    $gambar = $this->upload->data('file_name');
                }
            }
            
            $data = array(
                'judul' => $this->input->post('judul'),
                'konten' => $this->input->post('konten'),
                'gambar' => $gambar,
                'created_at' => date('Y-m-d H:i:s')
            );
            
            if ($this->Artikel_model->insert_artikel($data)) {
                $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan!');
                redirect('admin/artikel');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan artikel!');
                redirect('admin/artikel_tambah');
            }
        }
    }
    
    public function artikel_edit($id) {
        $this->load->library('form_validation');
        
        $data['artikel'] = $this->Artikel_model->get_artikel_by_id($id);
        
        if (!$data['artikel']) {
            show_404();
        }
        
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Artikel';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/artikel/edit', $data);
            $this->load->view('admin/template/footer');
        } else {
            $config['upload_path'] = './uploads/artikel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time();
            
            $this->load->library('upload', $config);
            
            $gambar = $data['artikel']->gambar;
            if (!empty($_FILES['gambar']['name'])) {
                if ($this->upload->do_upload('gambar')) {
                    if ($gambar != 'default.jpg' && file_exists('./uploads/artikel/' . $gambar)) {
                        unlink('./uploads/artikel/' . $gambar);
                    }
                    $gambar = $this->upload->data('file_name');
                }
            }
            
            $update_data = array(
                'judul' => $this->input->post('judul'),
                'konten' => $this->input->post('konten'),
                'gambar' => $gambar
            );
            
            if ($this->Artikel_model->update_artikel($id, $update_data)) {
                $this->session->set_flashdata('success', 'Artikel berhasil diupdate!');
                redirect('admin/artikel');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate artikel!');
                redirect('admin/artikel_edit/' . $id);
            }
        }
    }
    
    public function artikel_hapus($id) {
        $artikel = $this->Artikel_model->get_artikel_by_id($id);
        
        if (!$artikel) {
            show_404();
        }
        
        if ($artikel->gambar != 'default.jpg' && file_exists('./uploads/artikel/' . $artikel->gambar)) {
            unlink('./uploads/artikel/' . $artikel->gambar);
        }
        
        if ($this->Artikel_model->delete_artikel($id)) {
            $this->session->set_flashdata('success', 'Artikel berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus artikel!');
        }
        
        redirect('admin/artikel');
    }
    
    // GALERI MANAGEMENT
    public function galeri() {
        $per_page = 12;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/galeri?page=');
        $config['total_rows'] = $this->Galeri_model->count_galeri();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['galeri'] = $this->Galeri_model->get_galeri($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Kelola Galeri';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/galeri/index', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function galeri_tambah() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Galeri';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/galeri/tambah', $data);
            $this->load->view('admin/template/footer');
        } else {
            $config['upload_path'] = './uploads/galeri/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['file_name'] = time();
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
                
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'gambar' => $gambar,
                    'created_at' => date('Y-m-d H:i:s')
                );
                
                if ($this->Galeri_model->insert_galeri($data)) {
                    $this->session->set_flashdata('success', 'Galeri berhasil ditambahkan!');
                    redirect('admin/galeri');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan galeri!');
                    redirect('admin/galeri_tambah');
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar!');
                redirect('admin/galeri_tambah');
            }
        }
    }
    
    public function galeri_hapus($id) {
        $galeri = $this->Galeri_model->get_galeri_by_id($id);
        
        if (!$galeri) {
            show_404();
        }
        
        if (file_exists('./uploads/galeri/' . $galeri->gambar)) {
            unlink('./uploads/galeri/' . $galeri->gambar);
        }
        
        if ($this->Galeri_model->delete_galeri($id)) {
            $this->session->set_flashdata('success', 'Galeri berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus galeri!');
        }
        
        redirect('admin/galeri');
    }
    
    // PENDUDUK MANAGEMENT
    public function penduduk() {
        $per_page = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/penduduk?page=');
        $config['total_rows'] = $this->Penduduk_model->count_penduduk();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['penduduk'] = $this->Penduduk_model->get_penduduk($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Kelola Data Penduduk';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/penduduk/index', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function penduduk_tambah() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Penduduk';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/penduduk/tambah', $data);
            $this->load->view('admin/template/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('no_ktp'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            if ($this->Penduduk_model->insert_penduduk($data)) {
                $this->session->set_flashdata('success', 'Data penduduk berhasil ditambahkan!');
                redirect('admin/penduduk');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data penduduk!');
                redirect('admin/penduduk_tambah');
            }
        }
    }
    
    public function penduduk_edit($id) {
        $this->load->library('form_validation');
        
        $data['penduduk'] = $this->Penduduk_model->get_penduduk_by_id($id);
        
        if (!$data['penduduk']) {
            show_404();
        }
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Penduduk';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/penduduk/edit', $data);
            $this->load->view('admin/template/footer');
        } else {
            $update_data = array(
                'nama' => $this->input->post('nama'),
                'no_ktp' => $this->input->post('no_ktp'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
                'pekerjaan' => $this->input->post('pekerjaan')
            );
            
            if ($this->Penduduk_model->update_penduduk($id, $update_data)) {
                $this->session->set_flashdata('success', 'Data penduduk berhasil diupdate!');
                redirect('admin/penduduk');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate data penduduk!');
                redirect('admin/penduduk_edit/' . $id);
            }
        }
    }
    
    public function penduduk_hapus($id) {
        if ($this->Penduduk_model->delete_penduduk($id)) {
            $this->session->set_flashdata('success', 'Data penduduk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data penduduk!');
        }
        
        redirect('admin/penduduk');
    }
    
    // KEUANGAN MANAGEMENT
    public function keuangan() {
        $per_page = 20;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $this->load->library('pagination');
        
        $config['base_url'] = base_url('admin/keuangan?page=');
        $config['total_rows'] = $this->Keuangan_model->count_keuangan();
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['keuangan'] = $this->Keuangan_model->get_keuangan($per_page, $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['total_masuk'] = $this->Keuangan_model->get_total_masuk();
        $data['total_keluar'] = $this->Keuangan_model->get_total_keluar();
        $data['saldo'] = $data['total_masuk'] - $data['total_keluar'];
        $data['title'] = 'Kelola Keuangan';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/keuangan/index', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function keuangan_tambah() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Keuangan';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/keuangan/tambah', $data);
            $this->load->view('admin/template/footer');
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal'),
                'tipe' => $this->input->post('tipe'),
                'keterangan' => $this->input->post('keterangan'),
                'nominal' => $this->input->post('nominal'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            if ($this->Keuangan_model->insert_keuangan($data)) {
                $this->session->set_flashdata('success', 'Data keuangan berhasil ditambahkan!');
                redirect('admin/keuangan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data keuangan!');
                redirect('admin/keuangan_tambah');
            }
        }
    }
    
    public function keuangan_edit($id) {
        $this->load->library('form_validation');
        
        $data['keuangan'] = $this->Keuangan_model->get_keuangan_by_id($id);
        
        if (!$data['keuangan']) {
            show_404();
        }
        
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Keuangan';
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/keuangan/edit', $data);
            $this->load->view('admin/template/footer');
        } else {
            $update_data = array(
                'tanggal' => $this->input->post('tanggal'),
                'tipe' => $this->input->post('tipe'),
                'keterangan' => $this->input->post('keterangan'),
                'nominal' => $this->input->post('nominal')
            );
            
            if ($this->Keuangan_model->update_keuangan($id, $update_data)) {
                $this->session->set_flashdata('success', 'Data keuangan berhasil diupdate!');
                redirect('admin/keuangan');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate data keuangan!');
                redirect('admin/keuangan_edit/' . $id);
            }
        }
    }
    
    public function keuangan_hapus($id) {
        if ($this->Keuangan_model->delete_keuangan($id)) {
            $this->session->set_flashdata('success', 'Data keuangan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data keuangan!');
        }
        
        redirect('admin/keuangan');
    }
    
    // KOMENTAR MANAGEMENT
    public function komentar() {
        $this->load->library('pagination');
        $this->load->model('Komentar_model');
        
        $per_page = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 0;
        
        $query = $this->db->get('komentar');
        $total_rows = $query->num_rows();
        
        $config['base_url'] = base_url('admin/komentar?page=');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $offset = ($page - 1) * $per_page;
        
        $data['komentar'] = $this->db->order_by('created_at', 'DESC')
                                      ->limit($per_page, $offset)
                                      ->get('komentar')
                                      ->result();
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Kelola Komentar';
        
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/komentar/index', $data);
        $this->load->view('admin/template/footer');
    }
    
    public function komentar_hapus($id) {
        if ($this->Komentar_model->delete_komentar($id)) {
            $this->session->set_flashdata('success', 'Komentar berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus komentar!');
        }
        
        redirect('admin/komentar');
    }
}
?>