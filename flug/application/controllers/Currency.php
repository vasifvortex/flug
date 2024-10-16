<?php
class Currency extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('Currency_model');
    }

    public function index() {
        $this->load->view('currency_form');
    }

    public function create() {
        $data = array('name' => $this->input->post('name'));
        $this->Currency_model->insert_currency($data);
        echo json_encode(['status' => 'success']);
    }
}