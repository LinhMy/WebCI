<?php
    class Product_model extends MY_Model{
        var $table = 'product';
        var $key = 'product_id';
    
    // tim kiem theo id san pham
    public function search_product_by_id()
    {
        $this->db->where('product_id', $product_id);
    }
    // tim kiem san pham theo ten
    public function search_product_by_name()
    {
        $this->db->like('product.product_name', $product_name);
    }
    
    // lay danh sach set san pham
    public function get_list_product_set()
    {
        $query =$this->db->get('product_set');
        return $query->result();
    }
    #lay danh sach diem vote cho set san pham
    public function get_vote_set_product()
    {
        $this->db->select_avg('point');
        $this->db->select('product_id');
        $this->db->where('type',1);
        $query= $this->db->get('vote');
        return $query->result();
    }
    public function get_image_list($product_id)
    {
        /*$sql= "select path form album_images where product_id=".$product_id;

        if ($query = $this->db->query($sql)) {

            $result = $query->result();
            return $result[0]->image_list;
        }
        else
            return NULL;*/
        $this->db->select('path');
        $this->db->where('product_id', $product_id); 
     
        $query= $this->db->get('album_images');
        return $query->result();


    }
    function get_random_image($product_id)
    {
        /*$sql= "select path form album_images where product_id=".$product_id;

        if ($query = $this->db->query($sql)) {

            $result = $query->result();
            return $result[0]->image_list;
        }
        else
            return NULL;*/
        $this->db->select('path');
        $this->db->where('product_id', $product_id); 
        $this->db->order_by('product_id', 'RANDOM');
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query= $this->db->get('album_images');
        return $query->result();
    }
}
?>