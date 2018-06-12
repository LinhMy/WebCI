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
}
?>