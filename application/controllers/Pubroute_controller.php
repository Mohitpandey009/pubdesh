<?php
class Pubroute_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Admin_model');
        // $this->load->library('encryption');
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
        $data['pendingcount']=$this->Admin_model->getpublisherdatacount();
        $username = $this->session->userdata('username');
       if($username == 'admin'){
        $this->load->view('superadmindashboard',$data);
       }else{
        $this->load->view('superadminlogin'); 
       }
    }

    // admin pending request
    public function pendingrequest(){
        $username = $this->session->userdata('username');
        $this->load->model('Admin_model');
        $data['pendingapprove']=$this->Admin_model->getpublisherdata();
        $data['pendingcount']=$this->Admin_model->getpublisherdatacount();

        if($username == 'admin'){
            $this->load->view('panding_requests',$data);
           }else{
            $this->load->view('superadminlogin'); 
           }
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
        $username = $this->session->userdata('username');
        $this->load->model('Admin_model');
        $data['domain']=$this->Admin_model->getdomaindata();
        $data['publiser']=$this->Admin_model->get_approved_publisher();
        $data['pendingcount']=$this->Admin_model->getpublisherdatacount();
        $data['prop_id']=$this->Admin_model->getall_property();

        if($username == 'admin'){
            $this->load->view('asigndomain',$data);
           }else{
            $this->load->view('superadminlogin'); 
           }
    }

    public function property(){
        $username = $this->session->userdata('username');
        $data['allproperty'] = $this->Admin_model->getall_property();
        $data['pendingcount']=$this->Admin_model->getpublisherdatacount();
       
        if($username == 'admin'){
            $this->load->view('createproperty',$data);
           }else{
            $this->load->view('superadminlogin'); 
           }
    }

    public function domains(){
        $user_id = $this->session->userdata('user_id');
        // $data['domain']= $this->User_model->pub_domain_data($user_id);
        $data['domain']= $this->User_model->get_data_by_pub_id($user_id);
        // $this->load->view('common/userslider/sideslider',$data);
        $this->load->view('domains',$data);
    }
    
    public function profile(){
        $user_id = $this->session->userdata('user_id');
        $data['user_data'] = $this->User_model->find_user_by_id($user_id);
        $this->load->view('profilepage',$data);
    }

    public function adminpayments(){
        $username = $this->session->userdata('username');
        $data['approve']=$this->Admin_model->get_approved_publisher();
        $data['pendingcount']=$this->Admin_model->getpublisherdatacount();
        
        if($username == 'admin'){
            $this->load->view('adminpayments',$data);
           }else{
            $this->load->view('superadminlogin'); 
           }
    }

    public function userpayments(){
        $pub_id = $this->session->userdata('user_id');
        $data['publisher_earn']=$this->User_model->get_publisher_earnings_and_revenue($pub_id);

        $this->load->view('userpayments',$data);
    }

 }
?>
