<?php
class Form_contact extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');  
    }


  public function index()
  {
    //hien thi form gui email
      $this->load->view('user_view/form_contact_view');
      //thu vien ho tro gui mail 
      $this->load->library('email');
      if($this->input->post('submit'))
        {
      // Cấu hình
      $config['protocol'] = 'sendmail';
      $config['charset'] = 'utf-8';
      $config['mailtype'] = 'html';
      $config['wordwrap'] = TRUE;
      $this->email->initialize($config);
       //lấy thông tin post len
      //cau hinh email va ten nguoi gui
      $this->email->from($this->input->post('mailname'););
      //cau hinh nguoi nhan
      $this->email->to('onlineshop303@outlook.com.vn');
       
      $this->email->subject('Tiêu đề');
      $this->email->message($this->input->post('subject'););
       
      //dinh kem file
      //$this->email->attach('/path/to/photo1.jpg');
      //thuc hien gui
      if ( ! $this->email->send())
      {
          // Generate error
          echo $this->email->print_debugger();
      }else{
          echo 'Gửi email thành công';
      }
  }
}
?>