


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    public function get()
    {
        $query = $this->db->select(
            "title,
            robots,
            description,
            author"
            )
            ->from("config")
            ->limit(1)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $this->post();
    }

    public function post()
    {
        $this->db->insert(
            "config",
            array(
                "title" => "",
                "robots" => "",
                "description" => "",
                "author" => ""
            )
        );
        return $this->db->insert_id();
    }

    public function put($post)
    {   
        $this->db->update(
            'config',
            array(
                "title" => $post["title"],
                "robots" => $post["robots"],
                "description" => $post["description"],
                "author" => $post["author"]
            )
        );
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}