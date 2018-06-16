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
        if($this->input->get('name') != null){
            $product_name = $this->input->get('name');
            $this->db->like('product.name', $product_name);
        }

        // eng search
        $this->db->select('category.name as category_name, product.*');
        $this->db->from('product');
        $this->db->join('category','product.category_id = category.category_id');
        $this->db->order_by('product_id','desc');
        $this->db->limit(10, $segment);
        $query=$this->db->get();
        $data = $query->result();
        $this->data['list'] = $data;
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

        // load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }
    function add(){
        // load thu vien validation
        $this->load->model('category_model');
        $this->data['category_name']= $this->category_model->get_category_name();
        $this->load->model('album_model');
        $this->load->library('form_validation');
        $this->load->helper('form');

        // kiem tra xem co du lieu post le

        if($this->input->post()){
            $this->form_validation->set_rules('name','Tên sản phẩm bắt buộc nhập','required');
            $this->form_validation->set_rules('price','Giá bắt buộc nhập','required|max_length[10]');

            if($this->form_validation->run()){

                // bat dau insert du lieu
                $product_name = $this->input->post('name');
                $category_name = $this->input->post('category_name') ;
                $category_id = $this->category_model->get_category_id($category_name);
                $price = $this->input->post('price');
                $price = str_replace(',', '', $price);;
                $discount = $this->input->post('discount');
                $discount = $discount = str_replace(',','',$discount);
                $created_date = $this->input->post('created_date');
                $quantity =$this->input->post('quantity');
                $note = $this->input->post('note');
                //  up anh minh hoa san pham
                if (!empty($_FILES['image']['name'])) {
                    $config['upload_path'] = 'upload/products';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name'] = $_FILES['image']['name'];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('image')) {
                        $uploadData = $this->upload->data();
                        $image = $uploadData['file_name'];
                    } else {
                        $image = '';
                    }

                    //in cau truc du lieu cua file da upload
                    echo "<pre>";
                    print_r($image);
                    echo "</pre>";
                }


                $data = array(
                    'name' => $product_name,
                    'category_id' => $category_id['category_id'],
                    'image' => $image,
                    'price' => $price,
                    'discount' => $discount,
                    'created_date' => $created_date,
                    'quantity' => $quantity,
                    'note' => $note,

                );

                  // up load nhieu file anh cho san pham
                $this->load->library('upload_library');
                $upload_path = 'upload/products';
                  $image_list = array();
                  $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                  $image_list = json_encode($image_list);
                  $product_id =  $this->album_model->get_product_id('product',$data);
                  $data1 = array(
                    'path' => $image_list,
                    'product_id' => $product_id,
                  );


                // them moi vao co so du lieu

                $this->album_model->create($data1);
                $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                redirect(admin_url('product'));
                
                
                
               
              
            }
            else {
                $this->session->set_flashdata('message', 'Có lỗi khi thêm sản phẩm');

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
        $image = $product_info->image;
        $this->data['product_info'] = $product_info;
        if(!$product_info){
            // thong bao ko ton tai id nay
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->load->model('category_model');
        $this->data['category_name']= $this->category_model->get_category_name();
        // load ra thu vien validation
        $this->load->library('form_validation');
        $this->load->helper('form');
        if($this->input->post()){
            $this->form_validation->set_rules('name','Tên bắt buộc nhập','required');
            $this->form_validation->set_rules('price','Giá bắt buộc nhập','required|max_length[10]');
            if($this->form_validation->run()){

                // bat dau insert du lieu
                $product_name = $this->input->post('name');
                $category_name = $this->input->post('category_name') ;
                $category_id = $this->category_model->get_category_id($category_name);
                $price = $this->input->post('price');
                $price = str_replace(',', '', $price);
                $discount = $this->input->post('discount');
                $discount = $discount = str_replace(',','',$discount);
                $date = $this->input->post('date');
                $quantity =$this->input->post('quantity');
                $content = $this->input->post('content');

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
                    'name' => $product_name,
                    'category_id' => $category_id['category_id'],
                    'price' => $price,
                    'discount' => $discount,
                    'created_date' => $date,
                    'quantity' => $quantity,
                    'note' => $content,


                );
                // up load nhieu file anh cho san pham
                $this->load->library('upload_library');
                $upload_path = 'upload/products';
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list_json = json_encode($image_list);
                $product_id =  $this->album_model->get_product_id('product',$data);
                $data1 = array(
                    'path' => $image_list,
                    'product_id' => $product_id,
                );

                if($image != ''){
                    $image_corner = $product_info->image;
                    if(file_exists($image_corner)){
                        $image_corner = $this->input->get('image');
                        unlink('./upload/products/'.$image_corner);
                    }
                    $data['image'] = $image;

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
                if( $this->album_model->create($data1)){
                    // neu them thanh cong
                    $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                    redirect(admin_url('product'));
                }else{
                    // in ra thong bao loi
                    $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                    redirect(admin_url('product'));
                }
            }
            else {
                //  Xu ly khi cac gia tri dua  vao ko dung yeu cau
                echo 'giá trị ko chap nhân';

            }
        }
        // load view
        $this->data['temp'] = 'admin/product/edit';
        $this->load->view('admin/main', $this->data);


    }

    // xoa nhieu san pham
    function delete_all(){
        $ids = $this->input->post('ids');
        foreach ($ids as $product_id){
            $this->_del($product_id);
        }

    }
    function del($redirect = true){
        // lay ra thong tin san pham
        $product_id = $this->uri->rsegment('3');
        $product = $this->product_model->get_info($product_id);
        if(!$product){
            // in ra thong bao loi
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            if($redirect){
                redirect (admin_url('product'));
            }else{
                $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
                redirect(admin_url('product'));

            }
        }
        // thuc hien xoa san pham
        $this->product_model->delete($product_id);
        //  xoa anh san pham
        $image = '/upload/products/'.$product->image;
        if(file_exists($image)){
            unlink($image);
        }
        // xoa anh minh hoa kem theo cua san pham




    }
}
?>
