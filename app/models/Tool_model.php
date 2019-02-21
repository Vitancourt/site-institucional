<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tool_model extends CI_Model {

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
                price,
                image")
                ->from("level")
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
                price,
                image"
            );
            $query = $this->db->get('level');
            return $query->result();
        }
        return false;
    }

    public function post($post, $file)
    {   
        $file_name = "";
        if (!empty($file["file_name"])) {
            $file_name = $file["file_namea"];
        }
        $this->db->insert(
            "level",
            array(
                "name" => $post["name"],
                "description" => $post["description"],
                "price" => $post["price"],
                "image" => $file_name,
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
            $data["price"] = $post["price"];
            if (!empty($file["file_name"])) {
                $data["image"] = $file["file_name"];
            }
            $this->db->update(
                'level',
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
            "level",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}
