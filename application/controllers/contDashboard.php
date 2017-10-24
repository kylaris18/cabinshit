<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContDashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('Dashboard/HomeView');
	}

}

/* End of file contDashboard.php */
/* Location: ./application/controllers/contDashboard.php */