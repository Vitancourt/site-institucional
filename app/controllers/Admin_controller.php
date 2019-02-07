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
		
		if (
			!$this->session->has_userdata("username") ||
			!$this->session->has_userdata("name") ||
			!$this->session->has_userdata("email") ||
			!$this->session->has_userdata("id")
		) {
			//Commented to tests
			//$this->session->sess_destroy();
			//redirect('admin/login', 'location');
		}
		$this->session->set_userdata(
			array(
				"name" => "Maikel"
			)
		);
		$this->load->view('admin/admin');
	}

	/*
	 *	Responsability login
	 *	Made post request
	 */
	public function login()
	{
		if ($this->input->method(TRUE) == "POST") {
			exit();

		}
		$this->load->view('admin/admin_login');
	}

}