<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelByob extends CI_Model {

    public function getByobList()
    {
        $query = $this->db->get('tbl_byob');
        return $query->result_array();
    }

    public function updateByobIngrds($aByobId, $aData)
    {
        $this->db->where($aByobId);
        $this->db->update('tbl_byob_opt', $aData);
        return true;
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

    public function getByobSpecIngrd($aByobId)
    {
        $query = $this->db->get_where('tbl_byob_assemble', $aByobId);
        return $query->result_array();
    }

    public function getIngrdDetails($aByobIngrdId)
    {
        $query = $this->db->get_where('tbl_byob_opt', $aByobIngrdId);
        return $query->row_array();
    }

    public function deleteByob($aByobId)
    {
        $bResult = $this->db->delete('tbl_byob', $aByobId);
        if ($bResult === true) {
            return $this->deleteByobAssembIngrds($aByobId);
        }
        return false;
    }

    public function deleteByobAssembIngrds($aByobId)
    {
        return $this->db->delete('tbl_byob_assemble', $aByobId);
    }

    public function deleteByobIngredients($aByobId)
    {
        return $this->db->delete('tbl_byo_opt', $aByobId);
    }

    public function addByobIngrds($aData)
    {
        $this->db->insert('tbl_byob_opt', $aData);
        return $this->db->insert_id();
    }

    public function deleteByobIngrd($aByobId)
    {
        return $this->db->delete('tbl_byob_opt', $aByobId);
    }

}

/* End of file modelByob.php */
/* Location: ./application/models/modelByob.php */