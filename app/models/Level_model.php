<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

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
                image,
                link")
                ->from("level")
                ->where("id", $id)
                ->get();
            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        } else {
            $this->db->order_by("id", "desc");
            $this->db->select(
                "id,
                name,
                description,
                price,
                image,
                link"
            );
            $query = $this->db->get('level');
            return $query->result();
        }
        return false;
    }

    public function reduceLink($link)
    {
        return 
            str_replace("level/", "",
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

    public function hasName($name, $id)
    {
        $query = $this->db->select(
            "id,
            name,
            description,
            price,
            image,
            link")
            ->from("level")
            ->where("name", $name)
            ->where("id !=", $id)
            ->get();
        return ($query->num_rows());
    }

    public function hasLink($link, $id)
    {
        $query = $this->db->select(
            "id,
            name,
            description,
            price,
            image,
            link")
            ->from("level")
            ->where("link", $link)
            ->where("id !=", $id)
            ->get();
        return ($query->num_rows());
    }

    public function post($post, $file)
    {   
        $file_name = "";
        if (!empty($file["file_name"])) {
            $file_name = $file["file_name"];
        }
        $this->db->insert(
            "level",
            array(
                "name" => $post["name"],
                "description" => $post["description"],
                "price" => $post["price"],
                "image" => $file_name,
                "link" => $post["link"],
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
            $data["price"] = $post["price"];
            $data["link"] = $this->reduceLink($post["link"]);
            $data["updated_at"] = date("Y-m-d H:i:s");
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