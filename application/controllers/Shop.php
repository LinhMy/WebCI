<?php
    class Shop extends MY_Controller{
        function adress()
        {
            $this->data['temp'] = 'site/shop/adress';
            $this->load->view('site/layout',$this->data);
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