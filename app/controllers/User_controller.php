<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

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
		$this->load->model("user_model");
		if ($this->input->method(TRUE) == "POST") {
			$this->load->model("user_model");
			$this->form_validation->set_rules(
				'id',
				'Identificador',
				'required',
				array(
					"required" => "Erro de parâmetro!"
				)
			);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/user/admin_user");
			} else {
				if ($this->user_model->delete($this->input->post("id"))) {
					$this->session->set_flashdata("success", "Usuário excluído!");
				} else {
					$this->session->set_flashdata("error", "Erro ao excluir o usuário");
				}
				redirect("admin/user", "location");
			}
		} else {
			$array_user = $this->user_model->get();
			$this->load->view(
				'admin/user/admin_user',
				array(
					"array_user" => $array_user
				)
			);
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
			$this->form_validation->set_rules(
				'first_name',
				'Primeiro nome',
				'required|min_length[1]|max_length[127]',
				array(
					"min_length" => "Você não preencheu o Primeiro nome.",
					"max_length" => "O Primeiro nome ultrapassou 127 caracteres.",
					"required" => "Você não preencheu o Primeiro nome."
				)
			);
			$this->form_validation->set_rules(
				'last_name',
				'Último nome',
				'required|min_length[1]|max_length[127]',
				array(
					"min_length[1]" => "Você não preencheu o Último nome.",
					"max_length[127]" => "O Último nome ultrapassou 127 caracteres.",
					"required" => "Você não preencheu o Último nome."
				)
			);
			$this->form_validation->set_rules(
				'username',
				'Nome de usuário',
				'required|min_length[6]|max_length[64]|is_unique[user.username]',
				array(
					"min_length" => "O Nome de usuário deve ter mais de 6 caracteres.",
					"max_length" => "O Nome de usuário ultrapassou 64 caracteres.",
					"required" => "Você não preencheu o Nome de usuário.",
					"is_unique" => "O Nome de usuário já existe."
				)
			);
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|valid_email|is_unique[user.email]',
				array(
					"required" => "Você não preencheu o Email.",
					"is_unique" => "O Email já existe.",
					"valid_email" => "O Email não é válido."
				)
			);
			$this->form_validation->set_rules(
				'password',
				'Senha',
				'required|min_length[1]',
				array(
					'min_length' => "Você deve preencher a senha.",
					'required' => "Você deve preencher a senha."
				)
			);
			$this->form_validation->set_rules(
				'password_conf',
				'Confirmação de Senha',
				'required|matches[password]',
				array(
					"required" => "Você deve preencher a confirmação de senha.",
					"matches", "As senhas inseridas não são iguais."
				)
			);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/user/admin_user_post");
			} else {
				$this->load->model("user_model");
				if ($this->user_model->post($this->input->post())) {
					$this->session->set_flashdata("success", "Usuário cadastrado!");
				} else {
					$this->session->set_flashdata("error", "Erro ao cadastrar o usuário");
				}
				redirect("admin/user", "location");
			}
		} else {
			$this->load->helper("form");
			$this->load->view("admin/user/admin_user_post");
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
			$this->load->model("user_model");
			$this->form_validation->set_rules(
				'first_name',
				'Primeiro nome',
				'required|min_length[1]|max_length[127]',
				array(
					"min_length" => "Você não preencheu o Primeiro nome.",
					"max_length" => "O Primeiro nome ultrapassou 127 caracteres.",
					"required" => "Você não preencheu o Primeiro nome."
				)
			);
			$this->form_validation->set_rules(
				'last_name',
				'Último nome',
				'required|min_length[1]|max_length[127]',
				array(
					"min_length[1]" => "Você não preencheu o Último nome.",
					"max_length[127]" => "O Último nome ultrapassou 127 caracteres.",
					"required" => "Você não preencheu o Último nome."
				)
			);
			$array_user = $this->user_model->get($this->input->post("id"));
			if ($array_user[0]->username != $this->input->post("username")) {
				$this->form_validation->set_rules(
					'username',
					'Nome de usuário',
					'required|min_length[6]|max_length[64]|is_unique[user.username]',
					array(
						"min_length" => "O Nome de usuário deve ter mais de 6 caracteres.",
						"max_length" => "O Nome de usuário ultrapassou 64 caracteres.",
						"required" => "Você não preencheu o Nome de usuário.",
						"is_unique" => "O Nome de usuário já existe."
					)
				);
			} else {
				$this->form_validation->set_rules(
					'username',
					'Nome de usuário',
					'required|min_length[6]|max_length[64]',
					array(
						"min_length" => "O Nome de usuário deve ter mais de 6 caracteres.",
						"max_length" => "O Nome de usuário ultrapassou 64 caracteres.",
						"required" => "Você não preencheu o Nome de usuário."
					)
				);
			}
			if ($array_user[0]->email != $this->input->post("email")) {
				$this->form_validation->set_rules(
					'email',
					'Email',
					'required|valid_email|is_unique[user.email]',
					array(
						"required" => "Você não preencheu o Email.",
						"is_unique" => "O Email já existe.",
						"valid_email" => "O Email não é válido."
					)
				);
			} else {
				$this->form_validation->set_rules(
					'email',
					'Email',
					'required|valid_email',
					array(
						"required" => "Você não preencheu o Email.",
						"valid_email" => "O Email não é válido."
					)
				);
			}
			$this->form_validation->set_rules(
				'password',
				'Senha',
				'required|min_length[1]',
				array(
					'min_length' => "Você deve preencher a senha.",
					'required' => "Você deve preencher a senha."
				)
			);
			$this->form_validation->set_rules(
				'password_conf',
				'Confirmação de Senha',
				'required|matches[password]',
				array(
					"required" => "Você deve preencher a confirmação de senha.",
					"matches", "As senhas inseridas não são iguais."
				)
			);
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/user/admin_user_put");
			} else {
				if ($this->user_model->put($this->input->post())) {
					$this->session->set_flashdata("success", "Alterações gravadas!");
				} else {
					$this->session->set_flashdata("error", "Erro ao alterar o usuário");
				}
				redirect("admin/user", "location");
            }
        } else {
			if (
				empty($this->uri->segment(4)) ||
				$this->uri->segment(4) == "" ||
				!is_numeric($this->uri->segment(4))
			) {
				$this->session->set_flashdata("error", "Erro de parâmetro!");
				redirect("admin/user", "location");
			}
            $this->load->helper("form");
            $this->load->model("user_model");
            $user = $this->user_model->get($this->uri->segment(4));
            if ($user) {
                $this->load->view(
                    'admin/user/admin_user_put',
                    array(
                        "user" => $user
                    )
                );
            } else {
                $this->session->set_flashdata("error", "Usuário não encontrado!");
                redirect("admin/user", "location");
            }
        }
	}

}