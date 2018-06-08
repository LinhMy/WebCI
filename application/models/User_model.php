<?php
    class User_model extends MY_Model{
        var $table = 'user';
        var $key = 'user_id';
        // lay danh sach admin
        public function get_list_admin()
        {
            $this->db->where('type', 1);
            $query = $this->db->get('user');
            return $query->result();
        }
        // lay danh sach user
        public function get_list_user()
        {
            $this->db->where('type', 0);
            $query = $this->db->get('user');
            return $query->result();
        }
    }

?>