<?php

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function register_user($data){
        if(!$this->db->insert('user',$data)) {
            echo 'Data not entered';
        }
        return true; 
    }

    public function form_insert_mail($data)
    {
      $this->db->insert('emailData',$data);
    }

    public function fetch_email($data)
    {
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($data);
        $query = $this->db->get();
        return $result = $query->result();
        //$this->load->view('edit_content/edit_content', $result);
    }

    public function delete_data_id($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('emailData');
    }
}