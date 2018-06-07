<?php
class Revenue_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        //tong so giao dich 
        public function get_tran()
        {
           return $this->db->count_all('transaction');
            
        }
        //tong so thanh vien
         public function get_member()
        {
           return $this->db->count_all('user');
            
        }
        //tong so LIEN HE
         public function get_contact()
        {
           return $this->db->count_all('contact');
            
        }

        //tong so san pham
        public function get_product()
        {
           //return $this->db->count_all('product');
            $this->db->select_sum('quantity');
            $query = $this->db->get('product');
            return $query->result(); 
        }

        //doanh so hom nay
        public function get_revenue_now()
        {
            $this->db->select_sum('amount');
            $this->db->where('day(paid_date)',date("d") );
            $query = $this->db->get('transaction');
            return $query->result(); 
        }
        
        //lay doanh so theo tuan
         public function get_revenue_week()
        {
            $query= $this->db->query('SELECT day(paid_date), dayname(paid_date) as day, SUM(amount) AS total_sum FROM transaction  where paid_date BETWEEN current_date()-7 AND current_date
                GROUP BY day(paid_date) ASC;');
            return $query->result();
        }
        //lay doanh so theo nam
        public function get_revenue_year()
        {
            $query= $this->db->query('SELECT year(paid_date) as label_y, SUM(amount) AS total_sum FROM transaction /* where paid_date BETWEEN current_date()-7 AND current_date*/
                GROUP BY year(paid_date) ASC;');
            return $query->result();
        }

        //lay doanh so theo thang
        public function get_revenue_month()
        {
            $query= $this->db->query('SELECT month(paid_date),monthname(paid_date) as label_m, SUM(amount) AS total_sum FROM transaction  where year(paid_date) = year(current_date())
                GROUP BY month(paid_date) ASC;');
            return $query->result();
        }


         //lay xu hướng theo tuần
         public function get_tendency_week()
        {
            $query= $this->db->query('SELECT day(created_date),category_id, dayname(created_date) as day, SUM(view) AS amount FROM product  where created_date BETWEEN current_date()-7 AND current_date
                GROUP BY day(created_date),category_id ASC;');
            return $query->result();
        }
        //lay xu huong theo nam
        public function get_tendency_year()
        {
            $query= $this->db->query('SELECT category_id,year(created_date) as label_y, SUM(view) AS amount FROM product /* where paid_date BETWEEN current_date()-7 AND current_date*/
                GROUP BY year(created_date), category_id ASC;');
            return $query->result();
        }

        //lay xu huong theo thang
        public function get_tendency_month()
        {
            $query= $this->db->query('SELECT category_id,month(created_date),monthname(created_date) as label_m, SUM(view) AS amount FROM product  where year(created_date) = year(current_date())
                GROUP BY month(created_date),category_id ASC;');
            return $query->result();
        }
}
?>   