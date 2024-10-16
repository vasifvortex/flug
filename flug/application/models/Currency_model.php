<?php
class Currency_model extends CI_Model {
    public function insert_currency($data) {
        return $this->db->insert('currency', $data);
    }

    public function get_currency() {
        return $this->db->get('currency')->result_array();
    }
}