<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelOrders extends CI_Model {

    public function getOrders()
    {
        $this->db->select('order_id, table_name, order_status, customer_nickname, customer_fname, customer_lname');    
        $this->db->from('tbl_orders');
        $this->db->join('tbl_customer', 'tbl_orders.customer_id = tbl_customer.customer_id');
        $this->db->join('tbl_table', 'tbl_orders.table_id = tbl_table.table_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}

/* End of file modelOrders.php */
/* Location: ./application/models/modelOrders.php */