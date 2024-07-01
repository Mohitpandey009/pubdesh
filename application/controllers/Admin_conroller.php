<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_conroller extends CI_Controller
{

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



    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
    }


    public function authenticate()
    {
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
                $session_data = array(
                    'username' => 'admin',
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                // Redirect to a different page or load a success view
                redirect('authenticate/admindashboard');
            } else {
                // Set an error message and reload the login view
                $data['error'] = 'Invalid username or password';
                $this->load->view('superadminlogin', $data);
            }
        }
    }

    public function logout()
    {
        // Unset session data
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');

        // Destroy the session
        $this->session->sess_destroy();

        // Redirect to the login page
        redirect('authenticate/adminlogin');
    }

    public function approve_publisher($publisher_id)
    {
        $this->form_validation->set_rules('userid', 'User_id', 'trim|required');
        $this->form_validation->set_rules('share', 'Revenue share', 'trim|required');

        if ($this->form_validation->run()) {
            $user_id = $this->input->post('userid');
            $share = $this->input->post('share');
            $this->Admin_model->approve_publisher($publisher_id, $user_id, $share);
        } else {
            $this->load->view('pendingrequest');
            // redirect('authenticate/pendingrequest');
            
        }

    }

    public function delete_publisher($publisher_id)
    {
        $this->load->model('Admin_model');
        if ($publisher_id) {
            $this->Admin_model->delete_publisher($publisher_id);
            echo "Publisher deleted successfully." . $publisher_id;
        } else {
            echo "Failed to delete publisher.";
        }
        // echo "Publisher deleted successfully.";
    }

    public function createproperty()
    {
        $this->form_validation->set_rules('property', 'property', 'trim|required');

        if ($this->form_validation->run()) {

            $unique_id = 'PROP_' . date('YmdHis');

            $data = [
                'PROP_id' => $unique_id,
                'property' => $this->input->post('property'),
            ];
            $res = $this->Admin_model->add_property($data);
            if ($res) {
                redirect('Pubroute_controller/property');
            }

        } else {
            // redirect('Pubroute_controller/property');
            $this->load->view('property');
            // echo"bs yaarr";
            // die;
        }

    }

    public function savedomaindata()
    {
        $this->load->model('Admin_model');

        // Set form validation rules
        $this->form_validation->set_rules('publisherid', 'Publisher ID', 'required');
        $this->form_validation->set_rules('property', 'Property', 'required');
        $this->form_validation->set_rules('asigndomain', 'Asign Domain', 'required');

        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('asigndomain');
            $this->session->set_flashdata('error', 'Fill all Filed of Form.');
            redirect('Pubroute_controller/asigndomain');

        } else {
            // Validation passed, process the form data
            $publisher_id = $this->input->post('publisherid');
            $property_id = $this->input->post('property');
            $assigned_domain = $this->input->post('asigndomain');

            // Generate unique ID based on current timestamp
            $unique_id = 'DOM_' . date('YmdHis');


            $data = [
                'domain_id' => $unique_id,
                'pub_id' => $publisher_id,
                'prop_id' => $property_id,
                'domain' => $assigned_domain,
            ];

            $res = $this->Admin_model->savedomaindata($data);
            if ($res) {
                redirect('Pubroute_controller/asigndomain');
            } else {
                $this->session->set_flashdata('error', 'Your data not inserted.');
                redirect('Pubroute_controller/asigndomain');
            }

        }
    }

    public function publisher_all_domain($user_id)
    {
        header('Content-Type: application/json');
        $domains = $this->Admin_model->get_domains_by_user_id($user_id);
        echo json_encode($domains);
    }

    public function admin_payment_submit()
    {

        $this->form_validation->set_rules('publisherId', 'publisherId', 'required');
        $this->form_validation->set_rules('year', 'year', 'required');
        $this->form_validation->set_rules('month', 'month', 'required');
        $this->form_validation->set_rules('invalidDeduction', 'invalidDeduction ', 'required');

        $this->form_validation->set_rules('conversionRate', 'conversionRate', 'required');
        $this->form_validation->set_rules('paydomain[]', 'Amount of Domain', 'required');
        $this->form_validation->set_rules('domain_id[]', 'Domain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'All Filed are neccessary');
            redirect($_SERVER['HTTP_REFERER']);
            // $this->load->view('adminpayments');
        }

        $data['pub_id'] = $this->input->post('publisherId');
        $data['year'] = $this->input->post('year');
        $data['month'] = $this->input->post('month');
        $data['invalidDeduction'] = $this->input->post('invalidDeduction');
        $data['conversionRate'] = $this->input->post('conversionRate');


        $domain_ids = $this->input->post('domain_id');
        $pay_domains = $this->input->post('paydomain');

        // Initialize the combined array
        $combined_domains = [];

        // Combine domain_id and pay_domain arrays into one object array
        if (is_array($domain_ids) && is_array($pay_domains)) {
            for ($i = 0; $i < count($domain_ids); $i++) {
                $combined_domains[] = [
                    'domain_id' => $domain_ids[$i],
                    'pay_domain' => $pay_domains[$i]
                ];
            }
        }

        $encodeddata = json_encode($combined_domains);
        // Add the combined_domains array to the data array
        $data['publisher_earn'] = $encodeddata;

        // print_r($data);
        // die;

        $res = $this->Admin_model->earning_of_publisher($data);

        if ($res) {
            $this->session->set_flashdata('message', 'Data Submited');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('message', 'Data not Submited');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function deletedata($id, $table)
    {
        return $this->Admin_model->deletedata($id, $table);
    }

    public function update_property($prop_id)
    {
        // Example of updating data
        $data = array(
            'property' => $this->input->post('property')
        );

        // Call the model method to update data
        $this->load->model('Admin_model');
        $success = $this->Admin_model->updatedata($prop_id, $data);

        if ($success) {
            // Data updated successfully
            echo "Data updated successfully!";
        } else {
            // Failed to update data
            echo "Failed to update data!";
        }
    }

    public function update_domian($id)
    {
        // Example of updating data
        $data = array(
            'domain' => $this->input->post('domain')
        );
        // Call the model method to update data
        $this->load->model('Admin_model');
        $success = $this->Admin_model->edit_domian($id, $data);

        if ($success) {
            // Data updated successfully
            echo "Data updated successfully!";
        } else {
            // Failed to update data
            echo "Failed to update data!";
        }
    }

}
