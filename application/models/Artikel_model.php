<?php
class Artikel_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_artikel($limit = 6, $offset = 0) {
        return $this->db->order_by('created_at', 'DESC')
                       ->limit($limit, $offset)
                       ->get('artikel')
                       ->result();
    }
    
    public function get_artikel_by_id($id) {
        return $this->db->where('id', $id)
                       ->get('artikel')
                       ->row();
    }
    
    public function count_artikel() {
        return $this->db->count_all('artikel');
    }
    
    public function insert_artikel($data) {
        return $this->db->insert('artikel', $data);
    }
    
    public function update_artikel($id, $data) {
        return $this->db->where('id', $id)
                       ->update('artikel', $data);
    }
    
    public function delete_artikel($id) {
        return $this->db->where('id', $id)
                       ->delete('artikel');
    }
}
?>