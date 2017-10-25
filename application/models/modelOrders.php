<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelOrders extends CI_Model {

    public function getOrders()
    {
        $this->db->select('order_id, table_name, order_status, customer_nickname');    
        $this->db->from('tbl_orders');
        $this->db->join('tbl_table', 'tbl_orders.table_id = tbl_table.table_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderStatus($iOrderId)
    {
        $this->db->select('order_status');
        $this->db->from('tbl_orders');
        $this->db->where('order_id', $iOrderId);
        $query = $this->db->get();
        return $query->row_array();
        // return $this->db->last_query();
    }

    public function changeOrderStatus($iOrderId, $aData){
        $this->db->where('order_id', $iOrderId);
        $query = $this->db->update('tbl_orders', $aData);
        return $query->row_array();
    }

}

/* End of file modelOrders.php */
/* Location: ./application/models/modelOrders.php */