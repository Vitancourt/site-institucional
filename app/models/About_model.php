<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
        $db_obj= $this->load->database(TRUE);
        $this->check_first();
    }

    public function get()
    {
        $query = $this->db->select(
            "text,
            image,
            caption"
            )
            ->from("about")
            ->get();
        return $query->result();
    }

    public function check_first()
    {
        $query = $this->db->select(
            "text,
            image,
            caption"
            )
            ->from("about")
            ->get();
        if ($query->num_rows() == 0) {
            return $this->post();
        }
        return false;
    }

    public function post()
    {
        return
        $this->db->insert(
            "about",
            array(
                "text" => "",
                "caption" => NULL,
                "image" => NULL
            )
        );
    }

    public function put($post, $file)
    {   
        $data["text"] = $post["text"];
        $data["caption"] = $post["caption"];
        if (!empty($file["file_name"])) {
            $data["image"] = $file["file_name"];
        }
        if (
            $this->db->update(
                'about',
                $data  
            )
        ) {
            return true;
        }
        return false;
    }

}