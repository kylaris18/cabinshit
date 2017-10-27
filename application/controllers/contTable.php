<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContTable extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelTable');
    }

    public function index()
    {
        $aData = array(
            'table_res' => $this->modelTable->getTables()
        );
        $this->load->view('table/table_view', $aData);
    }

    public function addNewTable()
    {
        $sNewTableName = $this->input->post('sNewTableName');
        $aData = array(
            'table_name' => $sNewTableName
        );
        $iNewTableId = $this->modelTable->addNewTable($aData);
        $aResult = array(
            'table_id' => $iNewTableId,
            'table_name' => $sNewTableName,
            'table_status' => 'Available'
        );
        echo json_encode($aResult);
    }

    public function getTableList()
    {
        echo json_encode($this->modelTable->getTables());
    }

    public function editTable()
    {
        $aTableId = array(
            'table_id' => $this->input->post('sTableId')
        );
        $aData = array(
            'table_name' => $this->input->post('sTableName')
        );
        echo json_encode($this->modelTable->updateTable($aTableId, $aData));
    }

}

/* End of file contTable.php */
/* Location: ./application/controllers/contTable.php */