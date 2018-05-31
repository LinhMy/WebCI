<?php
    class bill extends MY_Controller{
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
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phone');
                    $mesage = $this->input->post('message');
                    $payment = $this->input->post('payment');
                    $data = array(
                        'status' => 0,
                        'id_user' => $user_id,
                        'email' => $email,
                        'name' => $username,
                        'phone' => $phone,
                        'message' => $mesage,
                        'amount' => $total_amount,
                        'payment' => $payment,
                        'created' => date('y-m-d'),
                    );
                    $this->load->model('transaction_model');
                    // them vao bang transactrion
                    $this->transaction_model->create($data);
                    $id_transaction = $this->db->insert_id();// lay ra id giao dich moi them vao

                    // them vao bang bill
                    $this->load->model('bill_model');
                    foreach ($carts as $rows){
                        $data = array(
                            'id_transaction' => $id_transaction,
                            'product_id_' => $rows['id'],
                            'qty' => $rows['qty'],
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
                    }elseif (in_array($payment, array('nganluong', 'baokim'))){
                        // neu thanh toan bang bao kim
                        // load thu vien thanh toan


                        $this->load->library('payment/baokim_payment');
                        // chuyen sang cong thanh toan
                        $this->baokim_payment->payment($id_transaction, $total_amount);
                    }
                }
            }

            // load view
            $this->data['temp'] = 'site/order/check_out';
            $this->load->view('site/layout', $this->data);
        }
        function result(){
            $this->load->library('payment/baokim_payment');
            // id cua giao dich
            $transactrion_id = $this->input->post('bill_id');
            $this->load->model('transaction_model');
            $transactrion = $this->transaction_model->get_info($transactrion_id);
            if(!$transactrion){
                redirect();
            }
            // goi toi ham kiem tra thanh toan bao kim
            $status = $this->baokim_payment->result($transactrion_id,$transactrion->amount);
            if($status == true){
                // cap nhat lai trang thai thanh tooan
                $data = array();
                $data['status'] = 1;
                $this->transaction_model->update($transactrion_id ,$data);
            }elseif ($status == false){
                // thanh toan ko thanh cong
                $data = array();
                $data['status'] = 2;
                $this->transaction_model->update($transactrion_id ,$data);
            }


        }
    }
?>