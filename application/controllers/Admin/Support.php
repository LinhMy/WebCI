<?php
class Support extends MY_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email'); 
        $this->load->model('contact_model');
        
    }


  public function index()
  {
    
    //lay du lieu o db 
    if($this->input->post()){
     
          $info_shop = $this->input->post('info_shop');
          $facebook = $this->input->post('facebook');
          $message = $this->input->post('message');
          $address = $this->input->post('address');
          $phone = $this->input->post('phone');

          // lay ten file anh minh hoa dc upload
          $this->load->library('upload_library');
          $upload_path = './upload/logos';
          $upload_data = $this->upload_library->upload($upload_path, 'image');
          $image = '';
          if(isset($upload_data['file_name'])){
              $image_shop = $upload_data['file_name'];
          }
          // data du lieu insert

           if($image != ''){
              $image_corner = $product_info->image;
              if(file_exists($image_corner)){
                  $image_corner = $this->input->get('image');
                  unlink('./upload/products/'.$image_corner);
              }
              //$data_image = $image;
              
          }
          $data =  $info_shop.";".$facebook.";". $message.";".$address.";".$phone.";". $image_shop;
          $path= "././public/shopinfo.txt";
           $file = @fopen( $path, "w" );   
          if( $file == false )
          {
              echo 'Mở file không thành công';
            }
            else
            {                
                fwrite($file, $data);
            }

          /*/ them moi vao co so du lieu
         if($this->contact_model->update( $data)){
              // neu them thanh cong
              $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
              redirect(admin_url('support'));
          }else{
              // in ra thong bao loi
              $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
              redirect(admin_url('support'));
          }*/

        }

   // $this->data['shop_info']=$this->contact_model->get_info_shop();

   // lay du lieu lien he
     $this->data['contact_list']=$this->contact_model->get_list_contact();
    //doc file chua thong tin shop
        $path= "././public/shopinfo.txt";
        $fp = @fopen($path, "r");
        
        // Kiểm tra file mở thành công không
        if (!$fp) {
           // echo $path;
        }
        else
        {
            // Đọc file và trả về nội dung
            $data = file_get_contents($path);//fread($fp, filesize($path));            
            $this->data['shopinfo']= explode (";",$data);
        }
        fclose($fp);
    $this->data['temp'] = 'admin/support/index';
    $this->load->view('admin/main', $this->data);
  	
    //hien thi view lien he
   // $this->load->view('admin/contact/contact_list_view',$data);
    
  }
  //ham bao gui mail thanh cong
 public function succeed()
  {            
     $this->data['temp'] = 'admin/support/succeed';
      $this->load->view('admin/main', $this->data);
  }
  //tra loi thac mac cua khach hang
  public function reply_contact($id_contact)
  {
  //lay du lieu o db 
  	$this->data['contact']=$this->contact_model->get_contact($id_contact);
    $this->data['temp'] = 'admin/support/reply';
    $this->load->view('admin/main', $this->data);
    //hien thi view lien he
    //$this->load->view('admin/contact/reply',$data);
    if($this->input->post('submit'))
    {
      /*$config['protocol'] = 'sendmail';
      $config['charset'] = 'utf-8';
      $config['mailtype'] = 'html';
      $config['wordwrap'] = TRUE;
      'mailtype'  => 'html', 
      'charset'   => 'iso-8859-1'*/
      $config['protocol']     = 'smtp';
      $config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
      $config['smtp_user']    = 'linhnghicong@gmail.com';
      $config['smtp_pass']    = 'emwlwmwnkbnsenqg';
      $config['smtp_port']    = '465'; //nếu sử dụng gmail  
      $config['mail-type']  = "text";
      $config['newline'] = "\r\n";
     // $this->load->library('email',$config);
      $this->email->initialize($config);
       //lấy thông tin post len
      //cau hinh email va ten nguoi gui
      $this->email->from('linhnghicong@gmail.com');
      //cau hinh nguoi nhan
      $this->email->to($this->input->post('email'));
       
      $this->email->subject('Trả lời về thắc mắc của bạn trên Shop');
      $this->email->message($this->input->post('reply'));
       
      //dinh kem file
      //$this->email->attach('/path/to/photo1.jpg');
      //thuc hien gui
      if ( ! $this->email->send() )
      {
          // Generate error
          echo $this->email->print_debugger();
      }else{
          echo 'Gửi email thành công';
          $this->contact_model->update_reply();
          $url =$base_url."/admin/support/succeed";// chuyen ve trang khac khi upload file thanh cong
          redirect($url);
      }

    }
  }

  //chat vs khach hang = chuyen qua fb nhan tin
  public function chat()
  {
     $this->data['temp'] = 'admin/support/chat';
     $this->load->view('admin/main', $this->data);
  }
}
?>