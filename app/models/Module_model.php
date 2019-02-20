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
                icon,
                link"
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
                icon,
                link"
            );
            $query = $this->db->get('module');
            return $query->result();
        }
        return false;
    }

    public function hasName($name, $id)
    {
        $query = $this->db->select(
            "id,
            name,
            description,
            image,
            icon,
            link"
        )
            ->from("module")
            ->where("id !=", $id)
            ->where("name", $name)
            ->get();
        return $query->num_rows();
    }

    public function hasLink($link, $id)
    {
        $query = $this->db->select(
            "id,
            name,
            description,
            image,
            icon,
            link"
        )
            ->from("module")
            ->where("id !=", $id)
            ->where("link", $link)
            ->get();
        return $query->num_rows();
    }

    public function reduceLink($link)
    {
        return 
            str_replace("module/", "",
                strtolower(
                    str_replace(" ", "-",
                        preg_replace(
                            array(
                                "/(á|à|ã|â|ä)/",
                                "/(Á|À|Ã|Â|Ä)/",
                                "/(é|è|ê|ë)/",
                                "/(É|È|Ê|Ë)/",
                                "/(í|ì|î|ï)/",
                                "/(Í|Ì|Î|Ï)/",
                                "/(ó|ò|õ|ô|ö)/",
                                "/(Ó|Ò|Õ|Ô|Ö)/",
                                "/(ú|ù|û|ü)/",
                                "/(Ú|Ù|Û|Ü)/",
                                "/(ñ)/",
                                "/(Ñ)/"
                            ),
                            explode(
                                " ",
                                "a A e E i I o O u U n N"),
                                $link
                        )
                    )
                )
            );
        
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
                "icon" => $post["icon"],
                "link" => $this->reduceLink($post["link"]),
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
            $data["description"] = $post["description"];
            $data["icon"] = $post["icon"];
            $data["link"] = $this->reduceLink($post["link"]);
            $data["updated_at"] = date("Y-m-d H:i:s");
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