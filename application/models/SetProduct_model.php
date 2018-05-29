<?php
    class SetProduct_model extends MY_Model{
        var $table = 'set_product';
        var $key = 'set_id';

        public function get_setproduct()
        {
           $query = $this->db->get('set_product');
           return $query->result();
        }
    }
?>