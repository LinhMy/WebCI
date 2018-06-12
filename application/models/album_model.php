<?php
class album_model extends MY_Model{
    var $table = 'album_images';
    var $key = 'img_id';
    function get_product_id($table,$data1){
        $image_list = $this->db->insert($table, $data1);
        return $this->db->insert_id();// return last insert id
    }
}
?>