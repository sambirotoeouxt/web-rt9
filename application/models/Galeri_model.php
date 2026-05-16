<?php
class Galeri_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_galeri($limit = 12, $offset = 0) {
        return $this->db->order_by('created_at', 'DESC')
                       ->limit($limit, $offset)
                       ->get('galeri')
                       ->result();
    }
    
    public function get_galeri_by_id($id) {
        return $this->db->where('id', $id)
                       ->get('galeri')
                       ->row();
    }
    
    public function count_galeri() {
        return $this->db->count_all('galeri');
    }
    
    public function insert_galeri($data) {
        return $this->db->insert('galeri', $data);
    }
    
    public function update_galeri($id, $data) {
        return $this->db->where('id', $id)
                       ->update('galeri', $data);
    }
    
    public function delete_galeri($id) {
        return $this->db->where('id', $id)
                       ->delete('galeri');
    }
}
?>