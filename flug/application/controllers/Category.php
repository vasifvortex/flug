<?php
class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('Category_model');
    }

    public function index() {
        $this->load->view('category_form');
    }

    public function create() {
        $name = $this->input->post('name');
        
        if(empty($name)) {
            echo json_encode(['status' => 'error', 'message' => 'Category name cannot be empty']);
            return;
        }

        $data = array('name' => $name);
        $this->Category_model->insert_category($data);
        
        echo json_encode(['status' => 'success', 'message' => 'Category added successfully']);
    }
}
