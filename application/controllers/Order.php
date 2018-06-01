<?php
class Order extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }
    // lay thong tin cua khach hang
    function check_out(){
        $carts = $this->cart->contents();
        $total_items = $this->cart->total_items();
        if($total_items <= 0){
            redirect();
        }
        // lay ra tong so tien thanh toan
        $total_amount = 0;
        foreach ($carts as $rows) {
            $total_amount = $total_amount + $rows['subtotal'];
        }
        $this->data['total_amount'] = $total_amount;
        // neu thanh vien da dang nhap thi lay thong tin cua thanh vien
        $user_id = 0;
        $user_info = '';
        if($this->session->userdata('id_user_login')){
            $user_id = $this->session->userdata('id_user_login');
            $user_info = $this->user_model->get_info($user_id);

        }

        $this->data['user_info'] = $user_info;

        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('email', 'Email nhận hàng', 'required|valid_email' );
            $this->form_validation->set_rules('username', 'Nhập Họ tên ', 'required' );
            $this->form_validation->set_rules('phone', 'Nhập Số Điện Thoại ', 'required' );
            $this->form_validation->set_rules('message', 'Ghi chú', 'required' );
            $this->form_validation->set_rules('payment', 'Cổng thanh toán', 'required' );
            if($this->form_validation->run()){

                $payment = $this->input->post('payment');
                $data = array(
                    'status' => 0,
                    'user_id' => $user_id,
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('username'),
                    'phone' => $this->input->post('phone'),
                    'message' => $this->input->post('message'),
                    'amount' => $total_amount,
                    'payment' => $payment,
                );
                $this->load->model('bill_detail_model');
                // them vao bang transactrion
                $this->bill_detail_model->create($data);
                $bill_detail_id = $this->db->insert_id();// lay ra id giao dich moi them vao

                // them vao bang bill
                $this->load->model('bill_model');
                foreach ($carts as $rows){
                    $data = array(
                        'id_transaction' => $bill_detail_id,
                        'product_id_' => $rows['product_id'],
                        'qty' => $rows['quantity'],
                        'amount' => $rows['subtotal'],
                        'status' => '0',
                    );
                    $this->bill_model->create($data);
                }
                // xoa toan bo gio ghang
                $this->cart->destroy();
                if($payment == 'offline'){
                    // hien thi thong bao dat hang thanh cong
                    $this->session->set_flashdata('message', 'Bạn đã đặt hàng thành công, chúng tôi sẽ kiểm tra và gủi hàng.');
                    redirect(site_url());
                }
            }
        }

        // load view
        $this->data['temp'] = 'site/order/check_out';
        $this->load->view('site/layout', $this->data);
    }
}
?>