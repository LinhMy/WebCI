<?php
class Blog extends MY_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
    }


  public function index()
  {
    $total_rows =  $this->blog_model->get_total();
    $this->data['total_rows'] = $total_rows;
    // load ra thu vien phan trang
    $this->load->library('pagination');
    $config = array();
    $config['total_rows'] = $total_rows;// tong so dong
    $config['base_url'] = admin_url('blog/index');
   // $config['base_url'] = admin_url('set_product/add');// link hien thi du lieu
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
        $post_id = $this->input->get('id');
        $post_id = intval($post_id);
        $this->db->where('post_id', $post_id);
    }
    if($this->input->get('title') != null){
        $title = $this->input->get('title');
        $this->db->like('post.title', $title);
    }

    // eng search
    // lay du lieu hien thi
    
    $this->data['list'] = $this->blog_model->get_list_post();
    // lay ra noi dung thong bao message
    $message = $this->session->flashdata('message');
    $this->data['message'] = $message;

    // load view
    $this->data['temp'] = 'admin/blog/index';
    $this->load->view('admin/main', $this->data);
  }
  public function delete()
  {
    // lay ra id tin tuc
    $post_id = $this->uri->rsegment('3');
    $this->_del($post_id);
    $image = $this->input->get('image');
    unlink("upload/post".$image);
    // thong bao xoa thanh cong
    $this->session->set_flashdata('message', 'Xóa thành công tin tức này');
    redirect(admin_url('blog'));
  }
  public function delete_all()
  {
    $ids = $this->input->post('ids');
    $image = $this->input->get('image');
    unlink("upload/post".$image);
    foreach ($ids as $post_id){
        $this->_del($post_id);
    }
  }
  //ham xoa tin tuc
  private function _del($post_id, $redirect = true){
    // lay ra thong tin tin tuc
    $post = $this->blog_model->get_info($post_id);
    if(!$post){
        // in ra thong bao loi
        $this->session->set_flashdata('message', 'Không tồn tại tin tức này');
        if($redirect){
            redirect (admin_url('blog'));
        }else{
            return false;
        }
    }
    //  xoa anh tinn tuc
    $image = './upload/post/'.$post->image_post;
    if(file_exists($image)){
        unlink($image);
    }
    
        // thuc hien xoa tin tuc
        $this->blog_model->delete($post_id);
    }
    // cap nhat tin tuc
    public function edit()
    {
         // load ra id
         $post_id = $this->uri->rsegment('3');
         $post_info = $this->blog_model->get_info($post_id);
         $image = $post_info->image;
         $this->data['post_info'] = $post_info;
         if(!$post_info){
             // thong bao ko ton tai id nay
             $this->session->set_flashdata('message', 'Không tồn tại tin tức này');
             redirect(admin_url('blog'));
         }

         // load thu vien validation
         $this->load->library('form_validation');
         $this->load->helper('form');
         if($this->input->post()){
             $this->form_validation->set_rules('title','Tiêu đề bắt buộc nhập','required');
             $this->form_validation->set_rules('content','Nội dung bắt buộc nhập','required');
             if($this->form_validation->run()){
                 // bat dau insert du lieu
                 $title = $this->input->post('title');
                 $summary = $this->input->post('summary');
                 $content = $this->input->post('content') ;
                // $key = $this->input->post('key') ;

                 // lay ten file anh minh hoa dc upload
                 $this->load->library('upload_library');
                 $upload_path = './upload/post';
                 $upload_data = $this->upload_library->upload($upload_path, 'image');
                 $image = '';
                 if(isset($upload_data['file_name'])){
                     $image = $upload_data['file_name'];
                 }
                 // data du lieu insert
                 $data = array(
                    'title' => $title,
                    'summary' => $summary,
                    'image' => $image,
                    'content' => $content,
                   // 'key_search' => $key
  
                );
                 //hinh anh
                 if($image != ''){
                     $image_corner = $post_info->image_post;
                     if(file_exists($image_corner)){
                         $image_corner = $this->input->get('image');
                         unlink('./upload/post/'.$image_corner);
                     }
                     $data['image'] = $image;

                 }
                 // them moi vao co so du lieu
                 if($this->blog_model->update($post_id, $data)){
                     // neu them thanh cong
                     $this->session->set_flashdata('message', 'Cập nhật thành công');
                     redirect(admin_url('blog'));
                 }else{
                     // in ra thong bao loi
                     $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                     redirect(admin_url('blog'));
                 }
             }
         }
         // load view
         $this->data['temp'] = 'admin/blog/edit';
         $this->load->view('admin/main', $this->data);

    }

  public function posting()
  {

      // load thu vien validation
      
      $this->load->library('form_validation');
      $this->load->helper('form');
      // kiem tra xem co du lieu post len
      if($this->input->post()){
          $this->form_validation->set_rules('title','Tiêu đề bắt buộc nhập','required');
          $this->form_validation->set_rules('content','Nội dung bắt buộc nhập','required');
          if($this->form_validation->run()){
              // bat dau insert du lieu
              $title = $this->input->post('title');
              $summary = $this->input->post('summary');
              $content = $this->input->post('content') ;
             // $key = $this->input->post('key') ;

              //  up anh minh hoa san pham
              $this->load->library('upload_library');
              $upload_path = './upload/post';
              $upload_data = $this->upload_library->upload($upload_path, 'image');
              $image = '';
              if(isset($upload_data['file_name'])){
                  $image = $upload_data['file_name'];

              }

              $data = array(
                  'title' => $title,
                  'summary' => $summary,
                  'image' => $image,
                  'content' => $content,
                  'view' => 0,
                  'create_date' => date("Y-m-d h:i:sa")//,
                  //'key_search' => $key

              );
              // them moi vao co so du lieu
              if($this->blog_model->create($data)){
                  // neu them thanh cong
                  $this->session->set_flashdata('message', 'Thêm mới thành công');
                  redirect(admin_url('blog'));
              }else{
                  // in ra thong bao loi
                  $this->session->set_flashdata('message', 'Có lỗi khi thêm tin tức mới');
              }

          }
          
        }
        $this->data['temp'] = 'admin/blog/posting';
        $this->load->view('admin/main', $this->data);
  }
}
?>