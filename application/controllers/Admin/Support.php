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
    $this->data['contact_list']=$this->contact_model->get_list_contact();
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
      if ( ! $this->email->send())
      {
          // Generate error
          echo $this->email->print_debugger();
      }else{
          echo 'Gửi email thành công';
          $url =$base_url."/admin/support/succeed";// chuyen ve trang khac khi upload file thanh cong
          redirect($url);
      }

  }
}
}
?>