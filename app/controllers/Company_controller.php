<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_controller extends CI_Controller {

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
		$this->load->model("company_model");
		if ($this->input->method(TRUE) == "POST") {
			$this->form_validation->set_rules(
				'name',
				'Nome',
				'max_length[128]',
				array(
					"max_length" => "O nome da empresa ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'email',
				'E-mail',
				'max_length[128]',
				array(
					"max_length" => "O e-mail ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'twitter',
				'Twitter',
				'max_length[512]',
				array(
					"max_length" => "O twitter ultrapassou 512 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'facebook',
				'Facebook',
				'max_length[512]',
				array(
					"max_length" => "O facebook ultrapassou 512 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'name',
				'Nome',
				'max_length[128]',
				array(
					"max_length" => "O nome da empresa ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'name',
				'Nome',
				'max_length[128]',
				array(
					"max_length" => "O nome da empresa ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'phone',
				'Telefone',
				'max_length[128]',
				array(
					"max_length" => "O telefone ultrapassou 512 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'country',
				'País',
				'max_length[128]',
				array(
					"max_length" => "O país ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'state',
				'Estado',
				'max_length[128]',
				array(
					"max_length" => "O estado ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'city',
				'Cidade',
				'max_length[128]',
				array(
					"max_length" => "A cidade ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'city',
				'Cidade',
				'max_length[128]',
				array(
					"max_length" => "A cidade ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'zip',
				'CEP',
				'max_length[128]',
				array(
					"max_length" => "O CEP ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'neighboorhood',
				'Endereço',
				'max_length[128]',
				array(
					"max_length" => "O endereço ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'number',
				'Número',
				'max_length[128]',
				array(
					"max_length" => "O número ultrapassou 128 caracteres!"
				)
			);
			$this->form_validation->set_rules(
				'complement',
				'Complemento',
				'max_length[128]',
				array(
					"max_length" => "O complemento ultrapassou 128 caracteres!"
				)
            );
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_company");
			} else {
				if ($this->company_model->put($this->input->post())) {
					$this->session->set_flashdata("success", "Os dados da empresa foram alterados!");
				}	
				$this->load->view("admin/admin_company");
			}
		} else {
			$company = $this->company_model->get();
			$this->load->view(
				'admin/admin_company',
				array(
					"company" => $company
				)
			);
		}
    }
}