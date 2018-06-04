<?php
    class Blog_model extends MY_Model{
        var $table = 'post';
        var $key = 'post_id';
        public function get_list_post()
        {
            $query = $this->db->get('post');
            return $query->result();
        }
    }
?>