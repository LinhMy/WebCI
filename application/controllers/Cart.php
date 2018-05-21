<?php
    class Cart extends MY_Controller{
        function __construct()
        {
            parent::__construct();
        }
        function add(){
            $id_product = $this->uri->rsegment('3');
            $id_product = intval($id_product);
            $product_info = $this->product_model->get_info($id_product);
            if(!$product_info){
                redirect();
            }
            $price = $product_info->price;
            $qty = 1;
            if($this->input->post('qty')){
                $qty = $this->input->post('qty');
            }
            $data = array();
            $data['id'] = $id_product;
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
            $id_product = $this->uri->rsegment('3');
            $id_product = intval($id_product);
            // load ra sanh sach san pham
            $carts = $this->cart->contents();
            if($id_product > 0) {
                foreach ($carts as $key => $value) {
                    if ($value['id'] == $id_product) {
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