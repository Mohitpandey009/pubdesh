<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_conroller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
    }


    public function authenticate() {
        // Set validation rules
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login view with errors
            $this->load->view('superadminlogin');
        } else {
            $username = $this->input->post('email');
            $password = $this->input->post('password');
            
            if ($username === 'admin123@world.com' && $password === '1554admin') {
                // echo"congratulation...";
                // Set session data for the user
                // $session_data = array(
                //     'username' => 'admin',
                //     'logged_in' => TRUE
                // );
                // $this->session->set_userdata($session_data);

                // Redirect to a different page or load a success view
                redirect('Pubroute_controller/admindashboard'); 
            } else {
                // Set an error message and reload the login view
                $data['error'] = 'Invalid username or password';
                $this->load->view('superadminlogin', $data);
            }
        }
    }

    public function logout() {
        // Unset session data
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');

        // Destroy the session
        $this->session->sess_destroy();

        // Redirect to the login page
        // redirect('login');
    }  

    public function approve_publisher($publisher_id) {
        
        $this->load->model('Admin_model');
        $this->form_validation->set_rules('userid', 'User_id', 'trim|required');
        $this->form_validation->set_rules('share', 'Revenue share', 'trim|required');
        if ($this->form_validation->run()) {
            $user_id = $this->input->post('userid');
            $share = $this->input->post('share');
            $this->Admin_model->approve_publisher($publisher_id, $user_id,$share);
        }else{
            $this->load->view('pendingrequest');
            // echo"the form validation false...";
        }
      
    }


    public function delete_publisher($publisher_id) {
        $this->load->model('Admin_model');
        if ($publisher_id) {
            $this->Admin_model->delete_publisher($publisher_id);
            echo "Publisher deleted successfully.".$publisher_id;
        } else {
            echo "Failed to delete publisher.";
        }
        // echo "Publisher deleted successfully.";
    }
}
