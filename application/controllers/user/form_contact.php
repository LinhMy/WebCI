<?php
class Form_contact extends MY_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('contact_model'); 
    }


  public function index()
  {
    //hien thi view lien he
    $this->load->view('user_view/form_contact_view');
    //neu nhan submit
    if($this->input->post('submit'))
    {
      //lay thong tin form lien he
        $name = $this->input->post('name');
        $namemail = $this->input->post('namemail');
        $content = $this->input->post('content');
        $data_insert = array('name' => $name, 'email' => $namemail, 'content'=> $content, 'reply'=> 'FALSE', 'date'=> date('Y-m-d H:i:s'));
          //chen vao DB
        if($this->contact_model->insert_contact($data_insert))
        { 
          //insert thanh cong
          $url =$base_url."/";// quay lai trang lien he
          redirect($url);
        }
        else
        {
          //insert khong thanh cong

        }
    }
  }
}
 /*/hien thi form gui email
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
      }*/

?>

   
  
