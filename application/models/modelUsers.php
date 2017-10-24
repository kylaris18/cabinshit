<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUsers extends CI_Model {

    public function getUsers(){
        $query = $this->db->get('tbl_users');
        return $query->result_array();
    }

}

/* End of file modelUsers.php */
/* Location: ./application/models/modelUsers.php */