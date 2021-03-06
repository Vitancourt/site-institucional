<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    public function get($id=null)
    {
        if ($id) {
            $query = $this->db->select("id, name, workas, ordem, facebook, twitter, linkedin, skype, image")
                ->from("team")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("ordem", "asc");
            
            $this->db->select("id, name, workas, ordem, facebook, twitter, linkedin, skype, image");
            $query = $this->db->get('team');
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
            "team",
            array(
                "name" => $post["name"],
                "workas" => $post["workas"],
                "ordem" => $post["order"],
                "facebook" => $post["facebook"],
                "twitter" => $post["twitter"],
                "linkedin" => $post["linkedin"],
                "skype" => $post["skype"],
                "image" => $file_name,
                "inserted_at" => date("Y-m-d H:i:s")
            )
        );
        return $this->db->insert_id();
    }

    public function put($post, $file)
    {   
        if ($this->get($post["id"])) {
            $this->db->where("id", $post["id"]);
            $data["name"] = $post["name"];
            $data["workas"] = $post["workas"];
            $data["ordem"] = $post["order"];
            $data["facebook"] = $post["facebook"];
            $data["twitter"] = $post["twitter"];
            $data["linkedin"] = $post["linkedin"];
            $data["skype"] = $post["skype"];
            $data["updated_at"] = date("Y-m-d H:i:s");
            if (!empty($file["file_name"])) {
                $data["image"] = $file["file_name"];
            }
            $this->db->update(
                'team',
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
            "team",
            array("id" => $id));
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}