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

    public function add_property($data)
    {
        return $this->db->insert('publisher_property', $data);
    }

    public function getall_property()
    {
        $query = $this->db->get('publisher_property');
        return $query->result_array();
    }

    public function get_approved_publisher()
    {
        $this->db->select('user_id');
        $this->db->where('approved', 1);
        $query = $this->db->get('publisherdata');
        return $query->result_array();
    }


    public function savedomaindata($data)
    {
        return $this->db->insert('publisher_domain', $data);
    }

    public function getdomaindata()
    {
        $sql = "SELECT pp.PROP_id, pp.property, pd.domain_id, pd.pub_id, pd.domain
                FROM publisher_property AS pp
                JOIN publisher_domain AS pd ON pp.PROP_id = pd.prop_id;";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // Method to fetch all domain names matching the user_id
    public function get_domains_by_user_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('publisher_domain');
        $this->db->where('pub_id', $user_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function earning_of_publisher($data)
    {
        return $this->db->insert('publisher_earning', $data);
    }


}
?>