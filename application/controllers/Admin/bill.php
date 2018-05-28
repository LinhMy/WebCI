<?php
class bill extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('bill_model');
    }
    // hien thi danh sach giao dich cua website
    function index(){
        //lay tong so luong ta ca cac giao dich trong websit
        $total_rows = $this->bill_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac giao dich tren website
        $config['base_url']   = admin_url('bill/index'); //link hien thi ra danh sach giao dich
        $config['per_page']   = 10;//so luong giao dich hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem tra co thuc hien loc du lieu hay khong
        $bill_id = $this->input->get('id');
        $bill_id = intval($bill_id);
        $input['where'] = array();
        if($bill_id > 0)
        {
            $input['where']['bill_id'] = $bill_id;
        }


        //lay danh sach giao dich
        $list = $this->bill_model->get_list($input);
        $this->data['list'] = $list;
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/bill/index';
        $this->load->view('admin/main', $this->data);
    }
    function view(){
        //lay id cua giao dịch ma ta muon xoa
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->bill_model->get_info($id);
        if(!$info)
        {
            return false;
        }
        $info->_amount = number_format($info->amount);
        if($info->status == 0)
        {
            $info->_status = 'pending';//đợi xử lý
        }
        elseif($info->status == 1)
        {
            $info->_status = 'completed';//hoàn thành
        }
        elseif($info->status == 2)
        {
            $info->_status = 'cancel';//hủy bỏ
        }
        //lấy danh sách đơn hàng  của giao dịch này
        $this->load->model('order_model');
        $input = array();
        $input['where'] = array('bill_id' => $id);
        $orders = $this->order_model->get_list($input);
        if(!$orders)
        {
            return false;
        }
        //load model sản phẩm product_model
        $this->load->model('product_model');
        foreach ($orders as $row)
        {
            //thông tin sản phẩm
            $product = $this->product_model->get_info($row->product_id);
            $product->image = base_url('upload/product/'.$product->image);
            $product->_url_view = site_url('product/view/'.$product->id);

            $row->_price = number_format($product->price);
            $row->_amount = number_format($row->amount);
            $row->product = $product;
            $row->_can_active = true;//có thể thực hiện kích hoạt đơn hàng này hay không
            $row->_can_cancel = TRUE;//có thể hủy đơn hàng hay không

            if($row->status == 0)
            {
                $row->_status     = 'pending';//đợi xử lý
            }
            elseif($row->status == 1)
            {
                $row->_status = 'completed';//Đã giao hàng
                $row->_can_active = false;//không thể kích hoạt
            }
            elseif($row->status == 2)
            {
                $row->_status = 'cancel';//hủy bỏ
                $row->_can_cancel = false;//không thể kích hoạt
            }
            //link hủy bỏ đơn hàng
            $row->_url_cancel = admin_url('bill/cancel/'.$row->id);
            $row->_url_active = admin_url('bill/active/'.$row->id);//link kích hoạt đơn hàng
        }

        $this->data['info']   = $info;
        $this->data['orders'] = $orders;
        // Tai file thanh phan
        $this->load->view('admin/bill/view', $this->data);
    }
    // xoa  dao dich
    function delete(){
        // lay ra id giao dich
        $id_transaction = $this->uri->rsegment('3');
        $this->_del($id_transaction);
        // thong bao xoa thanh cong
        $this->session->set_flashdata('message', 'Xóa thành công giao dịch này');
        redirect(admin_url('bill'));

    }
    // xoa nhieu giao dich
    function delete_all(){
        $ids = $this->input->post('ids');
        foreach ($ids as $id_transaction){
            $this->_del($id_transaction);
        }

    }
    private function _del($id_transaction, $redirect = true){
        // lay ra thong tin giao dich
        $transaction = $this->transaction_model->get_info($id_transaction);
        if(!$transaction){
            // in ra thong bao loi
            $this->session->set_flashdata('message', 'Không tồn tại giao dịch này');
            if($redirect){
                redirect (admin_url('bill'));
            }else{
                return false;
            }
        }

        // thuc hien xoa giao dich
        $this->transaction_model->delete($id_transaction);

    }
}
?>