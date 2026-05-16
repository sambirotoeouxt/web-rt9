<?php
class Admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function login($username, $password) {
        $user = $this->db->where('username', $username)
                        ->get('admin')
                        ->row();
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return FALSE;
    }
    
    public function get_admin_by_username($username) {
        return $this->db->where('username', $username)
                       ->get('admin')
                       ->row();
    }
}
?>