<?php
    class Shop extends MY_Controller{
        function adress()
        {
            $this->data['temp'] = 'site/shop/adress';
            $this->load->view('site/layout',$this->data);
        }

    }
?>