<?php
    class SetProduct_model extends MY_Model{
        var $table = 'set_product';
        var $key = 'set_id';

        public function get_setproduct()
        {
           $query = $this->db->get('set_product');
           return $query->result();
        }
        public function change($set_id, $display)
        {
            $this->db->where('set_id', $set_id);
            $this->db->update('display', $display);
            $this->db->get('set_product');
        }
        public function get_list_product()
        {
            $this->db->select('category.category_name as category_name, product.*');
            $this->db->from('product');
            $this->db->join('category','product.category_id = category.category_id');
            $this->db->order_by('product_id','desc');
            $query=$this->db->get();
            return $query->result();
        }
        // lay cac san pham co trong set
        public function get_list_product_in_set($set_id)
        {
          $sql= "select  * from product
            join category
            where category.category_id = product.category_id and product_id in (
                select product_id from set_product_child  where set_id  =
                ".$set_id.") ;
            ";
        $query = $this->db->query($sql);
        return $query->result();
       /* $this->db-> select('product.*');
        $this->db->from('product');
        $this->db->join('set_product_child','product.product_id = set_product_child.product_id');
        $this->db->order_by('product_id','desc');
        $query=$this->db->get();
        return $query->result();*/
        }
        public function get_set_name($set_id)
        {
        $sql= "select set_id from set_product where set_name = \"".$set_id."\"";
        $query = $this->db->query($sql);
        return $query->row();
        }
        public function insert_setproduct_child($product_id,$set_id)
        {
            $data = array(
                'product_id' => $product_id,
                'set_id' => $set_id
            );
            $this->db->insert('set_product_child',$data);
        }
    }
?>