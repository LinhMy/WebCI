<?php
    class Product extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('product_model');
    }
        function index(){
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
            if($this->input->get('category') > 0){
                $category = $this->input->get('category');
                $this->db->where('product.category_id', $category);
            }
            // eng search
            $this->db->select('category.category_name as category_name, product.*');
            $this->db->from('product');
            $this->db->join('Category','product.category_id = category.category_id');
            $this->db->order_by('product_id','desc');
            $this->db->limit(10, $segment);
            $query=$this->db->get();
            $data = $query->result();
            $this->data['list'] = $data;
            // lay danh muc san pham
            $this->load->model('category_model');
            $input1['where'] = array('parent_id' => 0);
            $category_list = $this->category_model->get_list($input1);

            foreach ($category_list as $row){
                $input['where'] = array('parent_id' => $row->category_id);
                $subs = $this->category_model->get_list($input);
                $row->subs = $subs;
            }
            $this->data['category_list'] = $category_list;
            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;

            // load view
            $this->data['temp'] = 'admin/product/index';
            $this->load->view('admin/main', $this->data);
        }
        function add(){
     
            // load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            // lay danh sach danh muc san pham
            $this->load->model('Category_model');
            $input['where'] = array('parent_id' => 0);
            $input['order'] = array('category_id', 'asc');
            $category_list = $this->category_model->get_list($input);
            foreach ($category_list as $row){
                $input['where'] = array('parent_id' => $row->category_id);
                $subs = $this->category_model->get_list($input);
                $row->subs = $subs;
            }


            $this->data['category_list'] = $category_list;
            // kiem tra xem co du lieu post len
            if($this->input->post()){
                $this->form_validation->set_rules('name','Tên sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('price','Giá bắt buộc nhập','required|max_length[10]');
                $this->form_validation->set_rules('Category','Danh mục bắt buộc nhập','required');
                $this->form_validation->set_rules('content','Nội dung bắt buộc nhập','required');
                if($this->form_validation->run()){
                    // bat dau insert du lieu
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $category = $this->input->post('Category');
                    $this->load->model('Category_model');
                    $category_info = $this->category_model->get_info($category);
                    $content = $this->input->post('content');
                    $discount = $this->input->post('discount');
                    $discount = $discount = str_replace(',','',$discount);
                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    if(isset($upload_data['file_name'])){
                        $image_link = $upload_data['file_name'];

                    }


                    // up load nhieu file anh cho san pham
                    $image_list = array();
                    $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                    $image_list = json_encode($image_list);

                    $data = array(
                        'name' => $name,
                        'image_link' => $image_link,
                        'image_list' => $image_list,
                        'created' => date('y-m-d'),
                        'price' => $price,
                        'discount' => $discount,
                        'category_id' => $category,
                        'category_name' => $category_info->name,
                        'warranty' => $this->input->post('warranty'),
                        'gifts' => $this->input->post('gifts'),
                        'site_title' => $this->input->post('site_title'),
                        'meta_desc' => $this->input->post('meta_desc'),
                        'meta_key' => $this->input->post('meta_key'),
                        'content' => $content,

                    );
                    // them moi vao co so du lieu
                    if($this->product_model->create($data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công sản phẩm');
                        redirect(admin_url('product'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm sản phẩm');
                        redirect(admin_url('product'));
                    }

                }
            }

            // load view
            $this->data['temp'] = 'admin/product/add';
            $this->load->view('admin/main', $this->data);
        }
        // chinh sua san pham
        function edit(){
            // load ra id san pham
            $product_id = $this->uri->rsegment('3');
            $product_info = $this->product_model->get_info($product_id);
            $image_link = $product_info->image_link;
            $this->data['product_info'] = $product_info;
            if(!$product_info){
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                redirect(admin_url('product'));
            }
            $this->load->model('Category_model');
            $category_list = $this->category_model->get_list();
            $this->data['category_list'] = $category_list;
            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('name','Tên bắt buộc nhập','required');
                $this->form_validation->set_rules('price','Giá bắt buộc nhập','required|max_length[10]');
                $this->form_validation->set_rules('Category','Danh mục bắt buộc nhập','required');
                $this->form_validation->set_rules('content','Nội dung bắt buộc nhập','required');
                if($this->form_validation->run()){
                    // bat dau insert du lieu
                    $name = $this->input->post('name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $category = $this->input->post('Category');
                    $this->load->model('Category_model');
                    $category_info = $this->category_model->get_info($category);
                    $content = $this->input->post('content');
                    $discount = $this->input->post('discount');
                    $discount = $discount = str_replace(',','',$discount);
                    // lay ten file anh minh hoa dc upload
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');

                    // lay ten file anh minh hoa dc upload
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image_link = '';
                    if(isset($upload_data['file_name'])){
                        $image_link = $upload_data['file_name'];
                    }
                    // upload kem anh minh hoa
                    $image_list = array();
                    $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                    $image_list_json = json_encode($image_list);
                    // data du lieu insert

                    $data = array(
                        'name' => $name,
                        'price' => $price,
                        'discount' => $discount,
                        'category_id' => $category,
                        'category_name' => $category_info->name,
                        'warranty' => $this->input->post('warranty'),
                        'gifts' => $this->input->post('gifts'),
                        'site_title' => $this->input->post('site_title'),
                        'meta_desc' => $this->input->post('meta_desc'),
                        'meta_key' => $this->input->post('meta_key'),
                        'content' => $content,

                    );
                    if($image_link != ''){
                        $image_link_corner = $product_info->image_link;
                        if(file_exists($image_link_corner)){
                            unlink('./upload/products/'.$image_link_corner);
                        }
                        $data['image_link'] = $image_link;

                    }
                    if(!empty($image_list)){
                        $image_list_corner = json_decode($product_info->image_list);
                        if(is_array($image_list_corner)){
                            foreach ($image_list_corner as $img){
                                if(file_exists($img)){
                                    unlink('./upload/products/'.$img);
                                }
                            }
                        }
                        $data['image_list'] = $image_list_json;

                    }
                    // them moi vao co so du lieu
                    if($this->product_model->update($product_info->product_id,$data)){
                        // neu them thanh cong
                        $message = $this->session->set_flashdata('message', 'Cập nhật mới thành công ');
                        redirect(admin_url('product'));
                    }else{
                        // in ra thong bao loi
                        $message = $this->session->set_flashdata('message', 'Có lỗi khi sửa sản phẩm');
                        redirect(admin_url('product'));
                    }
                }
            }
            // load view
            $this->data['temp'] = 'admin/product/edit';
            $this->load->view('admin/main', $this->data);


        }
        function delete(){
            // lay ra id san pham
            $product_id = $this->uri->rsegment('3');
            $this->_del($product_id);
            // thong bao xoa thanh cong
            $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
            redirect(admin_url('product'));

        }
        // xoa nhieu san pham
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $product_id){
                $this->_del($product_id);
            }

        }
        private function _del($product_id, $redirect = true){
            // lay ra thong tin san pham
            $product = $this->product_model->get_info($product_id);
            if(!$product){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                if($redirect){
                    redirect (admin_url('product'));
                }else{
                    return false;
                }
            }
            //  xoa anh san pham
            $image_link = './upload/products/'.$product->image_link;
            if(file_exists($image_link)){
                unlink($image_link);
            }
            // xoa anh minh hoa kem theo cua san pham
            $image_list = json_decode($product->image_list);

            if(is_array($image_list)){
                foreach ($image_list as $img){
                    $image_list = './upload/products/'.$img;
                    if(file_exists($image_list)){
                        unlink($image_list);
                    }
                }
            }
            // thuc hien xoa san pham
            $this->product_model->delete($product_id);

        }
    }
?>