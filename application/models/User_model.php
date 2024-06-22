<?php
class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function saveregisteruser($data)
    {
        return $this->db->insert('publisherdata', $data);
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('publisherdata');
        return $query->row_array();
    }

    public function send_bankdetails($data)
    {
        return $this->db->insert('userbankdetails', $data);
    }

    public function is_user_id_exists($user_id)
    {
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

    // Method to find user by user_id
    public function find_user_by_id($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('publisherdata');
        return $query->row_array();
    }

    public function reset_userpassword($user_id, $password)
    {
        $data = array(
            'password' => $password
        );
        $this->db->where('user_id', $user_id);
        return $this->db->update('publisherdata', $data);

    }

    public function pub_domain_data($user_id)
    {
        // SQL query to fetch data
        $query = $this->db->get_where('publisher_domain', array('pub_id' => $user_id));

        // Check if query returned any rows
        if ($query->num_rows() > 0) {
            // Return the result as an array of objects
            return $query->result();
        } else {
            // Return false or handle the case where no data is found
            return false;
        }
    }


}
?>