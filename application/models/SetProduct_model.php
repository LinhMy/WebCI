<?php
    class SetProduct_model extends MY_Model{
        var $table = 'set_product';
        var $key = 'set_id';

        public function get_setproduct()
        {
           $query = $this->db->get('set_product');
           return $query->result();
        }
        public function change($set_id, $display)
        {
            $this->db->where('set_id', $set_id);
            $this->db->update('display', $display);
            $this->db->get('set_product');
        }
        public function get_list_product()
        {
            $this->db->select('category.category_name as category_name, product.*');
            $this->db->from('product');
            $this->db->join('category','product.category_id = category.category_id');
            $this->db->order_by('product_id','desc');
            $query=$this->db->get();
            return $query->result();
        }
    }
?>