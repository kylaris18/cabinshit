<?php
class contLogin extends CI_Controller {
    
    // Libraries and initializers
    public function __construct(){
        parent::__construct();
        $this->load->model('modelLogin');
    }
    
    // URL Displays
    
    public function index(){
        if ($this->session->has_userdata('user_type') === false) {
            $this->load->view('login/login_view.php');
        } else {
            redirect('/dashboard','refresh');
        }
    }

    public function login()
    {
        // $this->form_validation->set_rules ('Username', 'User', 'trim|required|xss_clean');
        // $this->form_validation->set_rules ('Password', 'Pass', 'trim|required|xss_clean');

        // if ($this->form_validation->run() === false) {
        //     header("location: login_body");
        // } else {
        // echo json_encode(array('result' => true));
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
                $array = array(
                    'user_name' => $mResult['user_name'],
                    'user_type' => $mResult['user_type']
                );
                
                $this->session->set_userdata( $array );
                echo json_encode(array('bSuccess' => true));
                // echo json_encode($mResult);
            }
        // }

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