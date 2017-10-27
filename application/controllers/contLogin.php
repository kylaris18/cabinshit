<?php
class contLogin extends CI_Controller {
    
    // Libraries and initializers
    public function __construct(){
        parent::__construct();
        $this->load->model('modelLogin');
    }
    
    // URL Displays
    
    public function index(){
        if ($this->session->has_userdata('bSuccess') === false) {
            $this->load->view('login/login_view.php');
        } else {
            redirect('/dashboard','refresh');
        }
    }

    public function login()
    {
        $aData= array(
            'sUsername' => $this->input->post('sUsername'),
            'sPassword' => $this->input->post('sPassword')
        ); 
        $mResult = $this->modelLogin->logIn($aData);
        if($mResult === false){
            echo json_encode(array('bSuccess' => false));
        } else {
            $aDetails = array('bSuccess' => true);
            // $aDetails['customer_id'] = $mResult['customer_id'];
            // $aDetails['customer_fname'] = $mResult['customer_fname'];
            // if (isset($mResult['customer_id']) === true) {
            //     $aDetails['customer_id'] = $mResult['customer_id'];
            //     $aDetails['customer_fname'] = $mResult['customer_fname'];
            //     $aDetails['customer_lname'] = $mResult['customer_lname'];
            //     $aDetails['customer_nickname'] = $mResult['customer_nickname'];
            //     $aDetails['customer_address'] = $mResult['customer_address'];
            //     $aDetails['customer_email'] = $mResult['customer_email'];
            //     $aDetails['customer_contact'] = $mResult['customer_contact'];
            // }
            $this->session->set_userdata( $aDetails );
            echo json_encode($aDetails);
        }
    }

    public function loginMobile()
    {
        $aData= array(
            'sUsername' => $this->input->post('sUsername'),
            'sPassword' => $this->input->post('sPassword')
        ); 
        $mResult = $this->modelLogin->logIn($aData); 
        // var_dump($mResult->user_name);
        // die();
        if($mResult === false){
            echo json_encode(array('bSuccess' => false));
        } else {
            $aDetails = array('bSuccess' => true);
            if (isset($mResult['customer_id']) === true) {
                $aDetails['customer_id'] = $mResult['customer_id'];
                $aDetails['customer_fname'] = $mResult['customer_fname'];
                $aDetails['customer_lname'] = $mResult['customer_lname'];
                $aDetails['customer_nickname'] = $mResult['customer_nickname'];
                $aDetails['customer_address'] = $mResult['customer_address'];
                $aDetails['customer_email'] = $mResult['customer_email'];
                $aDetails['customer_contact'] = $mResult['customer_contact'];
            }
            echo json_encode($aDetails);
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/','refresh');
    }


    // public function dashboard(){
    //     $this->load->view('Dashboard/HomeView.php');
    // }


    // public function inventory(){
    //     $this->load->database();
    //     $this->load->model('crud_model');
    //     $data = array ('invent_res'=> $this->crud_model->inventory_get());
    //     $this->load->view('Inventory/Inventory_View.php',$data);
    // }

    // public function sales(){
    //     $this->load->view('Sales/Sales_View.php');
    // }


    // public function users(){
    //     $this->load->database();
    //     $this->load->model('crud_model');
    //     $data = array ('users_res'=> $this->crud_model->users_get());

    //     $this->load->view('Users/Users_View.php',$data);
    // }
    
    // public function promo(){
    //     $this->load->view('Promo/Promo_View.php');
    // }

    // public function cash_order(){
    //     $this->load->database();
    //     $this->load->model('crud_model');
    //     $data= array ('order_res'=> $this->crud_model->order_get());
    //     $this->load->view('Cashier/order_view.php',$data);
    // }

}

?>