<?php
class Komentar_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_komentar($artikel_id) {
        return $this->db->where('artikel_id', $artikel_id)
                       ->where('status', 'aktif')
                       ->order_by('created_at', 'DESC')
                       ->get('komentar')
                       ->result();
    }
    
    public function insert_komentar($data) {
        return $this->db->insert('komentar', $data);
    }
    
    public function delete_komentar($id) {
        return $this->db->where('id', $id)
                       ->delete('komentar');
    }
}
?>