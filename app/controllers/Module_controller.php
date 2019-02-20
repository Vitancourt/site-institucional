<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Module_controller extends CI_Controller {

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
        $this->load->model("module_model");
	}

    /*
     * Get data from team table
     * Put on view datatable
     */
	public function index()
	{
        $this->load->helper("form");
        $array_module = $this->module_model->get();
        $this->load->view(
            'admin/module/admin_module',
            array(
                "array_module" => $array_module
            )
        );
    }

    /*
     * delete data from team
     */
	public function delete()
	{
		$this->load->library('form_validation');
		if ($this->input->method(TRUE) == "POST") {
			$this->form_validation->set_rules(
				'id',
				'Identificador',
				'required',
				array(
					"required" => "Erro de parâmetro!"
				)
			);
			if ($this->form_validation->run() == FALSE) {
				redirect("admin/module");
				exit();
			} else {
				if ($this->module_model->delete($this->input->post("id"))) {
					$this->session->set_flashdata("success", "Dados excluídos!");
				} else {
					$this->session->set_flashdata("error", "Erro ao excluir os dados");
				}
				redirect("admin/module", "location");
			}
		}
    }
    
	/*
    * Show view user to user post
    * Get user POST
    */
	public function post()
	{
		if ($this->input->method(TRUE) == "POST") {
            $this->load->library('form_validation');
            $this->load->library('upload');
			$this->form_validation->set_rules(
				'name',
				'Nome',
				'required|max_length[128]',
				array(
					"max_length" => "O nome ultrapassou 128 caracteres.",
					"required" => "Você não preencheu o nome."
				)
			);
			$this->form_validation->set_rules(
				'description',
				'Descrição',
				'max_length[256]',
				array(
					"max_length[256]" => "A descrição ultrapassou 256 caracteres.",
				)
			);
            if (empty($_FILES["image"]["name"])) {
                $this->session->flashdata("error", "Você não inseriu a imagem.");
                $this->load->view("admin/module/admin_module_post");
                exit();
            }
            $config['upload_path'] = "./repository/module/";
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '1024';
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['remove_spaces'] = true;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->session->flashdata("error", $this->upload->display_errors());
            }
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/module/admin_module_post");
			} else {
				if (
                    $this->module_model->post(
                        $this->input->post(),
                        $this->upload->data()
                    )
                ) {
					$this->session->set_flashdata("success", "Dados gravados!");
				} else {
					$this->session->set_flashdata("error", "Erro ao gravar dados");
				}
				redirect("admin/module", "location");
			}
		} else {
			$this->load->helper("form");
			$this->load->view("admin/module/admin_module_post");
		}
    }
    
	/*
    * Show view user to user put
    * Get user by id
    */
    public function put()
	{
        if ($this->input->method(TRUE) == "POST") {
			$this->load->library('form_validation');
            $this->load->library('upload');
            $this->form_validation->set_rules(
				'id',
				'Identificador',
				'required|numeric',
				array(
					"numeric" => "Erro de parãmetro.",
					"required" => "Erro de parãmetro."
				)
			);
			$this->form_validation->set_rules(
				'name',
				'Nome',
				'required|max_length[128]',
				array(
					"max_length" => "O nome ultrapassou 128 caracteres.",
					"required" => "Você não preencheu o nome."
				)
			);
			$this->form_validation->set_rules(
				'description',
				'Descrição',
				'max_length[128]',
				array(
					"max_length[128]" => "A descrição ultrapassou 128 caracteres.",
				)
			);
            if (!empty($_FILES["image"]["name"])) {
                $config['upload_path'] = "./repository/module/";
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '1024';
                $config['max_width'] = 0;
                $config['max_height'] = 0;
                $config['remove_spaces'] = true;
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->flashdata("error", $this->upload->display_errors());
                }
            }
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/module/admin_module_put");
			} else {
				if ($this->module_model->put($this->input->post(), $this->upload->data())) {
					$this->session->set_flashdata("success", "Alterações gravadas!");
				} else {
					$this->session->set_flashdata("error", "Nada alterado");
                }
				redirect("admin/module", "location");
            }
        } else {
			if (
				empty($this->uri->segment(4)) ||
				$this->uri->segment(4) == "" ||
				!is_numeric($this->uri->segment(4))
			) {
				$this->session->set_flashdata("error", "Erro de parâmetro!");
				redirect("admin/module", "location");
			}
            $this->load->helper("form");
            $module = $this->module_model->get($this->uri->segment(4));
            if ($module) {
                $this->load->view(
                    'admin/module/admin_module_put',
                    array(
                        "module" => $module
                    )
                );
            } else {
                $this->session->set_flashdata("error", "Registro não encontrado!");
                redirect("admin/modulo", "location");
            }
        }
	}

}
