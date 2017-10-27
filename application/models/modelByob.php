<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelByob extends CI_Model {

    public function getByobList()
    {
        $query = $this->db->get('tbl_byob');
        return $query->result_array();
    }

    public function updateByob($aByobId, $aData)
    {
        $this->db->where($aByobId);
        $this->db->update('tbl_byob', $aData);
        return $this->getByob($aByobId);
    }

    public function getByob($aByobId)
    {
        $query = $this->db->get_where('tbl_byob', $aByobId);
        return $query->row_array();
    }

    public function getByobIngrd()
    {
        $query = $this->db->get('tbl_byob_opt');
        return $query->result_array();
    }

}

/* End of file modelByob.php */
/* Location: ./application/models/modelByob.php */