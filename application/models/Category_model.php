<?php
    class Category_model extends MY_Model{
        var $table = 'category';
        var $key = 'category_id';
        public function get_category_name()
        {
            $this->db->select('category_name');
            $this->db->where('parent_id <>',0);
            $query = $this->db->get('category');
            return $query->result();

        }
        public function get_category_id($category_name)        {
            $this->db->select('category_id');
            $this->db->where('category_name',$category_name);
            $query = $this->db->get('category');
            return $query->row_array();
        }

    }

?>