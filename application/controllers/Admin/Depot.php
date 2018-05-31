<?php
    class Depot extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('category_model');
            $this->load->model('upload_model');
            
        }
        function index(){
            // gui bien temp
           /* $total = $this->category_model->get_total();
            $this->data['total'] = $total;
            // lay danh sach danh muc
            $input = array();
            $input['where'] = array('parent_id' => 0);
            $category_list = $this->category_model->get_list($input);
            foreach ($category_list as $row){
                $input['where'] = array('parent_id' => $row->category_id);
                $subs = $this->category_model->get_list($input);
                $row->subs = $subs;
            }

            $this->data['list'] = $category_list;



            // lay ra noi dung thong bao message
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;*/
            // load view
            $this->data['temp'] = 'admin/depot/index';
            $this->load->view('admin/main', $this->data);
        }
        function succeed()
        {            
           $this->data['temp'] = 'admin/depot/succeed';
            $this->load->view('admin/main', $this->data);
        }
        function addzip(){
           
            
            // load view
            $this->data['temp'] = 'admin/depot/addzip';
            $this->load->view('admin/main', $this->data);
            //hien thi file load zip

        if($this->input->post('submit'))
        {

        //file config luu file up len
        $config = array();
        $config['upload_path']      = 'upload/products/';
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
                $zip->extractTo(FCPATH.'/upload/products/');
                $zip->close();
            }
            //hien thi thanh cong o trang khac
            $params = array('success' => 'Extracted successfully!');
            //xoa file zip co tren server khi tai len
            unlink($full_path);
             $url =$base_url."/admin/depot/succeed";// chuyen ve trang khac khi upload file thanh cong
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
        function addexcel(){
           
            // load view
            $this->data['temp'] = 'admin/depot/addexcel';
            $this->load->view('admin/main', $this->data);
              //neu nhan submit
            if ($this->input->post('submit')) 
           {
                //thu muc chua file excel upload len
            $path = 'upload/';
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
                  //if($flag){
                   // $flag =false;
                   // continue;
                  //}
                  //gan gia tri insert theo tung cot trong excel
                  $inserdata['category_id'] =(int)$value['A'];
                  $inserdata['product_name'] = $value['B'];
                  $inserdata['image'] = $value['C'];
                  $inserdata['price'] = (int)$value['D'];
                  $inserdata['discount'] =(int)$value['E'];
                  $inserdata['date_product'] = date('Y-m-d H:i:s');
                  //$inserdata[$i]['view'] = 0;
                  $inserdata['quantity'] =(int)$value['F'];
                  $inserdata['content'] = $value['G'];
                  $result = $this->upload_model->insert_product_excel($inserdata);   
                 // $i++;

                }               
                            //insert vao database
                /*$result = $this->upload_model->insert_product_excel($inserdata);   
                if($result)
                {
                  echo "Imported successfully";
                }
                else
                {
                  echo "ERROR !";
                }  */   
                $full_path = $data['upload_data']['full_path'];
                unlink($full_path);
               $url =$base_url."/admin/depot/succeed";// chuyen ve trang khac khi upload file thanh cong
                redirect($url);  

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