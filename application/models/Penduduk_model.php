<?php
class Penduduk_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_penduduk($limit = 10, $offset = 0) {
        return $this->db->order_by('nama', 'ASC')
                       ->limit($limit, $offset)
                       ->get('penduduk')
                       ->result();
    }
    
    public function get_penduduk_by_id($id) {
        return $this->db->where('id', $id)
                       ->get('penduduk')
                       ->row();
    }
    
    public function count_penduduk() {
        return $this->db->count_all('penduduk');
    }
    
    public function insert_penduduk($data) {
        return $this->db->insert('penduduk', $data);
    }
    
    public function update_penduduk($id, $data) {
        return $this->db->where('id', $id)
                       ->update('penduduk', $data);
    }
    
    public function delete_penduduk($id) {
        return $this->db->where('id', $id)
                       ->delete('penduduk');
    }
    
    public function search_penduduk($keyword) {
        return $this->db->like('nama', $keyword)
                       ->or_like('no_ktp', $keyword)
                       ->or_like('alamat', $keyword)
                       ->get('penduduk')
                       ->result();
    }
}
?>