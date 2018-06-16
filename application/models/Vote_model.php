<?php
Class Vote_model extends MY_Model
{
    var $table = 'vote';
    var $key = 'vote_id';
    /*lay gia tri vote cua  san pham/ set sp
        */   
    function get_reviews($where)
    {
        $this->db->select_avg('point');
        $this->db->where($where);
        $query= $this->db->get('vote');
        $ret = $query->row();
        return $ret->point;
    }
    
    // chen du lieu khach hang danh gia vao
    function insert_vote($data_insert){
        $this->db->insert('vote',$data_insert);
    }
    /*lay gia tri comment cua set san pham hoac sp
    */   
    function get_comment($where){
        $this->db->select('*');
        $this->db->where($where);
        $query= $this->db->get('vote');
        return $query->result();
    }
}
    ?>









