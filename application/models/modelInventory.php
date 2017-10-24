<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInventory extends CI_Model {

    public function getInventory(){
        $query = $this->db->get('tbl_inventory');
        return $query->result_array();
    }

}

/* End of file modelInventory.php */
/* Location: ./application/models/modelInventory.php */