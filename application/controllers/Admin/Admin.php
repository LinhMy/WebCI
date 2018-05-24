<?php
    class Admin extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin_model');
        }
        function index(){
            // lay tong danh sach admin
            $total_rows = $this->admin_model->get_total();
            $this->data['total_rows'] = $total_rows;
            // lay danh sach admin
            $admin_list = $this->admin_model->get_list();
            $this->data['list'] = $admin_list;

            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            // load view
            $this->data['temp'] = 'admin/admin/index';
            $this->load->view('admin/main', $this->data);
        }
        function check_username(){
            $username = $this->input->post('username');
            $where = array('username' => $username);
            // kiem tra userame da ton tai hay chua
            if($this->admin_model->check_exists($where)){
                // in ra thong bao loi
                // tra ve thong bao loi
                $this->form_validation->set_message(__FUNCTION__,'Tai khoan da ton tai');
                return false;
            }else{
                return true;
            }
        }
        function add(){
            // load form
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('username','Tên tài khoản bắt buộc','required|min_length[4]|callback_check_username');
                $this->form_validation->set_rules('password','Mật khẩu bắt buộc','required|min_length[4]');
                $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');
                $this->form_validation->set_rules('information','thông tin nhân viên','required|min_length[2]');
                $this->form_validation->set_rules('position','chức vụ','required|min_length[2]');
                if($this->form_validation->run()){
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $password = ($password);
                    $information = $this->input->post('information');
                    $position = $this->input->post('position');

                    $data = array(
                        'username' => $username,
                        'password' => $password,
                        'position' => $position,
                        'information' => $information,
                    );
                    // insert du lieu
                    if($this->admin_model->create($data)){
                        // thong bao them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');
                        redirect(admin_url('admin'));
                    }else{
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm thành viên');
                    }

                }
            }
            // load view admin
            $this->data['temp'] = 'admin/admin/add';
            $this->load->view('admin/main', $this->data);
        }
        function edit(){
            // lay ra id thanh vien admin
            $admin_id = $this->uri->rsegment('3');
            $admin_info = $this->admin_model->get_info($admin_id);
            if(!$admin_info){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại admin này');
                redirect(admin_url('admin'));
            }
            $this->data['admin_info'] = $admin_info;
            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){
                $this->form_validation->set_rules('password','Mật khẩu bắt buộc','required|min_length[4]');
                $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');
                $this->form_validation->set_rules('information','thông tin nhân viên','required|min_length[2]');
                $this->form_validation->set_rules('position','chức vụ','required|min_length[2]');
                if($this->form_validation->run()){
                    $password = $this->input->post('password');
                    $password = ($password);
                    $information = $this->input->post('information');
                    $position = $this->input->post('position');

                    $data = array(
                        'password' => $password,
                        'position' => $position,
                        'information' => $information,
                    );
                    // cap nhat co so du lieu
                    if($this->admin_model->update($admin_id, $data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                        redirect(admin_url('admin'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('admin'));
                    }


                }
            }
            // load view
            $this->data['temp'] = 'admin/admin/edit';
            $this->load->view('admin/main', $this->data);
        }
        function delete(){
            // lay ra id admin
            $admin_id = $this->uri->rsegment('3');
            $this->_del($admin_id);
            redirect(admin_url('admin'));

        }
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $admin_id){
                $this->_del($admin_id);
            }
        }
        function _del($admin_id, $redirect = true){
            $admin_id = intval($admin_id);
            $admin_info = $this->admin_model->get_info($admin_id);
            if(!$admin_info){
                // tao roi noi dung thong bao
                $this->session->set_flashdata('message', 'Không tồn tại admin này');
                if($redirect) {
                    redirect(admin_url('admin'));
                }else{
                    return false;
                }

            }
            // xoa du lieu
            if($this->admin_model->delete($admin_id)){
                // tao ra noi dung xoa thanh cong
                $this->session->set_flashdata('message','Xóa thành công');
            }
        }
        function logout(){
            if($this->session->userdata('login')){
                $this->session->unset_userdata('login');
            }
            redirect(admin_url('login'));
        }
    }
?>