<?php
class Home extends MY_Controller{
    function index(){

    	$this->load->model('revenue_model');
        //load du lieu bieu do
        //lay du lieu theo tuan
        $this->data['year']= $this->revenue_model->get_revenue_year();
        $this->data['month']= $this->revenue_model->get_revenue_month();
        $this->data['week'] = $this->revenue_model->get_revenue_week();

        /*/ lay xu huong hien thi ra bieu do
        //theo nam
        $this->data['line_year']= $this->revenue_model->get_tendency_year();
        //theo thang
        $this->data['line_month']= $this->revenue_model->get_tendency_month();
        //theo nam
        $this->data['line_week'] = $this->revenue_model->get_tendency_week();*/
        $this->data['tran']=$this->revenue_model->get_tran();
        $this->data['prod']=$this->revenue_model->get_product();
        $this->data['member']=$this->revenue_model->get_member();
        $this->data['contact']=$this->revenue_model->get_contact();
        $this->data['day_reve']=$this->revenue_model->get_revenue_now();
        

        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);

    }
     
}
?>