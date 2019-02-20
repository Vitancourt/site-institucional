<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_model extends CI_Model {

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
                name,
                description,
                image,
                icon"
            )
                ->from("module")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("name", "asc");
            $this->db->select(
                "id,
                name,
                description,
                image,
                icon"
            );
            $query = $this->db->get('module');
            return $query->result();
        }
        return false;
    }

    public function post($post, $file)
    {   
        $file_name = "";
        if (!empty($file["file_name"])) {
            $file_name = $file["file_name"];
        }
        $this->db->insert(
            "module",
            array(
                "name" => $post["name"],
                "description" => $post["description"],
                "image" => $file_name,
                "icon" => $post["icon"]
            )
        );
        return $this->db->insert_id();
    }

    public function put($post, $file)
    {   
        if ($this->get($post["id"])) {
            $this->db->where("id", $post["id"]);
            $data["name"] = $post["name"];
            $data["description"] = $post["description"];
            $data["icon"] = $post["icon"];
            if (!empty($file["file_name"])) {
                $data["image"] = $file["file_name"];
            }
            $this->db->update(
                'module',
                $data
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
            "module",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}