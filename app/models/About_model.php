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
            caption,
            mission,
            vision,
            value"
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
            caption,
            mission,
            vision,
            value"
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
                "image" => NULL,
                "mission" => NULL,
                "vision" => NULL,
                "value" => NULL,
                "inserted_at" => date("Y-m-d H:i:s")
            )
        );
    }

    public function put($post, $file)
    {   
        $data["text"] = $post["text"];
        $data["caption"] = $post["caption"];
        $data["mission"] = $post["mission"];
        $data["vision"] = $post["value"];
        $data["value"] = $post["value"];
        $data["updated_at"] = date("Y-m-d H:i:s");
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