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

    public function getpublisherdatacount()
    {
        $this->db->where('approved', 0);
        $this->db->from('publisherdata');
        $count = $this->db->count_all_results();
        return $count;
        
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

    public function deletedata($id, $table)
    {
        if ($table == '0') {
            // Delete the record from the specified table
            $this->db->where('PROP_id', $id);  
            // Assuming the primary key is named 'id'
            $result = $this->db->delete('publisher_property');
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete the record.']);
            }

        } elseif ($table == '1') {
            // Delete the record from the specified table
            $this->db->where('domain_id', $id);  
            // Assuming the primary key is named 'id'
            $result = $this->db->delete('publisher_domain');
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete the record.']);
            }

        } else {

            echo json_encode(['status' => 'error', 'message' => 'Failed to delete the record.']);

        }

    }

    public function updatedata($id, $data) {
        // Ensure $id is not empty and $data contains update fields
        if (!empty($id) && !empty($data)) {
            $this->db->where('PROP_id', $id); // Assuming 'PROP_id' is the primary key or unique identifier
            $this->db->update('publisher_property', $data);

            return true; // Return true on success
        } else {
            return false; // Return false if $id or $data is empty
        }
    }


    public function edit_domian($id, $data) {
        if (!empty($id) && !empty($data)) {
            $this->db->where('domain_id', $id); 
            // Assuming 'PROP_id' is the primary key or unique identifier
            $this->db->update('publisher_domain', $data);

            return true; // Return true on success
        } else {
            return false; // Return false if $id or $data is empty
        }

    }

}
?>