<?php
    class SetProduct extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('setproduct_model');            
        }
        function index(){
            $this->load->model('setproduct_model');
            $total_rows =  $this->setproduct_model->get_total();
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
                $setproduct_id = $this->input->get('id');
                $setproduct_id = intval($setproduct_id);
                $this->db->where('set_id', $setproduct_id);
            }
            if($this->input->get('set_name') != null){
                $set_name = $this->input->get('set_name');
                $this->db->like('set_product.set_name', $set_name);
            }

            $this->data['set_list']= $this->setproduct_model->get_setproduct();
             // load view
             $this->data['temp'] = 'admin/product/setproduct';
             $this->load->view('admin/main', $this->data);
        }
        //chinh sua set 
        function edit(){
            // load ra id san pham
            $set_id = $this->uri->rsegment('3');
            $set_info = $this->setproduct_model->get_info($set_id);
            $image = $set_info->image;
            $this->data['set_info'] = $set_info;
            if(!$set_info){
                // thong bao ko ton tai id nay
                $this->session->set_flashdata('message', 'Không tồn tại set sản phẩm này');
                redirect(admin_url('setproduct'));
            }
            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('set_name','Tên bắt buộc nhập','required');
                $this->form_validation->set_rules('sale','Nội dung bắt buộc nhập','required');
                if($this->form_validation->run()){
                    // bat dau insert du lieu
                    $set_name = $this->input->post('set_name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);
                    $sale = $this->input->post('sale');
                    $date_set = $this->input->post('date');
                    $quantity =$this->input->post('quantity');
                    $display = $this->input->post('display');

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
                        'set_name' => $set_name,
                        'image' => $image,
                        'price' => $price,
                        'sale' => $sale,
                        'date_set' => $date_set,
                        'quantity' => $quantity


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
                    if($this->setproduct_model->update($set_id, $data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                        redirect(admin_url('setproduct'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('product'));
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
            redirect(admin_url('setproduct'));

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
            $set = $this->setproduct_model->get_info($set_id);
            if(!$set){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                if($redirect){
                    redirect (admin_url('setproduct'));
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
            $this->setproduct_model->delete($set_id);

        }
        //ham add set moi
        function add(){
            // load thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            // kiem tra xem co du lieu post len
            if($this->input->post()){
                $this->form_validation->set_rules('set_name','Tên sản phẩm bắt buộc nhập','required');
                $this->form_validation->set_rules('price','Giá bắt buộc nhập','required');
                $this->form_validation->set_rules('sale','Nội dung bắt buộc nhập','required');
                if($this->form_validation->run()){
                    // bat dau insert du lieu
                    $set_name = $this->input->post('set_name');
                    $price = $this->input->post('price');
                    $price = str_replace(',', '', $price);;
                    $sale = $this->input->post('sale');
                    $sale = $sale = str_replace(',','',$sale);
                    $quantity =$this->input->post('quantity');
                    $date_set = $this->input->post('date');
                    //  up anh minh hoa san pham
                    $this->load->library('upload_library');
                    $upload_path = './upload/products';
                    $upload_data = $this->upload_library->upload($upload_path, 'image');
                    $image = '';
                    if(isset($upload_data['file_name'])){
                        $image = $upload_data['file_name'];

                    }

                    $data = array(
                        'set_name' => $set_name,
                        'image' => $image,
                        'price' => $price,
                        'sale' => $sale,
                        'date_set' => $date_set,
                        'quantity' => $quantity,
                        'display' =>0 

                    );
                    // them moi vao co so du lieu
                    if($this->setproduct_model->create($data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công sản phẩm');
                        redirect(admin_url('setproduct'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm sản phẩm');
                    }

                }
            }

            // load view
            $this->data['temp'] = 'admin/product/addset';
            $this->load->view('admin/main', $this->data);
        }
    }
?>