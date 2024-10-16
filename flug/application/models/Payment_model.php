<?php
class Payment_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database
    }

    // Function to insert a payment
    public function insert_payment($data) {
        return $this->db->insert('payment', $data); // Insert data into the 'payments' table
    }

    // Function to retrieve all payments
    public function get_payment() {
        return $this->db->get('payment')->result_array(); // Get all payments
    }

    public function get_filtered_payments($start_date, $end_date, $category_id, $user_id, $currency_id) {
        $this->db->select('payment.*, user.name as user_name, category.name as category_name, currency.name as currency_name');
        $this->db->from('payment');
        $this->db->join('user', 'user.id = payment.user_id');
        $this->db->join('category', 'category.id = payment.category_id');
        $this->db->join('currency', 'currency.id = payment.currency_id');

        if ($start_date && $end_date) {
            $this->db->where('payment.created_at >=', $start_date);
            $this->db->where('payment.created_at <=', $end_date);
        }

        if ($category_id) {
            $this->db->where('payment.category_id', $category_id);
        }

        if ($user_id) {
            $this->db->where('payment.user_id', $user_id);
        }

        if ($currency_id) {
            $this->db->where('payment.currency_id', $currency_id);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}
