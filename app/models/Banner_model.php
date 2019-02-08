<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    public function get($id=null)
    {
        if ($id) {
            $query = $this->db->select(
                "id,
                text,
                image,
                order"
                )
                ->from("banner_homepage")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("order", "asc");
            $this->db->select("
                id,
                text,
                image,
                order"
            );
            $query = $this->db->get('banner_homepage');
            return $query->result();
        }
        return false;
    }

    public function post($post, $file)
    {
        $this->db->insert(
            "banner_homepage",
            array(
                "text" => $post["text"],
                "image" => $file["file_name"],
                "order" => $post["order"]
            )
        );
        return $this->db->insert_id();
    }

    public function put($post)
    {   
        if ($this->check($post["id"])) {            
            $this->db->where("id", $post["id"]);
            $this->db->update(
                'banner_homepage',
                array(
                    "text" => $post["text"],
                    "image" => $post["image"],
                    "order" => $post["order"]
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
            "banner_homepage",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}