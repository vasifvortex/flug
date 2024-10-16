<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    public function index() {
        $this->load->database(); // Ensure database is loaded
        $query = $this->db->get('user'); // Assuming your table is 'users'
        $data['results'] = $query->result();
        $this->load->view('test_view', $data); // Pass the data to the view
    }
}
