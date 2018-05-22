<?php
    class Product extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('product_model');
            $this->load->helper('name_helper');
        }
        //de load danh muc
        function catalog(){

            //  lay ra id danh muc san pham
            $this->load->model('catalog_model');
            $category_id = $this->uri->rsegment('3');
            $category_id = intval($category_id);
            $catalog_info = $this->catalog_model->get_info($category_id);
            if(!$catalog_info){
                redirect();
            }

            // kiem tra co phai la danh muc cha hay ko
            $input = array();
            if($catalog_info->parent_id == 0){
                $input_catalog['where'] = array('parent_id' => $category_id);
                $catalog_sub = $this->catalog_model->get_list($input_catalog);
                $catalog_subs_id = array();
                if(!empty($catalog_sub)) {
                    foreach ($catalog_sub as $row) {
                        $catalog_subs_id[] = $row->category_id;
                    }
                }
                $this->db->where_in('category_id', $catalog_subs_id);
            }else{
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

            $config['base_url'] = base_url('san-pham/danh-muc/'.seoname($catalog_info->category_name).'/'.$category_id); // link hien thi du lieu
            $config['per_page'] = 12; // so luong san pham hien thi tren 1 trang
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

            if(isset($catalog_subs_id)){
                $this->db->where_in('category_id', $catalog_subs_id);
            }
            $list = $this->product_model->get_list($input);
            //pre($this->db->last_query($list));
            $this->data['list'] = $list;
            $this->data['temp'] = 'site/product/catalog';
            $this->load->view('site/layout', $this->data);


        }
        //hien thi san pham
        function view(){
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
            // load view
            $this->data['temp'] = 'site/product/view';
            $this->load->view('site/layout', $this->data);
        }
        function search(){
            if($this->uri->rsegment('3') == 1){
                // lay du lieu tu auto tim kiem
                $key = $this->input->get('term');
            }else{
                $key = $this->input->get('key-search');
            }

            $this->data['key'] = trim($key);
            $input = array();
            if($this->input->get('category') > 0){
                $category_id = $this->input->get('category');
                $this->load->model('catalog_model');
                $input1['where'] = array('parent_id' => $category_id);
                $catalog_list = $this->catalog_model->get_list($input1);
                $id_catalog_subs = array();
                foreach ($catalog_list as $row){
                    $id_catalog_subs[] = $row->category_id;
                }
                $this->db->where_in('category_id', $id_catalog_subs);
            }
            $input['like'] = array('product_name', $key);
            $list = $this->product_model->get_list($input);

            $this->data['list'] = $list;
            if($this->uri->rsegment('3') == 1){
                // auto tim kiem
                $result = array();
                foreach ($list as $row){
                    $item = array();
                    $item['id'] = $row->product_id;
                    $item['label'] = $row->product_name;
                    $item['value'] = $row->product_name;
                    $result[] = $item;
                }
                // du lieu tra ve duoi dang json
                die(json_encode($result));
            }else{
                // load view
                $this->data['temp'] = 'site/product/search';
                $this->load->view('site/layout', $this->data);
            }
        }
        function search_price(){
            $price_from = $this->input->get('price_from');
            $price_to = $this->input->get('price_to');
           

            $input = array();
            $input['where'] = array(
                'price >= ' => $price_from,
                'price <= ' => $price_to,
            );
            $list = $this->product_model->get_list($input);
            $this->data['list'] = $list;
            // load view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }

    }
?>