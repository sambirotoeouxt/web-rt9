<?php
class Keuangan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_keuangan($limit = 20, $offset = 0) {
        return $this->db->order_by('tanggal', 'DESC')
                       ->limit($limit, $offset)
                       ->get('keuangan')
                       ->result();
    }
    
    public function get_keuangan_by_id($id) {
        return $this->db->where('id', $id)
                       ->get('keuangan')
                       ->row();
    }
    
    public function count_keuangan() {
        return $this->db->count_all('keuangan');
    }
    
    public function insert_keuangan($data) {
        return $this->db->insert('keuangan', $data);
    }
    
    public function update_keuangan($id, $data) {
        return $this->db->where('id', $id)
                       ->update('keuangan', $data);
    }
    
    public function delete_keuangan($id) {
        return $this->db->where('id', $id)
                       ->delete('keuangan');
    }
    
    public function get_total_masuk() {
        $result = $this->db->select_sum('nominal')
                          ->where('tipe', 'masuk')
                          ->get('keuangan')
                          ->row();
        return $result->nominal ? $result->nominal : 0;
    }
    
    public function get_total_keluar() {
        $result = $this->db->select_sum('nominal')
                          ->where('tipe', 'keluar')
                          ->get('keuangan')
                          ->row();
        return $result->nominal ? $result->nominal : 0;
    }
}
?>