<?php
    class Category extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('category_model');
        }
        function index(){
            // gui bien temp
            $total = $this->category_model->get_total();
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
            $this->data['message'] = $message;
            // load view
            $this->data['temp'] = 'admin/category/index';
            $this->load->view('admin/main', $this->data);
        }
        function add(){
            $input['where'] = array('parent_id' => 0);
            $category_list = $this->category_model->get_list($input);
            $this->data['list'] = $category_list;
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('category_name','Tên sản phẩm bắt buộc nhập','required|min_length[4]');
                if($this->form_validation->run()){
                    $category_name = $this->input->post('category_name');
                    $data = array(
                        'category_name' => $category_name,
                        'parent_id' => $this->input->post('parent_category_id'),

                    );
                    // insert du lieu
                    if($this->category_model->create($data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công danh muc');
                        redirect(admin_url('Category'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm danh muc san pham');
                        redirect(admin_url('Category'));
                    }

                }
            }
            // load view
            $this->data['temp'] = 'admin/category/add';
            $this->load->view('admin/main', $this->data);
        }
        function edit(){
            // lay ra id dan muc
            $category_id = $this->uri->rsegment('3');
            $category_list = $this->category_model->get_info($category_id);
            $this->data['category_list'] = $category_list;
            // load ra thu vien form
            $this->load->library('form_validation');
            $this->load->helper('form');
            // kiem tra xem du lieu post len
            if($this->input->post()){
                $this->form_validation->set_rules('category_name','Tên sản phẩm bắt buộc nhập','required|min_length[4]');
                if($this->form_validation->run()){
                    $category_name = $this->input->post('category_name');
                    $data = array(
                        'category_name' => $category_name,
                    );
                    // insert du lieu
                    if($this->category_model->update($category_id, $data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                        redirect(admin_url('Category'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('Category'));
                    }

                }
            }
            // load view
            $this->data['temp'] = 'admin/category/edit';
            $this->load->view('admin/main', $this->data);
        }
        function delete(){
            // lay ra id san pham
            $category_id = $this->uri->rsegment('3');
            $this->_del($category_id);
            // redriect
            $this->session->set_flashdata('message', 'Xóa thành công danh mục sản phẩm');
            redirect(admin_url('Category'));

        }
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $category_id){
                $this->_del($category_id);
            }

        }
        private function _del($category_id, $redirect = true){
            // lay ra thong tin san pham
            $category = $this->category_model->get_info($category_id);
            if(!$category){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
                if($redirect){
                    redirect (admin_url('Category'));
                }else{
                    return false;
                }
            }

            // kiem tra xem danh muc nay co san pham hay ko
            $this->load->model('product_model');
            $category_info = $this->category_model->get_info_rule(array('parent_id' => $category_id), 'category_id');
            if($category_info){
                $this->session->set_flashdata('message', 'Danh mục ' .$category->category_name. ' có chứa sản phẩm, bạn cần xóa hết các sản phẩm trước khi xóa danh mục');
                if($redirect) {
                    redirect(admin_url('Category'));
                }else{
                    return false;
                }
            }


            // kiem tra xem danh muc nay co san pham hay ko
            $this->load->model('product_model');
            $product = $this->product_model->get_info_rule(array('category_id' => $category_id), 'product_id');
            if($product){
                $this->session->set_flashdata('message', 'Danh mục ' .$category->category_name. ' có chứa sản phẩm, bạn cần xóa hết các sản phẩm trước khi xóa danh mục');
                if($redirect) {
                    redirect(admin_url('Category'));
                }else{
                    return false;
                }
            }

            // thuc hien xoa san pham
            $this->category_model->delete($category_id);

        }
    }
?>