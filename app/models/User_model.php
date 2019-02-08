<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function verify_password($password, $hash)
    {
        return password_verify($password, $hash);
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
        $this->db->insert(
            "user",
            array(
                "first_name" => $post["first_name"],
                "middle_name" => $post["middle_name"],
                "last_name" => $post["last_name"],
                "username" => $post["username"],
                "email" => $post["email"],
                "password" =>$this->hash_password($post["password"])
            )
        );
        return $this->db->insert_id();
    }

    public function login($post)
    {
        $query =
            $this->db->get_where(
                'user',
                array(
                    'email' => $post["email"]
                )
            );
        foreach ($query->result() as $row) {
            if ($this->verify_password($post["password"], $row->password)) {
                $this->session->set_userdata(
                    array(
                        "id" => $row->id,
                        "username" => $row->username,
                        "email" => $row->email,
                        "first_name" => $row->first_name
                    )
                );
            } else {
                return false;
            }
        }
        return false;
    }

}