<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContByob extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelByob');
    }

    public function index()
    {
        $aData = array(
            'byob_res'=> $this->modelByob->getByobList(),
            'byobOpts_res' => $this->modelByob->getByobIngrd()
        );
        $this->load->view('Byob/manage', $aData);
    }

    public function updateByobIngrds()
    {
        $aByobId = array(
            'byobOpt_id' => $this->input->post('iByobId')
        );
        $aData = array(
            'byobOpt_name' => $this->input->post('sByobIngrdName'),
            'byobOpt_type' => $this->input->post('iByobIngrdType'),
            'byobOpt_price' => $this->input->post('dByobIngrdPrice')
        );
        echo json_encode($this->modelByob->updateByobIngrds($aByobId, $aData));
    }

    public function getByobDetails()
    {
        $aByobId = array(
            'byob_id' => $this->input->post('iByobId')
        );
        echo json_encode($this->modelByob->getByob($aByobId));
    }

    public function getByobList()
    {
        echo json_encode($this->modelByob->getByobList());
    }

    public function getByobIngrd()
    {
        echo json_encode($this->modelByob->getByobIngrd());
    }

    public function getByobSpecIngrd()
    {
        $aByobId = array(
            'byob_id' => $this->input->post('iByobId')
        );
        $aIngrdsId = $this->modelByob->getByobSpecIngrd($aByobId);
        $aIngrds = array();
        $iIngrdsCount = count($aIngrdsId);
        for ($iCounter = 0; $iCounter < $iIngrdsCount; $iCounter++) {
            $aByobIngrdId = array('byobOpt_id' => $aIngrdsId[$iCounter]['byobOpt_id']);
            array_push($aIngrds, $this->modelByob->getIngrdDetails($aByobIngrdId));
        }
        echo json_encode($aIngrds);
    }

    public function deleteByob()
    {
        $aByobId = array(
            'byob_id' => $this->input->post('iByobId')
        );
        $bResult = $this->modelByob->deleteByob($aByobId);
        echo json_encode($bResult);
    }

    public function addByobIngrds()
    {
        $aData = array(
            'byobOpt_name' => $this->input->post('sByobIngrdName'),
            'byobOpt_type' => $this->input->post('iByobIngrdType'),
            'byobOpt_price' => $this->input->post('dByobIngrdPrice')
        );
        echo json_encode($this->modelByob->addByobIngrds($aData));
    }

    public function deleteByobIngrd()
    {
        $aByobId = array(
            'byobOpt_id' => $this->input->post('iByobId')
        );
        $bResult = $this->modelByob->deleteByobIngrd($aByobId);
        echo json_encode($bResult);
    }

}

/* End of file contByob.php */
/* Location: ./application/controllers/contByob.php */