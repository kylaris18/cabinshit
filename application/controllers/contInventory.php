<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContInventory extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelInventory');
    }

    public function index()
    {
        $data = array(
            'invent_res' => $this->modelInventory->getInventory()
        );
        $this->load->view('Inventory/Inventory_View.php',$data);
    }

}

/* End of file contInventory.php */
/* Location: ./application/controllers/contInventory.php */