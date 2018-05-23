<?php
class Form_contact extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('contact_model'); 
    }


  public function index()
  {
  	//lay du lieu o db 
  	$data['contact_list']=$this->contact_model->get_list_contact();
    //hien thi view lien he
    $this->load->view('admin/contact/contact_list_view',$data);
    
  }
  //tra loi thac mac cua khach hang
  public function reply_contact($id_contact)
  {
  //lay du lieu o db 
  	$data['contact']=$this->contact_model->get_contact($id_contact);
    //hien thi view lien he
    $this->load->view('admin/contact/reply',$data);
    if($this->input->post('submit'))
    {
      $config['protocol'] = 'sendmail';
      $config['charset'] = 'utf-8';
      $config['mailtype'] = 'html';
      $config['wordwrap'] = TRUE;
      $this->email->initialize($config);
       //lấy thông tin post len
      //cau hinh email va ten nguoi gui
      $this->email->from('onlineshop303@outlook.com.vn');
      //cau hinh nguoi nhan'onlineshop303@outlook.com.vn'
      $this->email->to($this->input->post('email'));
       
      $this->email->subject('Trả lời về thắc mắc của bạn trên OnlineShop');
      $this->email->message($this->input->post('reply'););
       
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