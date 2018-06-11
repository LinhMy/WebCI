<?php
    class Blog_model extends MY_Model{
        var $table = 'post';
        var $key = 'post_id';
        //lay danh sach bai viet theo thoi gian giam dan
        public function get_list_post()
        {
            $this->db->order_by('create_date', 'desc');
            $query = $this->db->get('post');
            return $query->result();
        }
        // lay bai viet theo id
        public function get_post($post_id)
        {
            $this->db->where('post_id', $post_id);
            $query = $this->db->get('post');
            return $query->result();
        }
    }
?>