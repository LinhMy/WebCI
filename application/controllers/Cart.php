<?php
    class Cart extends MY_Controller{
        function __construct()
        {
            parent::__construct();
        }
        function add(){
            $product_id = $this->uri->rsegment('3');
            $product_id = intval($product_id);
            $product_info = $this->product_model->get_info($product_id);
            if(!$product_info){
                redirect();
            }
            $price = $product_info->price;
            $qty = 1;
            if($this->input->post('qty')){
                $qty = $this->input->post('qty');
            }
            $data = array();
            $data['id'] = $product_id;
            $data['qty'] = $qty;
            $data['name'] = $product_info->name;
            $data['name_catalog'] = $product_info->name_catalog;
            $data['image_link'] = $product_info->image_link;
            $data['price'] = $price;
            // in sert du lieu vao thu vien cart
            $this->cart->insert($data);
            redirect(base_url('cart/index'));
        }
        function index(){
            $carts = $this->cart->contents();
            $this->data['carts'] = $carts;
            $total_items = $this->cart->total_items();
            $this->data['total_items'] = $total_items;
            // load view
            $this->data['temp'] = 'site/cart/index';
            $this->load->view('site/layout', $this->data);
        }
        function update(){
            // load ra danh sach san pham trong thu vien
            $carts = $this->cart->contents();
            foreach ($carts as $key => $value){
                $data['rowid'] = array();
                $data['rowid'] = $key;
                $data['qty'] = $this->input->post('qty_'.$value['id']);
                $this->cart->update($data);
            }
            redirect(base_url('cart/index'));
        }
        function del(){
            $product_id = $this->uri->rsegment('3');
            $product_id = intval($product_id);
            // load ra sanh sach san pham
            $carts = $this->cart->contents();
            if($product_id > 0) {
                foreach ($carts as $key => $value) {
                    if ($value['id'] == $product_id) {
                        $data['rowid'] = array();
                        $data['rowid'] = $key;
                        $data['qty'] = 0;
                        $this->cart->update($data);
                    }
                }
            }else{
                $this->cart->destroy();
            }
            redirect(base_url('cart/index'));

        }
    }
?>