<?php
class Revenue_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        //tong so giao dich 
        public function get_tran()
        {
           return $this->db->count_all('bill');
            
        }
        //tong so thanh vien
         public function get_member()
        {
           return $this->db->count_all('user');
            
        }
        //tong so LIEN HE
         public function get_user()
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
            $this->db->select_sum('total');
            $this->db->where('day(date_bill)',date("d") );
            $query = $this->db->get('bill');
            return $query->result(); 
        }
        //lay doanh so theo tuan
         public function get_revenue_week()
        {
            $query= $this->db->query('SELECT day(date_bill), dayname(date_bill) as day, SUM(total) AS total_sum FROM bill  where date_bill BETWEEN current_date()-7 AND current_date
                GROUP BY day(date_bill) ASC;');
            return $query->result();
        }
        //lay doanh so theo nam
        public function get_revenue_year()
        {
            $query= $this->db->query('SELECT year(date_bill) as label_y, SUM(total) AS total_sum FROM bill /* where date_bill BETWEEN current_date()-7 AND current_date*/
                GROUP BY year(date_bill) ASC;');
            return $query->result();
        }

        //lay doanh so theo thang
        public function get_revenue_month()
        {
            $query= $this->db->query('SELECT month(date_bill),monthname(date_bill) as label_m, SUM(total) AS total_sum FROM bill  where year(date_bill) = year(current_date())
                GROUP BY month(date_bill) ASC;');
            return $query->result();
        }


         //lay xu hướng theo tuần
         public function get_tendency_week()
        {
            $query= $this->db->query('SELECT day(date_product),category_id, dayname(date_product) as day, SUM(view) AS total FROM product  where date_product BETWEEN current_date()-7 AND current_date
                GROUP BY day(date_product),category_id ASC;');
            return $query->result();
        }
        //lay xu huong theo nam
        public function get_tendency_year()
        {
            $query= $this->db->query('SELECT category_id,year(date_product) as label_y, SUM(view) AS total FROM product /* where date_bill BETWEEN current_date()-7 AND current_date*/
                GROUP BY year(date_product), category_id ASC;');
            return $query->result();
        }

        //lay xu huong theo thang
        public function get_tendency_month()
        {
            $query= $this->db->query('SELECT category_id,month(date_product),monthname(date_product) as label_m, SUM(view) AS total FROM product  where year(date_product) = year(current_date())
                GROUP BY month(date_product),category_id ASC;');
            return $query->result();
        }
}
?>   