<?php
    class Order extends MY_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->model('order_model');
        }
    }
?>