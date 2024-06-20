<?php
class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function getpublisherdata()
    {
        $this->db->where('approved', 0);
        $query = $this->db->get('publisherdata');
        return $query->result();
    }


    public function approve_publisher($publisher_id, $user_id, $share)
    {
        // Set both fields to be updated
        $this->db->set('approved', 1);
        $this->db->set('user_id', $user_id);
        $this->db->set('revenue', $share);
        $this->db->where('s_no', $publisher_id);

        // Perform the update
        if ($this->db->update('publisherdata')) {
            return true;
        } else {
            // Log the error if the update fails
            log_message('error', 'Error updating publisherdata: ' . $this->db->last_query());
            return false;
        }
    }


    public function delete_publisher($publisher_id)
    {
        $this->db->where('s_no', $publisher_id);
        return $this->db->delete('publisherdata');
    }

}
?>