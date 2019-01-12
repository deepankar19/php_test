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
    {  $where = array('userid'=> $data['userId'],'action'=> $data['action']);
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        return $result = $query->result();
        //$this->load->view('edit_content/edit_content', $result);
    }

    public function delete_data_id($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('emailData');
    }

    public function send_Mail($data)
    {
    	$where = array('userid'=>'5','action'=>'1');
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        //print_r($data);
        return $result = $query->result();
        }
}