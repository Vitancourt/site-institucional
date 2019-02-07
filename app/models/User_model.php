<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    public function get()
    {
        $this->db->order_by("first_name", "asc");
        $this->db->select("id,concat_ws(' ',first_name,middle_name,last_name) as complete_name,username,email,password");
        $query = $this->db->get('user');
        return $query->result();
    }

    public function post($post)
    {
        $this->load->library("encryption");
        $this->encryption->initialize(
            array(
                "mcrypt"
            )
        );
        $this->db->insert(
            "user",
            array(
                "first_name" => $post["first_name"],
                "middle_name" => $post["middle_name"],
                "last_name" => $post["last_name"],
                "username" => $post["username"],
                "email" => $post["email"],
                "password" =>$this->encryption->encrypt($post["password"])
            )
        );
        return $this->db->insert_id();
    }
}