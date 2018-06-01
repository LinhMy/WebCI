<?php
    class Blog extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        function index()
        {
            $this->data['temp'] = 'site/blog/index';
        $this->load->view('site/layout', $this->data);
        }
    }
    ?>