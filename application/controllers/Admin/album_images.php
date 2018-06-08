<?php
class album_images extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('album_model');
    }

    function index()
    {
        $total_rows = $this->album_model->get_total();
        $this->data['total_rows'] = $total_rows;
        // load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;// tong so dong
        $config['base_url'] = admin_url('album_images/index'); // link hien thi du lieu
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




        $this->db->select('product.name as product_name, album_images.*');
        $this->db->from('album_images');
        $this->db->join('product', 'album_images.product_id = product.product_id');
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(10, $segment);
        $query = $this->db->get();
        $data = $query->result();
        $this->data['list'] = $data;
        // lay danh muc san pham
        $this->load->model('product_model');
        // lay ra noi dung thong bao message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // load view
        $this->data['temp'] = 'admin/album_images/index';
        $this->load->view('admin/main', $this->data);
    }

    function delete(){
        // lay ra id san pham
        $img_id = $this->uri->rsegment('3');
        $this->_del($img_id);
        $image_list = $this->input->get('path');
        unlink("upload/products".$image_list);
        // thong bao xoa thanh cong
        $this->session->set_flashdata('message', 'Xóa thành công sản phẩm này');
        redirect(admin_url('album_images'));

    }
    // xoa nhieu san pham
    function delete_all(){
        $ids = $this->input->post('ids');
        $image_list = $this->input->get('path');
        unlink("upload/products".$image_list);
        foreach ($ids as $img_id){
            $this->_del($img_id);
        }

    }
    private function _del($img_id, $redirect = true){
        // lay ra thong tin san pham
        $album_image = $this->album_model->get_info($img_id);
        if(!$album_image){
            // in ra thong bao loi
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            if($redirect){
                redirect (admin_url('album_image'));
            }else{
                return false;
            }
        }
        //  xoa anh san pham
        $image_list = './upload/products/'.$album_image->path;
        if(file_exists($image_list)){
            unlink($image_list);
        }


        // thuc hien xoa san pham
        $this->album_model->delete($img_id);

    }
}


