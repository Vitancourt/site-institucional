<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_controller extends CI_Controller {

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
        $this->load->model("about_model");
    }

	/*
    * Show view admin_banner_put to user put
    * Get user by id
    */
    public function put()
	{
        $this->load->helper("form");
        if ($this->input->method(TRUE) == "POST") {
			$this->load->library('form_validation');
            $this->load->library('upload');
			$this->form_validation->set_rules(
				'text',
				'Texto',
				'required|max_length[64000]',
				array(
					"max_length" => "O Primeiro nome ultrapassou 64000 caracteres.",
					"required" => "Você não preencheu o texto."
				)
			);
			if (!empty($_FILES["image"]["name"])) {
				$config['upload_path'] = "./repository/about/";
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']     = '2048';
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$config['remove_spaces'] = true;
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				// Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					echo $this->upload->display_errors();
					//exit();
				}
			}
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_about");
			} else {
				if ($this->about_model->put($this->input->post(), $this->upload->data())) {
					$this->session->set_flashdata("success", "Sobre gravado!");
				} else {
					$this->session->set_flashdata("error", "Nada alterado");
				}
				redirect("admin/about", "location");
			}
        }
        $this->load->view(
            "admin/admin_about",
            array(
                "about" => $this->about_model->get()
            )
        );
	}

}