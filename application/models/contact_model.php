<?php
class Contact_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        //chen du lieu khi khach hang nhap lien he
        public function insert_contact($data_insert)
        {
           return $this->db->insert('contact', $data_insert);
        }
        //lay thong tin shop 

        public function get_info_shop()
        {
           // $this->db->select('username,fullname,city,password,id_user,phone');
           $query = $this->db->get('shop');
           return $query->result();
        }

        // cap nhat thong tin shop 
        public function update($data)
        {
           return $this->db->update('shop',$data);
        }
        
        //lay danh sach cac lien he khach hang da gui
        public function get_list_contact()
        {
           // $this->db->select('username,fullname,city,password,id_user,phone');
            // sap xep theo thoi gian khach hang gui lien he
           $this->db->order_by("date_sent", "asc");
           $query = $this->db->get('contact');
           return $query->result();
        }
        //lay lien he de tra loi theo id_contact
         public function get_contact($id_contact)
        {
           //điều kiện 
            $this->db->where("contact_id", $id_contact);
            // sap xep theo thoi gian khach hang gui lien he
           $query = $this->db->get('contact');
           return $query->result();
        }
        //
        //cap nhat da tra loi
        public function update_reply()
        {
                $this->db->set('reply',1);
               $this->db->update('contact');
        }

}
?>
	   