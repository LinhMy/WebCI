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
            /*$sql= "SELECT product.*, category.name as category_name, psi.qty as qty
                    FROM product
                    INNER JOIN category
                    ON category.category_id = product.product_id
                    INNER JOIN product_set_item psi
                    ON psi.product_id = product.product_id
                    INNER JOIN product_set
                    On product_set.product_set_id = psi.product_set_id
                    WHERE product.product_id in (
                    select product_id from product_set_item  where product_set_id  =
                    ".$set_id.")";*/
            $sql= "select product.*, category.name as category_name        
            from product
                join category
                where category.category_id = product.category_id and product_id in (
                    select product_id from product_set_item  where product_set_id  =
                    ".$set_id.") ;
                ";
            $query = $this->db->query($sql);
            return $query->result();
        }

        function get_price_set($set_id)
        {
            $this->db->select('price');
            $this->db->where('product_set_id',$set_id);
            $query =$this->db->get('product_set')->row();
            return $query->price;

        }

        //tong san pham co trong set
        function get_total_product_in_set($set_id)
        {
            $this->db->select('product_id');
            $this->db->where('product_set_id', $set_id);
            $query = $this->db->get('product_set_item');
            return $query->num_rows();
        }

        // lay ten cua set dua tren id
        public function get_set_id($name)
        {
            $sql= "select product_set_id  from product_set where name = \"".$name."\"";
            $query = $this->db->query($sql);
            return $query->row();
        }
        // chen du lieu vao product item khi chen cac san pham vao set
        public function insert_product_set_item($product_id,$qty,$product_set_id)
        {
            $data = array(
                'product_id' => $product_id,
                'qty' => $qty,
                'product_set_id' => $product_set_id
            );
            $this->db->insert('product_set_item',$data);
        }
        // update du lieu khi sua doi cac san pham trong set
        public function update_product_set_item($product_id,$qty,$product_set_id)
        {
            $data = array(
                'product_id' => $product_id,
                'qty' => $qty               
            );
            $this->db->where( 'product_set_id', $product_set_id);
            $this->db->update('product_set_item',$data);
        }
        /*Lay tong tien tu san pham da chon
        */
        function get_total_product_select($where)
        {
            $sql= "select sum(price) as total from product where ".$where;                
            $query = $this->db->query($sql);
            $ret =$query->row();
            return $ret->total;
            //$this->db->select_sum('price');
            //$this->db->where($where);
           // $query = $this->db->get('product');
            //return $query->result();
        }
        // lay gia tung san pham
        function get_product_price($product_id)
        {
            $this->db->select('price');
            $this->db->where('product_id', $product_id);
            $query= $this->db->get('product');
            $ret= $query->row();
            return $ret->price;
        }
    }
?>