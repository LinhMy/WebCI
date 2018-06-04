<?php
    class Blog extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('blog_model');
        }
        function index()
        {
            //lay danh sach cac bai viet de hien thi theo thoi gian moi nhat
            $this->data['post_list']=$this->blog_model->get_list_post();
            $this->data['temp'] = 'site/blog/index';
            $this->load->view('site/layout', $this->data);
        }
        public function view_post($post_id)
        {
            //LAY DU lieu hien thi bai viet
            $this->data['post']=$this->blog_model->get_post($post_id);            
            $this->data['temp'] = 'site/blog/view';
            $this->load->view('site/layout', $this->data);
        }
    }
    ?>