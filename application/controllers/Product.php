<?php

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('vote_model');
        $this->load->helper('name_helper');
    }

    /*
     * Phương thức danh sách sản phẩm
     * */
    function view_product()
    {
        if ($this->uri->rsegment('3') == 1) {
            // lay du lieu tu auto tim kiem
            $key = $this->input->get('term');
        } else {
            $key = $this->input->get('key-search');
        }
        $this->data['key'] = trim($key);
        $input = array();
        if ($this->input->get('category') > 0) {
            $category_id = $this->input->get('category');
            $this->load->model('Category_model');
            $input1['where'] = array('parent' => $category_id);
            $category_list = $this->Category_model->get_list($input1);
            $id_catalog_subs = array();
            foreach ($category_list as $row) {
                $id_catalog_subs[] = $row->category_id;
            }
            $this->db->where_in('category_id', $id_catalog_subs);
        }
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        if ($this->uri->rsegment('3') == 1) {
            // auto tim kiem
            $result = array();
            foreach ($list as $row) {
                $item = array();
                $item['id'] = $row->product_id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            // du lieu tra ve duoi dang json
            die(json_encode($result));
        } else {

            // load view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }
    }

    /*
     * Phương thức hiển thị danh mục sản phẩm
     * */
    function catalog()
    {
        //  lay ra id danh muc san pham
        $this->load->model('Category_model');
        $category_id = $this->uri->rsegment('4');
        $category_id = intval($category_id);
        $catalog_info = $this->Category_model->get_info($category_id);
        if (!$catalog_info) {
            redirect();
        }
        // kiem tra co phai la danh muc cha hay ko
        $input = array();
        if ($catalog_info->parent == 0) {
            $input_catalog['where'] = array('parent' => $category_id);
            $catalog_sub = $this->Category_model->get_list($input_catalog);
            $catalog_subs_id = array();
            if (!empty($catalog_sub)) {
                foreach ($catalog_sub as $row) {
                    $catalog_subs_id[] = $row->category_id;
                }
            }
            $this->db->where_in('category_id', $catalog_subs_id);
        } else {
            $input['where'] = array('category_id' => $category_id);
        }
        // lay danh sach san pham
        $this->load->model('product_model');
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        // load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;// tong so dong
        $config['base_url'] = base_url('san-pham/danh-muc/' . seoname($catalog_info->name) . '/' . $category_id); // link hien thi du lieu
        $config['per_page'] = 6; // so luong san pham hien thi tren 1 trang
        $config['uri__segment'] = 5; // phan doan hien thi ra so trang tren url. !
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        // khoi tao cac cau hinh cua phan trang
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(5);
        $segment = intval($segment);
        //pre($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        // end phan trang
        if (isset($catalog_subs_id)) {
            $this->db->where_in('category_id', $catalog_subs_id);
        }
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['temp'] = 'site/product/catalog';
        $this->load->view('site/layout', $this->data);
    }

    /*
   * Phương thức hiển thị chi tiết sản phẩm
   * */
    function view()
    {
        $product_id = $this->uri->rsegment('3');
        $product_info = $this->product_model->get_info($product_id);
        $this->data['product_info'] = $product_info;

        // danh sách sản phẩm liên quan
        $input['where'] = array(
            'product_id !=' => $product_id,
            'category_id' => $product_info->category_id,
        );
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        //truyen vote
        $where_vote= array(
            'product_id' => $product_id,
            'type'=>0
        );
        $a=$this->data['data_vote'] = $this->vote_model->get_reviews($where_vote);
        //hien thi comment
        $this->data['comments'] = $this->vote_model->get_comment($where_vote);
        // load view
        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);
    }
     /*
   * Phương thức hiển thị chi tiết cua set sản phẩm
   * */
    function view_productset()
    {
        $this->load->model('productset_model');
        $product_set_id = $this->uri->rsegment('3');
        $product_set_info = $this->productset_model->get_info($product_set_id);
        $this->data['product_set_info'] = $product_set_info;

        // danh sách sản phẩm liên quan

        $list = $this->productset_model->get_list_set_product();
        $this->data['list'] = $list;
        //truyen vote
        $where = array(
            'product_id'=> $product_set_id,
            'type'=>1
        );
        $this->data['data_vote'] = $this->vote_model->get_reviews($where);
        //hien thi comment
        $this->data['comments'] = $this->vote_model->get_comment($where);
        // load view
        $this->data['temp'] = 'site/product/viewset';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
   * Phương thức vote sản phẩm
   * */
    public function rating()
    {
        //$data = $this->input->post();
        $product_id = $this->input->post('product_id');
        $vote = $this->input->post('userRating');
        $comment = $this->input->post('comment');
        $type = $this->input->post('type');
        //print_r($data);
        $data_insert = array(
            'point' => $vote,
            'product_id' => $product_id,
            'comment' => $comment,
            'created_date' => date('Y-m-d h-i-s'),
            'type' =>$type
        );
        //chen danh gia nguoi dung danh gia vao
        $this->vote_model->insert_vote($data_insert);
        $where= array(
            'product_id' => $product_id,
            'type'=>$type
        );
        $data_vote = $this->data['data_vote'] = $this->vote_model->get_reviews($where); 
        echo json_encode($data_vote);

    }

    /*
   * Phương thức search sản phẩm
   * */
    function search()
    {
        if ($this->uri->rsegment('3') == 1) {
            // lay du lieu tu auto tim kiem
            $key = $this->input->get('term');
        } else {
            $key = $this->input->get('key-search');
        }
        $this->data['key'] = trim($key);
        $input = array();
        if ($this->input->get('category') > 0) {
            $category_id = $this->input->get('category');
            $this->load->model('Category_model');
            $input1['where'] = array('parent' => $category_id);
            $category_list = $this->Category_model->get_list($input1);
            $id_catalog_subs = array();
            foreach ($category_list as $row) {
                $id_catalog_subs[] = $row->category_id;
            }
            $this->db->where_in('category_id', $id_catalog_subs);
        }
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        if ($this->uri->rsegment('3') == 1) {
            // auto tim kiem
            $result = array();
            foreach ($list as $row) {
                $item = array();
                $item['id'] = $row->product_id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            // du lieu tra ve duoi dang json
            die(json_encode($result));
        } else {
            // load view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }
    }

    /*
   * Phương thức search theo giá của sản phẩm
   * */
    function search_price()
    {
        $price_from = $this->input->get('price_from');
        $price_to = $this->input->get('price_to');

        $input = array();
        $input['where'] = array(
            'price >= ' => $price_from,
            'price <= ' => $price_to,
        );
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
        // load view product
        $this->data['temp'] = 'site/product/search';
        $this->load->view('site/layout', $this->data);
    }

    // phương thức hiển thị comment sản phẩm
    function get_comment()
    {
        $data['comments'] = $this->vote_model->get_comment();
        $this->load->view('site/product/view', $data);

    }
}

?>
