<?php
class User_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->library('upload');
        $this->load->library('encryption');
        $this->load->helper('cookie');
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('name', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('number', 'Number', 'trim|required|numeric|min_length[10]|max_length[10]');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login view with errors
            $this->load->view('createaccount');
        } else {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            if ($password === $cpassword) {

                $enc_password = $this->encryption->encrypt($password);


                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $enc_password,
                    'number' => $this->input->post('number'),
                ];

                $this->User_model->saveregisteruser($data);
                $this->load->view('userlogin');

            } else {
                $data['error'] = "password and confirmpassword not matched..";
                $this->load->view('createaccount', $data);
                // echo"else part of the if..";
            }

        }
    }

    public function login()
    {
        // Load necessary models and libraries
        $this->load->model('User_model');
        $this->load->helper('cookie');

        // Set form validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login view with errors
            $this->load->view('userlogin');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Check if the user exists and is approved
            $user = $this->User_model->get_user_by_email($email);

            if ($user) {
                // Decrypt the stored password
                $dec_pass = $this->encryption->decrypt($user['password']);

                // Validate the password and check if the user is approved
                if ($password == $dec_pass && $user['approved'] == 1) {
                    // Set session data
                    $session_data = array(
                        's_no' => $user['s_no'],
                        'user_id' => $user['user_id'],
                        'username' => $user['name'],
                    );
                    $this->session->set_userdata($session_data);

                    // Set the cookie for user_id without an expiration date (session cookie)


                    // Redirect to the dashboard or some other page
                    redirect('Pubroute_controller/userdashboard');
                } else {
                    // Set an error message and reload the login view
                    $data['error'] = 'Invalid email, password, or your account is not approved yet.';
                    $this->load->view('userlogin', $data);
                }
            } else {
                // Set an error message if the user is not found
                $data['error'] = 'Invalid email, password, or your account is not approved yet.';
                $this->load->view('userlogin', $data);
            }
        }
    }

    public function logout()
    {
        // Unset session data
        $this->session->unset_userdata(array('user_id', 'username', 's_no'));

        // Destroy the session
        $this->session->sess_destroy();

        // Redirect to the login page
        redirect('/');
    }

    public function userbank_details()
    {
        $user_id = $this->session->userdata('user_id');

        // The image upload configuration
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // Optional: set max file size in KB (2MB here)
        $config['max_width'] = 1024; // Optional: set max image width in pixels
        $config['max_height'] = 768; // Optional: set max image height in pixels

        // Initialize the upload configuration
        $this->upload->initialize($config);

        // Accessing session data
        $this->form_validation->set_rules('orgType', 'orgType', 'trim|required');
        $this->form_validation->set_rules('country', 'country', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('zipCode', 'zipCode', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('bankName', 'bankName', 'trim|required');
        $this->form_validation->set_rules('accountNumber', 'accountNumber', 'trim|required');
        $this->form_validation->set_rules('confirmAccountNumber', 'confirmAccountNumber', 'trim|required');
        $this->form_validation->set_rules('accountType', 'accountType', 'trim|required');
        $this->form_validation->set_rules('ifsc', 'IFSC', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('panCardNumber', 'panCardNumber', 'trim|required');
        $this->form_validation->set_rules('gstRegistered', 'gstRegistered', 'trim|required');

        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('panCardFile')) {
            // If validation fails, reload the login view with errors
            $upload_error['error'] = $this->upload->display_errors();
            $this->load->view('bankdetails', $upload_error);
        } else {
            $acc_no = $this->input->post('accountNumber');
            $confirm_acc_no = $this->input->post('confirmAccountNumber');
            if ($acc_no === $confirm_acc_no) {

                $upload_data = $this->upload->data();
                $img = "uploads/" . $upload_data['raw_name'] . $upload_data['file_ext'];

                $data = [
                    'user_id' => $user_id,
                    'organization' => $this->input->post('orgType'),
                    'country' => $this->input->post('country'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'zip_code' => $this->input->post('zipCode'),
                    'name' => $this->input->post('name'),
                    'bank_name' => $this->input->post('bankName'),
                    'IFSC_Code'=>$this->input->post('ifsc'),
                    'ac_number' => $this->input->post('accountNumber'),
                    'account_type' => $this->input->post('accountType'),
                    'pan_number' => $this->input->post('panCardNumber'),
                    'pan_img' => $img,
                ];

                $gst_number = $this->input->post('gstRegistered');

                if ($gst_number !== 'no') {
                    $data['gst_number'] = $this->input->post('gstNumber');
                }

                $this->User_model->send_bankdetails($data);

                redirect('Pubroute_controller/bankdetails');
            } else {
                $data['error'] = "accountNumber and confirmAccountNumber not matched..";
                $this->load->view('bankdetails', $data);
            }
        }
    }

    public function reset_password()
    {
        // Ensure the user is logged in
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'You must be logged in to change your password.');
            redirect('Pubroute_controller/profile'); // Redirect to the login page if the user is not logged in
            return ;
        }
    
        // Load the user data
        $data = $this->User_model->find_user_by_id($user_id);
        if (!$data) {
            $this->session->set_flashdata('error', 'User not found.');
            redirect('Pubroute_controller/profile');
            return;
        }
    
        // Set form validation rules
        $this->form_validation->set_rules('newPassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('oldPassword', 'Old Password', 'trim|required');
    
        if ($this->form_validation->run()) {
            $newPassword = $this->input->post('newPassword');
            $oldPassword = $this->input->post('oldPassword');
    
            // Decrypt the stored password
            $dec_pass = $this->encryption->decrypt($data['password']);
    
            // Check if the provided old password matches the stored password
            if ($oldPassword !== $dec_pass) {
              
                $this->session->set_flashdata('error', 'Old password does not match.');
                redirect('Pubroute_controller/profile');
                return;
            }
    
            // Encrypt the new password
            $enc_password = $this->encryption->encrypt($newPassword);
    
            // Update the password in the database
            if ($this->User_model->reset_userpassword($user_id, $enc_password)) {
           
                $this->session->set_flashdata('success', 'Password updated successfully.');
                redirect('Pubroute_controller/profile');
                return;
            } else {
          
                $this->session->set_flashdata('error', 'Failed to update password.');
                redirect('Pubroute_controller/profile');
                return;
            }
            
            // redirect('Pubroute_controller/profile');
            
        } else {
            // Form validation failed
            $this->session->set_flashdata('error', 'Form validation failed. Please fill all required fields.');
            redirect('Pubroute_controller/profile');
        }
    }
  

}
?>