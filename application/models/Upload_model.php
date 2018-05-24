<?php
class Upload_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        //chen du lieu khi khach hang nhap lien he
        public function insert_product_excel($data_insert)
        {
           return $this->db->insert('product', $data_insert);
        }
        // lay id danh muc tu ten cua danh muc

}
?>
	   