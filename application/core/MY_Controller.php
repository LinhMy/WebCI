<?php
class MY_Controller extends CI_Controller{

    public $data = array();
    function __construct()
    {
        parent::__construct();
        $this->load->helper('admin_helper');
        $this->load->helper('name_helper');
        $controller = $this->uri->segment('1');
        switch ($controller){
            case 'admin':
            {
                $this->load->helper('admin');
                $this->check_login();
                break;
            }
            default:
            {
                // kiem tra user da dang nhap hay chua
                $user_id_login = $this->session->userdata('id_user_login');
                if($user_id_login){
                    $this->load->model('user_model');
                    $user_info = $this->user_model->get_info($user_id_login);
                    $this->data['user_info'] = $user_info;
                }
                $name_description = $this->uri->segment('1');
                $this->data['name_description'] = $name_description;
                // lay danh sach danh muc san pham
                $this->load->model('catalog_model');
                $this->load->model('product_model');
                $input['order'] = array('category_id', 'asc');
                $catalog_list = $this->catalog_model->get_list($input);
                foreach ($catalog_list as $row){
                    // lay danh sach san pham moi
                    $subs = $this->catalog_model->get_list($input);
                    $row->subs = $subs;
                    foreach ($subs as $sub_product){

                        $input['where'] = array('category_id' => $sub_product->category_id);
                        $product = $this->product_model->get_list($input);
                        $sub_product->sub_pr = $product;
                    }
                    // lay danh sach san pham xem nhieu
                    foreach ($subs as $sub_product){
                        $this->load->model('product_model');
                        $input1['where'] = array('category_id' => $sub_product->category_id);
                        $input1['order'] = array('view', 'desc');
                        $product = $this->product_model->get_list($input1);
                        $sub_product->sub_pr_xn = $product;
                    }

                }

                $this->data['catalog_list'] = $catalog_list;
                $catalog = $this->uri->rsegment('3');
                // lay thong tin tanh muc
                $input = array();
                $input['where'] = array(
                    'category_id' => $catalog,
                );
                $catalog_name = $this->catalog_model->get_list($input);
                $this->data['catalog_name'] = $catalog_name;
                // end danh muc
                // lay thong tin san pham
                $product_info =  $this->product_model->get_info($catalog);
                $this->data['product_info'] = $product_info;

                // load ra thu vien cart
                $this->load->library('cart');
                $total_items = $this->cart->total_items();
                $this->data['total_items'] = $total_items;
                $carts = $this->cart->contents();
                $this->data['carts'] = $carts;


            }

        }
    }
    private function check_login(){
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
        // kiem tra xem da ton tai session login hay chua
        $login = $this->session->userdata('login');
        if(!$login && $controller != 'login'){
            redirect(admin_url('login'));
        }
        if($login && $controller == 'login'){
            redirect(admin_url('home'));
        }

    }


   

}