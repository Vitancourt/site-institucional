<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_controller extends CI_Controller {

    /*
     * Load session
     * Load database
	 * Verify session, if invalid redirect to login
	 */
	function __construct()
	{
		parent::__construct();
        $this->load->library("session");
        $db_obj= $this->load->database(TRUE);
        if (!$this->session->has_userdata("id")) {
            redirect('admin/login', 'location');
		}
	}

    /*
     * Get data from user table
     * Put on view datatable
     */
	public function index()
	{

		$this->load->library('form_validation');
		$this->load->model("config_model");
		if ($this->input->method(TRUE) == "POST") {
			$this->form_validation->set_rules(
				'title',
				'Title',
				'max_length[256]|required',
				array(
					"max_length" => "O title ultrapassou 256 caracteres!",
					"required" => "O title é obrigatório"
				)
			);
			$this->form_validation->set_rules(
				'robots',
				'Robots',
				'max_length[256]|required',
				array(
					"max_length" => "O robots ultrapassou 256 caracteres!",
					"required" => "O required é obrigatório"
				)
			);
			$this->form_validation->set_rules(
				'description',
				'Description',
				'max_length[512]|required',
				array(
					"max_length" => "O description ultrapassou 512 caracteres!",
					"required" => "O required ultrapassou 512 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'author',
				'Author',
				'max_length[256]|required',
				array(
					"max_length" => "O author ultrapassou 1256 caracteres!",
					"required" => "O author é obrigatório!"
				)
			);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_config");
			} else {
				if ($this->config_model->put($this->input->post())) {
					$this->session->set_flashdata("success", "As configurações foram alteradas!");
				}	
				$this->load->view("admin/admin_config");
			}
		} else {
			$data = $this->config_model->get();
			$this->load->view(
				'admin/admin_config',
				array(
					"data" => $data
				)
			);
		}
    }
}