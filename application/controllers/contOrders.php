<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContOrders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelOrders');
    }

    public function index()
    {
        $data = array(
            'order_res'=> $this->modelOrders->getOrders()
        );
        $this->load->view('Order/order_view.php',$data);
    }

}

/* End of file contOrders.php */
/* Location: ./application/controllers/contOrders.php */