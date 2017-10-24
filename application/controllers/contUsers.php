<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContUsers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelUsers');
    }

    public function index()
    {
        $data = array(
            'users_res'=> $this->modelUsers->getUsers()
        );
        $this->load->view('Users/Users_View.php',$data);
    }

}

/* End of file contUsers.php */
/* Location: ./application/controllers/contUsers.php */