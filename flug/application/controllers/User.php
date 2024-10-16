<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('user_form');
    }

    public function create() {
        $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone')
        );
        $this->User_model->insert_user($data);
        echo json_encode(['status' => 'success']);
    }
}