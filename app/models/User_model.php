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

    public function get($id=null)
    {
        if ($id) {
            //$this->db->where('id', $id);
            $query = $this->db->select("id,first_name,middle_name,last_name,username,email")
                ->from("user")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("first_name", "asc");
            $this->db->select("id,concat_ws(' ',first_name,middle_name,last_name) as complete_name,username,email,password");
            $query = $this->db->get('user');
            return $query->result();
        }
        return false;
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


    public function check(int $id)
    {
        $query = $this->db->select("id,first_name,middle_name,last_name,username,email")
            ->from("user")
            ->where("id", $id)
            ->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
    
    public function put($post)
    {   
        if ($this->check($post["id"])) {            
            $this->db->where("id", $post["id"]);
            $this->db->update(
                'user',
                array(
                    "first_name" => $post["first_name"],
                    "middle_name" => $post["middle_name"],
                    "last_name" => $post["last_name"],
                    "username" => $post["username"],
                    "email" => $post["email"],
                    "password" =>$this->hash_password($post["password"])
                )
            );
            if ($this->db->affected_rows() == '1') {
                return true;
            }
            return false;
        }
        return false;
    }

    public function delete(int $id)
    {
        $this->db->delete(
            "user",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}