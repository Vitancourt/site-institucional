<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage_controller extends CI_Controller {

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
		$db_obj= $this->load->database(TRUE);
		$this->load->model("banner_model");
		$this->load->model("about_model");
		$this->load->model("company_model");
		$this->load->model("comments_model");
		$this->load->model("team_model");
	}

	public function index()
	{
		$db_obj= $this->load->database(TRUE);
		$this->load->view(
			"homepage",
			array(
				"banner" => $this->banner_model->get(),
				"about" => $this->about_model->get(),
				"company" => $this->company_model->get(),
				"comments" => $this->comments_model->getHomepage(),
				"banner_comments" => $this->comments_model->comments_get(),
				"team" => $this->team_model->get()
			)
		);
	}
}
