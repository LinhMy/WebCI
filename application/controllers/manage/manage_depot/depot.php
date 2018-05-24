<?php
class Depot extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


	public function index()
	{		
        $this->load->view('manage_view/manage_depot_view/depot_view');
	}
	public function upload_file_zip()
	{ 
		//hien thi file load zip
		$this->load->view('manage_view/manage_depot_view/depot_view');

		if($this->input->post('submit'))
        {

		//file config luu file up len
        $config = array();
		    $config['upload_path']          = 'application/image/';
        $config['allowed_types']        = 'zip';
         
        $this->load->library('upload', $config);
         
         //kiem tra upload
        if ( $this->upload->do_upload('zip_file'))
        {
        	
        	//upload thanh cong
        	//luu du lieu vao bien data
        	//up load file zip
            $data = array('upload_data' => $this->upload->data());
            $full_path = $data['upload_data']['full_path'];
             
            /**** without library ****///thu vien zip giai nen thu muc zip
            $zip = new ZipArchive;
 
            if ($zip->open($full_path) === TRUE) 
            {
            	//giai nen o thu muc image
                $zip->extractTo(FCPATH.'/application/image/');
                $zip->close();
            }
 			//hien thi thanh cong o trang khac
            $params = array('success' => 'Extracted successfully!');
            //xoa file zip co tren server khi tai len
            unlink($full_path);
             $url =$base_url."/hello";// chuyen ve trang khac khi upload file thanh cong
                redirect($url);  
        }
        else
        {
        //hien thi upload khong thanh cong
            $params = array('error' => $this->upload->display_errors());
        }
        
         //chuyen trang
       // $this->load->view('file_upload_result', $params);
    }
    }

    //upload thong tin san pham bang file excel
    public function upload_excel()
    {
     
     //hien thi view upload
        $this->load->view('manage_view/manage_depot_view/upload_file_excel_view');
        //neu nhan submit
      if ($this->input->post('submit')) 
      {
            //thu muc chua file excel upload len
        $path = 'uploads/';
        //mo thu muc PHPexcel ho tro excel
        require_once APPPATH . "/third_party/PHPExcel.php";

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        //upload file 
        $this->load->library('upload', $config);
            //initialize: khởi tạo
        $this->upload->initialize($config);  
        //kiem tra upload thanh cong chua          
        if (!$this->upload->do_upload('uploadFile')) {
            //upload khong thanh cong hien thi loi
            $error = array('error' => $this->upload->display_errors());
        } 
        else 
        {
            //upload thanh cong du lieu luu vao $data
            $data = array('upload_data' => $this->upload->data());
        }
        //upload khong loi
        if(empty($error))
        {
            //ton tai ten file neu chua thi gan
          if (!empty($data['upload_data']['file_name'])) 
          {
            $import_xls_file = $data['upload_data']['file_name'];
          }
          else 
          {
            $import_xls_file = 0;
          }
           //path gan them ten file
           $inputFileName = $path . $import_xls_file;
            
            //doc file
           try {
            //PHPExcel ho tro doc file
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            //lay sheet
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = true;
            $i=0;
            //chay qua tung sheet
            foreach ($allDataInSheet as $value) 
            {
              if($flag){
                $flag =false;
                continue;
              }
                           //gan gia tri insert theo tung cot trong excel
              $inserdata[$i]['category_id'] = $value['A'];
              $inserdata[$i]['product_name'] = $value['B'];
              $inserdata[$i]['image'] = $value['C'];
              $inserdata[$i]['price'] = $value['D'];
              $inserdata[$i]['discount'] = $value['E'];
              $inserdata[$i]['date'] = date('Y-m-d H:i:s');
              $inserdata[$i]['view'] = "0";
              $inserdata[$i]['quantity'] = $value['F'];
              $inserdata[$i]['content'] = $value['G'];
              $i++;

            }               
                        //insert vao database
            $result = $this->upload_model->insert_product_excel($inserdata);   
            if($result)
            {
              echo "Imported successfully";
            }
            else
            {
              echo "ERROR !";
            }             
          

        }//bat exception khi doc file khong thanh cong 
        catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
      }
      else
      {
          echo $error['error'];
      }
        
        
    }
  }
}

?>