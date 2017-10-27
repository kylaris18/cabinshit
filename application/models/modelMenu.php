<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMenu extends CI_Model {

    public function getMenuList()
    {
        $query = $this->db->get('tbl_menu');
        return $query->result_array();
    }

}

/* End of file modelMenu.php */
/* Location: ./application/models/modelMenu.php */