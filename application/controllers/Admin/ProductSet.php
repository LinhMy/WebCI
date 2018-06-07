<?php
    class Productset extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('productset_model');            
        }
        /*
         hien thi danh sach product set
        */
        function index(){
            //lay tong so hang 
            $total_rows =  $this->productset_model->get_total();
            $this->data['total_rows'] = $total_rows;
            // load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = admin_url('product/index'); // link hien thi du lieu
            $config['per_page'] = 10; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 4; // phan doan hien thi ra so trang tren url. !
            $config['next_link'] = 'Trang kế tiếp';
            $config['prev_link'] = 'Trang trước';

            // khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);

            // end phan trang

            // tim kiem san pham thong qua bien get
            if($this->input->get('id') > 0){
                $productset_id = $this->input->get('id');
                $productset_id = intval($productset_id);
                $this->productset_model->search_product_set($productset_id);
            }
            if($this->input->get('set_name') != null){
                $name = $this->input->get('set_name');
                $this->productset_model->search_product_set_name($name);
            }
            $this->data['set_list']= $this->productset_model->get_product_set();
             // load view
             $this->data['temp'] = 'admin/product/productset';
             $this->load->view('admin/main', $this->data);
        }

        //chinh sua set san pham
        function edit(){
            // load ra id san pham
            $set_id = $this->uri->rsegment('3');
            $set_info = $this->productset_model->get_info($set_id);
            $image = $set_info->image;
            $this->data['set_info'] = $set_info;
            if(!$set_info){
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại set sản phẩm này');
                redirect(admin_url('productset'));
            }
            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required');
                $this->form_validation->set_rules('price','Nội dung bắt buộc nhập','required');
                if($this->form_validation->run()){
                    // bat dau insert du lieu
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $create_date = $this->input->post('create_date');
                    $quantity =$this->input->post('quantity');
                    $display = $this->input->post('checkbox');

                    // lay ten file anh minh hoa dc upload
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image = '';
                    if(isset($upload_data['file_name'])){
                        $image = $upload_data['file_name'];
                    }
                    // data du lieu insert

                    $data = array(
                        'name' => $name,
                        'image' => $image,
                        'price' => $price,
                        'create_date' => $create_date,
                        'quantity' => $quantity,
                        'display' => $display


                    );
                    if($image != ''){
                        $image_corner = $set_info->image;
                        if(file_exists($image_corner)){
                            $image_corner = $this->input->get('image');
                            unlink('./upload/products/'.$image_corner);
                        }
                        $data['image'] = $image;

                    }
                    // them moi vao co so du lieu
                    if($this->productset_model->update($set_id, $data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                        redirect(admin_url('productset'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('productset'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/product/editset';
            $this->load->view('admin/main', $this->data);


        }
        //xoa tung san pham
        function delete(){
            // lay ra id san pham
            $set_id = $this->uri->rsegment('3');
            $this->_del($set_id);
            $image = $this->input->get('image');
            unlink("upload/products".$image);
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
            redirect(admin_url('productset'));

        }
        // xoa nhieu san pham
        function delete_all(){
            $ids = $this->input->post('ids');
            $image = $this->input->get('image');
            unlink("upload/products".$image);
            foreach ($ids as $set_id){
                $this->_del($set_id);
            }

        }

        //ham thuc hien xoa
        private function _del($set_id, $redirect = true){
            // lay ra thong tin san pham
            $set = $this->productset_model->get_info($set_id);
            if(!$set){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                if($redirect){
                    redirect (admin_url('productset'));
                }else{
                    return false;
                }
            }
            //  xoa anh san pham
            $image = './upload/products/'.$set->image;
            if(file_exists($image)){
                unlink($image);
            }


            // thuc hien xoa san pham
            $this->productset_model->delete($set_id);

        }
        //thay doi thuoc tinh display
        public function change($set_id, $display)
        {
            $this->setproduct_model->change($set_id, $display);
        }

        //ham add set moi
        function add()
        {
            // load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            // kiem tra xem co du lieu post len
            if($this->input->post()){
                $this->form_validation->set_rules('name','Tên sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('price','Giá bắt buộc nhập','required');
                 if($this->form_validation->run()){

                    //lay du lieu da chon trong bang sp
                    $ids = $this->input->post('id');
                    // bat dau insert du lieu
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $quantity =$this->input->post('quantity');
                    $create_date = $this->input->post('create_date');
                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image = '';
                    if(isset($upload_data['file_name'])){
                        $image = $upload_data['file_name'];

                    }

                    $data = array(
                        'name' => $name,
                        'image' => $image,
                        'price' => $price,
                        'view' =>0,
                        'create_date' => $create_date,
                        'quantity' => $quantity,
                        'display' =>0 

                    );
                    // them moi vao co so du lieu
                    if($this->productset_model->create($data)){
                        // neu them thanh cong
                      //  $set_id = $this->productset_model->get_set_name($set_name);
                       // foreach ($ids as $product_id){
                            //$this->_del($product_id);
                      //      $this->productset_model->insert_product_set_item($product_id,$set_id->product_set_id);
                      //  }
                        $this->session->set_flashdata('message', 'Thêm mới thành công sản phẩm');
                        redirect(admin_url('productset'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm sản phẩm');
                    }

                }
            }

            // load view
            //$this->data['list'] = $this->productset_model->get_list_product();
            $this->data['temp'] = 'admin/product/addset';
            $this->load->view('admin/main', $this->data);
        }
        public function viewproduct($set_id)
        {
            $this->load->model('product_model');
            $total_rows =  $this->product_model->get_total();
            $this->data['total_rows'] = $total_rows;
            // load ra thu vien phan trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total_rows;// tong so dong
            $config['base_url'] = admin_url('product/index'); // link hien thi du lieu
            $config['per_page'] = 10; // so luong san pham hien thi tren 1 trang
            $config['uri__segment'] = 4; // phan doan hien thi ra so trang tren url. !
            $config['next_link'] = 'Trang kế tiếp';
            $config['prev_link'] = 'Trang trước';

            // khoi tao cac cau hinh cua phan trang
            $this->pagination->initialize($config);
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);

            // end phan trang

            // tim kiem san pham thong qua bien get
            if($this->input->get('id') > 0){
                $product_id = $this->input->get('id');
                $product_id = intval($product_id);
                $this->db->where('product_id', $product_id);
            }
            if($this->input->get('product_name') != null){
                $product_name = $this->input->get('product_name');
                $this->db->like('product.product_name', $product_name);
            }

            // eng search
            // lay danh muc san pham
            $this->load->model('category_model');
            $input1['where'] = array('parent' => 0);
            $category_list = $this->category_model->get_list($input1);

            foreach ($category_list as $row){
                $input['where'] = array('parent' => $row->category_id);
                $subs = $this->category_model->get_list($input);
                $row->subs = $subs;
            }
            $this->data['category_list'] = $category_list;
            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            //tra ve cac san pham co trong set hien thi len
            
            $this->data['list']=$this->productset_model->get_list_product_in_set($set_id);
            // lay ten cua set
            $this->data['setname']= $this->productset_model->get_set_name($set_id);
            $this->data['temp'] = 'admin/product/viewproductset';
            $this->load->view('admin/main', $this->data);
        }
        //ham xem chi tiet cac san pham co trong set

    }
?>