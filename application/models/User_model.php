<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function saveregisteruser($data) {
        return $this->db->insert('publisherdata', $data);
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('publisherdata');
        return $query->row_array();
    }

    public function send_bankdetails($data){
     return $this->db->insert('userbankdetails', $data);
    }

    public function is_user_id_exists($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('userbankdetails'); 
        return $query->row_array();
        // print_r($query->row_array());
        // die;

        // if ($query->num_rows() > 0) {
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }
    }
    

    
    
}
?>
