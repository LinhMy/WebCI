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
        //lay bai viet theo tag
        public function get_list_post_tag($start,$per_page,$tag_id)
        {
            $sql="SELECT * FROM post JOIN tag_item on post.post_id=tag_item.post_id where tag_item.tag_id=".$tag_id." limit ".$per_page." , ".$start;            
            $query = $this->db->query($sql);
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
             $this->db->insert('post', $data);
             return $this->db->insert_id();
        }
        // lay du lieu bang tag 
        public function get_list_tags()
        {
            $query = $this->db->get('tag');
            return $query->result();
        }
        // chen the tag vao bang tag_item
        public function insert_tag_item($data_tag_item)
        {
            $this->db->insert('tag_item', $data_tag_item);

        }
        # lay bai viet theo id + the tag cua bai viet do
        public function get_tag_post($post_id)
        {
            $this->db->select('*');
            $this->db->from('tag');            
            $this->db->where('post_id', $post_id);
            $this->db->join('tag_item', 'tag.tag_id = tag_item.tag_id');
            $query = $this->db->get();
            return $query->result();
        }
    }
?>