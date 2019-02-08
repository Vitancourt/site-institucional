<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$db_obj= $this->load->database(TRUE);
    }

    public function get()
    {
        $query = $this->db->select(
            "name,
            mail,
            twitter,
            facebook,
            instagram,
            phone,
            country,
            state,
            city,
            zip,
            address,
            number,
            complement"
            )
            ->from("company")
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
            "company",
            array(
                "name" => "",
                "mail" => "",
                "twitter" => "",
                "facebook" => "",
                "instagram" => "",
                "phone" => "",
                "country" => "",
                "state" => "",
                "city" => "",
                "zip" => "",
                "address" => "",
                "number" => "",
                "complement" => ""
            )
        );
        return $this->db->insert_id();
    }

    public function put($post)
    {   
        $this->db->update(
            'company',
            array(
                "name" => $post["name"],
                "mail" => $post["email"],
                "twitter" => $post["twitter"],
                "facebook" => $post["facebook"],
                "instagram" => $post["instagram"],
                "phone" => $post["phone"],
                "country" => $post["country"],
                "state" => $post["state"],
                "city" => $post["city"],
                "zip" => $post["zip"],
                "address" => $post["address"],
                "number" => $post["number"],
                "complement" => $post["complement"]
            )
        );
        if ($this->db->affected_rows() == '1') {
            return true;
        }
        return false;
    }

}