<?php
class Payment extends CI_Controller {
    public function __construct() {
       
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Category_model');
        $this->load->model('User_model');
        $this->load->model('Currency_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['category'] = $this->Category_model->get_category();
        $data['user'] = $this->User_model->get_user();
        $data['currency'] = $this->Currency_model->get_currency();

        $this->load->view('payment_filter_form', $data);
    }
    
    public function filter() {
       
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $category_id = $this->input->post('category_id');
        $user_id = $this->input->post('user_id');
        $currency_id = $this->input->post('currency_id');
        
        // Filterlənmiş ödənişləri
        $data['payment'] = $this->Payment_model->get_filtered_payments($start_date, $end_date, $category_id, $user_id, $currency_id);
        
        // Filterlənmiş nəticələri
        $this->load->view('filtered_payments_view', $data);
    }
    public function create() {
        if ($this->input->method() === 'post') {
            // Handle form submission
            $data = [
                'amount' => $this->input->post('amount'),
                'type' => $this->input->post('type'),
                'comment' => $this->input->post('comment'),
                'category_id' => $this->input->post('category_id'),
                'currency_id' => $this->input->post('currency_id'),
                'user_id' => $this->input->post('user_id') // You might want to set this based on session data
            ];

            // Perform validation (optional)
            if (empty($data['amount']) || empty($data['type'])) {
                echo json_encode(['status' => 'error', 'message' => 'Amount and type are required']);
                return;
            }

            // Insert the payment data into the database
            $result = $this->Payment_model->insert_payment($data);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Payment created successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to create payment']);
            }
        } else {
            // Load the create payment form view
            $this->load->view('payment_form');
        }
}
}