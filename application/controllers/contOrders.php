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
        switch ($sOldStatus['order_status']) {
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
            case 'Paid':
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
        // var_dump($aResult);
        // die();
        echo json_encode($sOldStatus);
    }

    public function addOrder()
    {
        $aPost = array(
            'table_id' => 2,
            'order_created' => 1508775542,
            'order_bill' => 345,
            'customer_nickname' => 'Kenster Lavster 143',
            'promo_code' => 'MINUS15BEYZ',
            'tray' => array(
                array(
                    'menu_id' => 1,
                    'byob' => null,
                    'tray_price' => 140,
                    'tray_quantity' => 1
                ),
                array(
                    'menu_id' => null,
                    'byob' => array(
                        'byob_name' => 'TerminaTHOR',
                        'byob_creator' => 'Bhoszx Charizx Ador2x',
                        'byob_ingridients' => array(2, 5, 7, 8, 9, 21)
                    ),
                    'tray_price' => 205,
                    'tray_quantity' => 1
                )
            )
        );

        $bOrderResult = true;

        if (isset($aPost['promo_code']) === true) {
            $aData = array(
                'promo_code' => $aPost['promo_code']
            );
            $aDiscount = $this->modelOrders->getDiscount($aData);
            $aPost['order_bill'] = $aPost['order_bill'] - ($aDiscount['promo_deduction'] / 100 * $aPost['order_bill']);
        }

        $aNewOrder = array(
            'table_id' => $aPost['table_id'],
            'order_created' => $aPost['order_created'],
            'order_bill' => $aPost['order_bill'],
            'customer_nickname' => $aPost['customer_nickname'],
        );
        $iOrderId = $this->modelOrders->addOrder($aNewOrder);

        $iTrayCount = count($aPost['tray']);
        $aTrayContents = $aPost['tray'];
        for ($iCounter = 0; $iCounter < $iTrayCount; $iCounter++) {
            $aCurrentTray = $aTrayContents[$iCounter];
            if ($aCurrentTray['byob'] === null) {
                $aData = array(
                    'menu_id' => $aCurrentTray['menu_id'],
                    'tray_price' => $aCurrentTray['tray_price'],
                    'tray_quantity' => $aCurrentTray['tray_quantity'],
                    'order_id' => $iOrderId
                );
                $this->modelOrders->addTray($aData);
            } else {
                $aData = array(
                    'byob_name' => $aCurrentTray['byob']['byob_name'],
                    'byob_creator' => $aCurrentTray['byob']['byob_creator']
                );
                $iByobId = $this->modelOrders->addByob($aData);

                $aByobIngredients = $aCurrentTray['byob']['byob_ingridients'];
                $iByobIngCount = count($aByobIngredients);
                for ($iBCounter = 0; $iBCounter < $iByobIngCount; $iBCounter++) {
                    $aData = array(
                        'byob_id' => $iByobId,
                        'byobOpt_id' => $aByobIngredients[$iBCounter]
                    );
                    $this->modelOrders->addByobIng($aData);
                }

                $aData = array(
                    'byob_id' => $iByobId,
                    'tray_price' => $aCurrentTray['tray_price'],
                    'tray_quantity' => $aCurrentTray['tray_quantity'],
                    'order_id' => $iOrderId
                );
                $this->modelOrders->addTray($aData);
            }
        }

        echo json_encode('{result: '.$bOrderResult.'}');
    }

}

/* End of file contOrders.php */
/* Location: ./application/controllers/contOrders.php */