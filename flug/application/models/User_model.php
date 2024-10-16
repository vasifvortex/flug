<?php
class User_model extends CI_Model {
    public function insert_user($data) {
        return $this->db->insert('user', $data);
    }

    public function get_user() {
        return $this->db->get('user')->result_array();
    }
}