<?php
    class Blog extends MY_Controller
    {
        private $perPage = 2;
        function __construct()
        {
            parent::__construct();
            $this->load->model('blog_model');
        }
        function index()
        {
            //lay danh sach cac bai viet de hien thi theo thoi gian moi nhat            
            // $query = $this->db->limit(5, $this->perPage)->get("posts");
             //$data['posts'] = $query->result();       
            // $this->load->view('myPost', $data);
            if(!empty($this->input->get("page"))){
                //diem bat dau lay du lieu    
                 $start = ceil($this->input->get("page") * $this->perPage);
                //lay danh sach them vao
                 $data['post_list'] = $this->blog_model->get_list_post_load($this->perPage,$start); //$query->result();
                 $result = $this->load->view('site/blog/data', $data);
                 echo json_encode($result);
            }
            else
            {
            $this->data['post_list']=$this->blog_model->get_list_post_load($this->perPage,0);            
            $this->data['post_popular']=$this->blog_model->get_list_post_popular();
            $this->data['tag_list']=$this->blog_model->get_list_tags();
            $this->data['temp'] = 'site/blog/index';
            $this->load->view('site/layout', $this->data);
            }
            
        }
        // HIEN THI CHI TIET BAI VIET
        public function view_post($post_id)
        {
            //LAY DU lieu hien thi bai viet
            $this->data['post']=$this->blog_model->get_post($post_id);  
            // lay cac the tag cua bai viet
            $this->data['tag_list']=$this->blog_model->get_tag_post($post_id);         
            $this->data['temp'] = 'site/blog/view';
            $this->load->view('site/layout', $this->data);
        }
        function post_tag($tag_id)
        {
            if(!empty($this->input->get("page"))){
                //diem bat dau lay du lieu    
                 $start = ceil($this->input->get("page") * $this->perPage);
                //lay danh sach them vao
                 $data['post_list'] = $this->blog_model->get_list_post_tag()($this->perPage,$start,$tag_id); //$query->result();
                 $result = $this->load->view('site/blog/data', $data);
                 echo json_encode($result);
            }
            else
            {
            $this->data['post_list']=$this->blog_model->get_list_post_tag($this->perPage,0,$tag_id);            
            $this->data['post_popular']=$this->blog_model->get_list_post_popular();
            $this->data['tag_list']=$this->blog_model->get_list_tags();
            $this->data['temp'] = 'site/blog/index';
            $this->load->view('site/layout', $this->data);
            }
            
        }
    }
    ?>