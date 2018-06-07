<?php
Class Vote_model extends MY_Model
{
    var $table = 'vote';
    var $key = 'vote_id';

    function get_reviews($product_id)
    {
        $this->db->select_avg('point');
        $this->db->where('product_id',$product_id);
        $query= $this->db->get('vote');
        $ret = $query->row();
        return $ret->point;
    }
    function insert_vote($data){
        $this->db->insert('vote',$data);

    }
}
    ?>








