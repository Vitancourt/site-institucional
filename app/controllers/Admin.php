<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$db_obj= $this->load->database(TRUE);
	}

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
		$this->load->view('admin');
	}

	public function login()
	{
		if ($this->input->method(TRUE) == "POST") {
			exit();
		}
		$this->load->view('admin_login');
	}

	public function user() {
		$this->load->view('admin_user');
	}

}
