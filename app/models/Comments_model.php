<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

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
                comments,
                name,
                photo"
                )
                ->from("comments")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("id", "asc");
            $this->db->select("
                id,
                comments,
                name,
                photo"
            );
            $query = $this->db->get('comments');
            return $query->result();
        }
        return false;
    }

    public function post($post, $file)
    {
        $data["comments"] = $post["comments"];
        $data["name"] = $post["name"];
        if (!empty($file["file_name"])) {
            $data["photo"] = $file["file_name"];
        }
        $this->db->insert(
            "comments",
            $data
        );
        return $this->db->insert_id();
    }

    public function put($post, $file)
    {   
        if ($this->get($post["id"])) {
            $data["comments"] = $post["comments"];
            $data["name"] = $post["name"];
            if (!empty($file["file_name"])) {
                $data["photo"] = $file["file_name"];
            }
            $this->db->where("id", $post["id"]);
            if (
                $this->db->update(
                    'comments',
                    $data  
                )
            ) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function delete(int $id)
    {
        $this->db->delete(
            "comments",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}