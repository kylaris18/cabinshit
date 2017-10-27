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
            'byob_res'=> $this->modelByob->getByobList()
        );
        $this->load->view('Byob/manage', $aData);
    }

    public function updateByob()
    {
        $aByobId = array(
            'byob_id' => $this->input->post('iByobId')
        );
        $aData = array(
            'byob_name' => $this->input->post('sByobName'),
            'byob_creator' => $this->input->post('sByobCreator')
        );
        echo json_encode($this->modelByob->updateByob($aByobId, $aData));
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

}

/* End of file contByob.php */
/* Location: ./application/controllers/contByob.php */