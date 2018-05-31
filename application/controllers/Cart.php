<?php

class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Product_model');
    }

    /*
     * phuowng thuc them san pham
     * */
    function add()
    {
        //lay san pham muon them vao gio hang
        $this->load->model('Product_model');
        $product_id = $this->uri->rsegment(3);
        $product_info = $this->product_model->get_info($product_id);
        if (!$product_info) {
            redirect();
        }
        //tong so san pham
        $qty = 1;
        /*  if ($this->input->post('quantity')) {
              $qty = $this->input->post('quantity');
          }*/
        $price = $product_info->price;
        if ($product_info->discount > 0) {
            $price = $product_info->price - $product_info->discount;
        }
        // thong tin san pham thêm vào giỏ hàng
        $data = array(
            'id' => $product_info->product_id,
            'qty' => $qty,
            'name'  => $product_info->product_name,
            'price' => $price,
            'image_link'  => $product_info->image,
       );
        // insert du lieu vao thu vien cart
        $this->cart->insert($data);
        //chuyen sang trang danh sach
        Redirect(base_url('cart/view_cart'));
    }

    function view_cart()
    {
        $carts = $this->cart->contents();// lay toan bo gio hang
        $total_items = $this->cart->total_items();//lay tong so sp trong gio hang
        //pre($carts);
        $this->data['carts'] = $carts;
        $this->data['total_items'] = $total_items;
        // load view
        $this->data['temp'] = 'site/cart/view_cart';
        $this->load->view('site/layout', $this->data);

    }

    function update()
    {
        // load ra danh sach san pham trong thu vien
        $carts = $this->cart->contents();
        foreach ($carts as $key => $value) {
            $data['rowid'] = array();
            $data['rowid'] = $key;
            $data['qty'] = $this->input->post('qty_' . $value['id']);
            $this->cart->update($data);
        }
        redirect(base_url('cart/view_cart'));
    }

    function del()
    {
        $product_id = $this->uri->segment(3);
        $product_id = intval($product_id);
        // load ra sanh sach san pham
        $carts = $this->cart->contents();
        if ($product_id > 0) {
            foreach ($carts as $key => $value) {
                if ($value['id'] == $product_id) {
                    $data['rowid'] = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        } else {
            $this->cart->destroy();
        }
        redirect(base_url('cart/view_cart'));
    }
}

?>