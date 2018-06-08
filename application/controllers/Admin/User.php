<?php
    class user extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('user_model');
            $this->load->library("session");
        }
        function index(){
            // lay tong danh sach user
            $total_rows = $this->user_model->get_total();
            $this->data['total_rows'] = $total_rows;
            // lay danh sach user
            $user_list = $this->user_model->get_list_user();
            $this->data['list'] = $user_list;

            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            // load view
            $this->data['temp'] = 'admin/user/index';
            $this->load->view('admin/main', $this->data);
        }
        function check_username(){
            $username = $this->input->post('name');
            $where = array('name' => $username);
            // kiem tra userame da ton tai hay chua
            if($this->user_model->check_exists($where)){
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
                $this->form_validation->set_rules('name','Tên tài khoản bắt buộc','required|min_length[4]|callback_check_username');
                $this->form_validation->set_rules('password','Mật khẩu bắt buộc','required|min_length[4]');
                $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');

                if($this->form_validation->run()){

                    $username = $this->input->post('name');
                    $password = $this->input->post('password');
                    $password = ($password);
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phone');
                    $address = $this->input->post('address');
                    $note = $this->input->post('note');

                    $data = array(
                        'name' => $username,
                        'password' => $password,
                        'phone' => $phone,
                        'email' => $email,
                        'address' => $address,
                        'note' => $note,

                    );
                    // insert du lieu
                    if($this->user_model->create($data)){
                        // thong bao them thanh cong
                        $this->session->set_flashdata('message', 'Thêm mới thành công');
                        redirect(admin_url('user'));
                    }else{
                        $this->session->set_flashdata('message', 'Có lỗi khi thêm thành viên');
                    }

                }
            }
            // load view user
            $this->data['temp'] = 'admin/user/add';
            $this->load->view('admin/main', $this->data);
        }
        function edit(){
            // lay ra id thanh vien user
            $user_id = $this->uri->rsegment('3');
            $user_info = $this->user_model->get_info($user_id);
            if(!$user_info){
                // in ra thong bao loi
                $this->session->set_flashdata('message', 'Không tồn tại admin này');
                redirect(admin_url('user'));
            }
            $this->data['user_info'] = $user_info;
            // load ra dong thong bao
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            // load ra thu vien validation
            $this->load->library('form_validation');
            $this->load->helper('form');
            if($this->input->post()){

                $this->form_validation->set_rules('password','Mật khẩu bắt buộc','required|min_length[4]');
                $this->form_validation->set_rules('password_rp','Nhập lại mật khẩu không đúng ','required|matches[password]');
                $this->form_validation->set_rules('email','email','required|min_length[2]');
                $this->form_validation->set_rules('phone','Số điện thoại','required|min_length[2]');
                $this->form_validation->set_rules('address','Địa chỉ','required|min_length[2]');

                if($this->form_validation->run()){

                    $password = $this->input->post('password');
                    $password = ($password);
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phone');
                    $address = $this->input->post('address');
                    $note = $this->input->post('note');

                    $data = array(
                        'password' => $password,
                        'phone' => $phone,
                        'email' => $email,
                        'address' => $address,
                        'note' => $note,
                    );
                    // cap nhat co so du lieu
                    if($this->user_model->update($user_id, $data)){
                        // neu them thanh cong
                        $this->session->set_flashdata('message', 'Cập nhật thành công danh muc');
                        redirect(admin_url('user'));
                    }else{
                        // in ra thong bao loi
                        $this->session->set_flashdata('message', 'Có lỗi khi cập nhật');
                        redirect(admin_url('user'));
                    }


                }
            }
            // load view
            $this->data['temp'] = 'admin/user/edit';
            $this->load->view('admin/main', $this->data);
        }
        function delete(){
            // lay ra id user
            $user_id = $this->uri->rsegment('3');
            $this->_del($user_id);
            redirect(admin_url('user'));

        }
        function delete_all(){
            $ids = $this->input->post('ids');
            foreach ($ids as $user_id){
                $this->_del($user_id);
            }
        }
        function _del($user_id, $redirect = true){
            $user_id = intval($user_id);
            $user_info = $this->user_model->get_info($user_id);
            if(!$user_info){
                // tao roi noi dung thong bao
                $this->session->set_flashdata('message', 'Không tồn tại user này');
                if($redirect) {
                    redirect(admin_url('user'));
                }else{
                    return false;
                }

            }
            // xoa du lieu
            if($this->user_model->delete($user_id)){
                // tao ra noi dung xoa thanh cong
                $this->session->set_flashdata('message','Xóa thành công');
            }
        }

    }
?>