<?php
    class Shop extends MY_Controller{
        function adress()
        {
					

					 $this->load->model('contact_model');
					 // mở file ghi thong tin shop hien thi
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
					// $this->data['shop_info']=$this->contact_model->get_info_shop();
            $this->data['temp'] = 'site/shop/adress';
            $this->load->view('site/layout',$this->data);
            if($this->input->post('submit'))
						{
							//lay thong tin form lien he
								$name = $this->input->post('name');
								$namemail = $this->input->post('mailname');
								$content = $this->input->post('subject');
								$data_insert = array('name' => $name, 'email' => $namemail, 'content'=> $content, 'reply'=> 'FALSE', 'date_sent'=> date('Y-m-d H:i:s'));
									//chen vao DB
								if($this->contact_model->insert_contact($data_insert))
								{ 
									//insert thanh cong
									$url =$base_url."/Home";// quay lai trang lien he
									redirect($url);
								}
								else
								{
									//insert khong thanh cong
									$url =$base_url."/Shop/adress";// quay lai trang lien he
									redirect($url);

								}
						}
		}

    }
?>