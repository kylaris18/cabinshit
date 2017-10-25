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

    public function changeOrderStatus()
    {
        $iOrderId = $this->input->post('order_id');
        $sNewStatus = '';
        $sOldStatus = $this->modelOrders->getOrderStatus($iOrderId);
        switch ($sOldStatus) {
            case 'To Print':
                $sNewStatus = 'Preparing';
                break;
            case 'Preparing':
                $sNewStatus = 'Ready';
                break;
            case 'Ready':
                $sNewStatus = 'Served';
                break;
            case 'Served':
                $sNewStatus = 'Paid';
                break;
            
            default:
                $sNewStatus = 'To Print';
                break;
        }
        $aData = array(
            'order_status' => $sNewStatus
        );
        $aResult = $this->modelOrders->changeOrderStatus($iOrderId, $aData);

        echo json_encode($aResult);
    }

}

/* End of file contOrders.php */
/* Location: ./application/controllers/contOrders.php */