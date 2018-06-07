<?php
    class ProductSet_model extends MY_Model{
        var $table = 'product_set';
        var $key = 'product_set_id';

        // tim kiem theo id product set

        public function search_product_set_id($product_set_id)
        {            
            $this->db->where('product_set_id', $product_set_id);  
        }

        // tim kiem theo name set
        public function search_product_set_name($name)
        {                        
           $this->db->like('product_set.name', $name);
        }

        //ham lay cot set_product trong bang product set
        public function get_product_set()
        {
           $query = $this->db->get('product_set');
           return $query->result();
        }
        // cho phep ban hay khong ban san pham
        public function change($product_set_id, $display)
        {
            $this->db->where('product_set_id', $product_set_id);
            $this->db->update('display', $display);
            $this->db->get('product_set');
        }
        /*
            lay tat ca cac set sp
        */
        public function get_list_product()
        {
            $this->db->select('category.name as category_name, product.*');
            $this->db->from('product');
            $this->db->join('category','product.category_id = category.category_id');
            $this->db->order_by('product_id','desc');
            $query=$this->db->get();
            return $query->result();
        }
        // lay cac san pham co trong set
        public function get_list_product_in_set($set_id)
        {
          $sql= "select product.*, category.name as category_name from product
            join category
            where category.category_id = product.category_id and product_id in (
                select product_id from product_set_item  where product_set_id  =
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
        // lay ten cua set dua trenn id
        public function get_set_name($product_set_id)
        {
        $sql= "select name  from product_set where product_set_id = \"".$product_set_id."\"";
        $query = $this->db->query($sql);
        return $query->row();
        }
        public function insert_product_set_item($product_id,$set_id)
        {
            $data = array(
                'product_id' => $product_id,
                'product_set_id' => $product_set_id
            );
            $this->db->insert('product_set_item',$data);
        }
    }
?>