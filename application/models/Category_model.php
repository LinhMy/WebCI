<?php
    class Category_model extends MY_Model{
        var $table = 'category';
        var $key = 'category_id';
        // lay ten danh muc
        public function get_category_name()
        {
            $this->db->select('name');
            $this->db->where('parent <>',0);
            $query = $this->db->get('category');
            return $query->result();

        }
        // lay id danh muc
        public function get_category_id($category_name){
            $this->db->select('category_id');
            $this->db->where('name',$category_name);
            $query = $this->db->get('category');
            return $query->row_array();
        }

    }

?>