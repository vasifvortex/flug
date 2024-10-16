<?php
class Category_model extends CI_Model {

    public function insert_category($data) {
        return $this->db->insert('category', $data);
    }

    public function get_category() {
        return $this->db->get('category')->result_array();
    }
}
