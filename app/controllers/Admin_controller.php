<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$db_obj= $this->load->database(TRUE);
	}

	/*
	 *	Verify session, if invalid redirect to login
	 */
	public function index()
	{
		if (!$this->session->has_userdata("id")) {
			redirect('admin/login', 'location');
			exit();
		}
		$this->load->view('admin/admin');
	}

	/*
	 *	Responsability login
	 *	Made post request
	 */
	public function login()
	{
		if ($this->input->method(TRUE) == "POST") {
			$this->load->library("form_validation");
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required',
				array(
					"required" => "Você não preencheu o Email."
				)
			);
			$this->form_validation->set_rules(
				'password',
				'Senha',
				'required',
				array(
					'required' => "Você deve preencher a senha."
				)
			);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_login");
			} else {
				$this->load->model("user_model");
				if ($this->user_model->login($this->input->post())) {
					$this->session->set_flashdata("success", "Bem vindo a página de administração!");
				} else {
					$this->session->set_flashdata("error", "Dados inválidos!");
				}
				redirect("admin", "location");
				exit();
			}
		} else {
			if (
				$this->session->has_userdata("username") &&
				$this->session->has_userdata("first_name") &&
				$this->session->has_userdata("email") &&
				$this->session->has_userdata("id")
			) {
				redirect('admin', 'location');
				exit();
			}
			$this->load->view('admin/admin_login');
		}
	}

}