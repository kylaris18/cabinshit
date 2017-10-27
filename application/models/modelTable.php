<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTable extends CI_Model {

    public function getTables(){
        $query = $this->db->get('tbl_table');
        return $query->result_array();
    }

    public function addNewTable($aData)
    {
        $this->db->insert('tbl_table', $aData);
        return $this->db->insert_id();
    }

}

/* End of file modelTable.php */
/* Location: ./application/models/modelTable.php */