<?php
Class Vote_model extends MY_Model
{
    var $table = 'vote';
    var $key = 'vote_id';

    function get_reviews($where)
    {
        $this->db->select_avg('point');
        $this->db->where($where);
        $query= $this->db->get('vote');
        $ret = $query->row();
        return $ret->point;
    }
    /*lay gia tri vote cua set san pham
    */
    public function get_reviews_set($where)
    {
        $this->db->select_avg('point');
        $this->db->where($where);
        $query= $this->db->get('vote');
        $ret = $query->row();
        return $ret->point;
    }
    /*lay comment cua set san pham
    */
    public function get_comment_set($where)
    {
        $this->db->select('*');
        $this->db->where($where);
        $query= $this->db->get('vote');
        return $query->result();
    }
    // chen du lieu khach hang danh gia vao
    function insert_vote($data_insert){
        $this->db->insert('vote',$data_insert);
    }
    function get_comment($product_id){
        $this->db->select('*');
        $this->db->where('product_id',$product_id);
        $query= $this->db->get('vote');
        return $query->result();
    }
}
    ?>









