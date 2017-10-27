<?php
class modelLogin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function logIn($data){
		$query = $this->db->get_where('tbl_users', array('user_name' => $data["sUsername"], 'user_psw' => $data["sPassword"]), 1);
		if($query->num_rows()==1){
			return $this->getUserData($query->row_array());
		}
		else{
			return false;
		}
	}

	private function getUserData($data)
	{
		// return $data;
		switch ($data['user_type']) {
			case 'customer':
				$sTable = 'tbl_customer';
				$sIdField = 'customer_id';
				break;
			
			case 'admin':
				return $data;
				break;

			default:
				$sTable = 'tbl_customer';
				$sIdField = 'customer_id';
				break;
		}
		$query = $this->db->get_where($sTable, array($sIdField => $data["user_details"]), 1);
		return $query->row_array();

	}
}