<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContMenu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelMenu');
    }

    public function getMenuList()
    {
        $aMenu = $this->modelMenu->getMenuList();
        echo json_encode($aMenu);
    }

}

/* End of file contMenu.php */
/* Location: ./application/controllers/contMenu.php */