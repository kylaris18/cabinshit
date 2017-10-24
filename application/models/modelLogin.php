<?php
class modelLogin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function logIn($data){
		$query = $this->db->get_where('tbl_users', array('user_name' => $data["sUsername"], 'user_psw' => $data["sPassword"]), 1);
		if($query->num_rows()==1){
			return $query->row_array();
		}
		else{
			return false;
		}
	}
}