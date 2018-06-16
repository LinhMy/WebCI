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
        //lay bai viet load more
        public function get_list_post_load($start,$per_page)
        {
            $this->db->order_by('create_date', 'desc');
            $this->db->limit($start,$per_page);
            $query = $this->db->get('post');
            return $query->result();
        }

        //lay danh sach tag cua bai viet
        public function get_list_tag()
        {
            $this->db->select('name');
            $query = $this->db->get('tag');
            return $query->result();
        }
        
        //lay danh sach bai viet pho bien nhat
        public function get_list_post_popular()
        {
            $this->db->limit(4);
            $this->db->order_by('view', 'desc');
            $query = $this->db->get('post');
            return $query->result();
        }
        // lay bai viet theo id
        public function get_post($post_id)
        {
            $this->db->where('post_id', $post_id);
            $query = $this->db->get('post');
            return $query->row();
        }
        // insert duu lieu khi dang bai
        public function insert_post($data)
        {
            return $this->db->insert('post', $data);
        }
    }
?>