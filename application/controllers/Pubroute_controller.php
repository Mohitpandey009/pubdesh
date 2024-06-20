<?php
class Pubroute_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    // Load the login view
    public function index() {
        $this->load->view('userlogin'); 
    }

    // Load the login view
    public function userRegister() {
        $this->load->view('createaccount');
    }

    // redirect user to dashbord 
    public function userdashboard(){
        $this->load->view('userdashboard');
    }

    // admin login
    public function adminlogin(){
        $this->load->view('superadminlogin');
    }

    // admin dashboard
    public function admindashboard(){
        $this->load->view('superadmindashboard');
    }

    // admin pending request
    public function pendingrequest(){
        $this->load->model('Admin_model');
        $data['pendingapprove']=$this->Admin_model->getpublisherdata();
        $this->load->view('panding_requests',$data);
    }


    public function publisherdata(){
        $this->load->model('Admin_model');
        $data['publisherdata']=$this->Admin_model->getpublisherdata();
        $this->load->view('allpublisherdata',$data);
    }


    public function bankdetails() {
        $user_id = $this->session->userdata('user_id');
        $data['userbank'] = $this->User_model->is_user_id_exists($user_id);
    
        // Check if userbank data exists and is not empty
        if (!empty($data['userbank'])) {
            
            $this->load->view('showbankdetails', $data);

        } else {
           
             $this->load->view('bankdetails');
        }
    }
    

     public function asigndomain(){
        $this->load->view('asigndomain');
    }

    public function property(){
        $this->load->view('createproperty');
    }

    public function domains(){
        $this->load->view('domains');
    }

 }
?>
