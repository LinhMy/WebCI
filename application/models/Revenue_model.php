<?php
class Revenue_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        //lay doanh so theo tuan
         public function get_revenue_week()
        {
            $query= $this->db->query('SELECT day(date_bill), SUM(total) AS total_sum FROM bill  where date_bill BETWEEN current_date()-7 AND current_date
                GROUP BY day(date_bill) ASC;');
            return $query->result();
        }
        //lay doanh so theo nam
        public function get_revenue_year()
        {
            $query= $this->db->query('SELECT year(date_bill), SUM(total) AS total_sum FROM bill /* where date_bill BETWEEN current_date()-7 AND current_date*/
                GROUP BY year(date_bill) ASC;');
            return $query->result();
        }

        //lay doanh so theo thang
        public function get_revenue_month()
        {
            $query= $this->db->query('SELECT month(date_bill), SUM(total) AS total_sum FROM bill  where year(date_bill) = year(current_date())
                GROUP BY month(date_bill) ASC;');
            return $query->result();
        }
}
?>   