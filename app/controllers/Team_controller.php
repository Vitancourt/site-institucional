<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_controller extends CI_Controller {

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
        $this->load->model("team_model");
	}

    /*
     * Get data from team table
     * Put on view datatable
     */
	public function index()
	{
        $this->load->helper("form");
        $array_team = $this->team_model->get();
        $this->load->view(
            'admin/team/admin_team',
            array(
				"array_team" => $array_team,
				"page" => "team"
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
				$this->load->view(
					"admin/team/admin_team",
					array(
						"page" => "team"
					)
				);
			} else {
				if ($this->team_model->delete($this->input->post("id"))) {
					$this->session->set_flashdata("success", "Dados excluídos!");
				} else {
					$this->session->set_flashdata("error", "Erro ao excluir os dados");
				}
				redirect("admin/team", "location");
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
				'Primeiro nome',
				'required|max_length[512]',
				array(
					"max_length" => "O Primeiro nome ultrapassou 512 caracteres.",
					"required" => "Você não preencheu o nome."
				)
			);
			$this->form_validation->set_rules(
				'workas',
				'Trabalha como',
				'max_length[128]',
				array(
					"max_length[128]" => "O Último nome ultrapassou 128 caracteres.",
				)
			);
			$this->form_validation->set_rules(
				'order',
				'Ordem',
				'required|numeric',
				array(
					"required" => "Você não preencheu o Nome de usuário.",
					"numeric" => "O campo ordem deve ser numérico."
				)
            );
            $this->form_validation->set_rules(
				'facebook',
				'Facebook',
				'max_length[256]',
				array(
					"max_length[256]" => "O Facebook ultrapassou 256 caracteres.",
				)
            );
            $this->form_validation->set_rules(
				'twitter',
				'Twitter',
				'max_length[256]',
				array(
					"max_length[256]" => "O Twitter ultrapassou 256 caracteres.",
				)
            );
            $this->form_validation->set_rules(
				'linkedin',
				'Linkedin',
				'max_length[256]',
				array(
					"max_length[256]" => "O Linkedin ultrapassou 256 caracteres.",
				)
			);
			$this->form_validation->set_rules(
				'skype',
				'Skype',
				'max_length[128]',
				array(
					"max_length[128]" => "O Skype ultrapassou 128 caracteres.",
				)
            );
            if (empty($_FILES["image"]["name"])) {
                $this->session->flashdata("error", "Você não inseriu a imagem.");
                $this->load->view(
					"admin/admin_team_post",
					array(
						"page" => "team"
					)
				);
                exit();
            }
            $config['upload_path'] = "./repository/team/";
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
				$this->load->view(
					"admin/team/admin_team_post",
					array(
						"page" => "team"
					)
				);
			} else {
				if (
                    $this->team_model->post(
                        $this->input->post(),
                        $this->upload->data()
                    )
                ) {
					$this->session->set_flashdata("success", "Dados gravados!");
				} else {
					$this->session->set_flashdata("error", "Erro ao gravar dados");
				}
				redirect("admin/team", "location");
			}
		} else {
			$this->load->helper("form");
			$this->load->view(
				"admin/team/admin_team_post",
				array(
					"page" => "team"
				)
			);
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
				'Primeiro nome',
				'required|max_length[512]',
				array(
					"max_length" => "O Primeiro nome ultrapassou 512 caracteres.",
					"required" => "Você não preencheu o nome."
				)
			);
			$this->form_validation->set_rules(
				'workas',
				'Trabalha como',
				'max_length[128]',
				array(
					"max_length[128]" => "O Último nome ultrapassou 128 caracteres.",
				)
			);
			$this->form_validation->set_rules(
				'order',
				'Ordem',
				'required|numeric',
				array(
					"required" => "Você não preencheu o Nome de usuário.",
					"numeric" => "O campo ordem deve ser numérico."
				)
            );
            $this->form_validation->set_rules(
				'facebook',
				'Facebook',
				'max_length[256]',
				array(
					"max_length[256]" => "O Facebook ultrapassou 256 caracteres.",
				)
            );
            $this->form_validation->set_rules(
				'twitter',
				'Twitter',
				'max_length[256]',
				array(
					"max_length[256]" => "O Twitter ultrapassou 256 caracteres.",
				)
            );
            $this->form_validation->set_rules(
				'linkedin',
				'Linkedin',
				'max_length[256]',
				array(
					"max_length[256]" => "O Linkedin ultrapassou 256 caracteres.",
				)
            );
            $this->form_validation->set_rules(
				'skype',
				'Skype',
				'max_length[128]',
				array(
					"max_length[128]" => "O Skype ultrapassou 128 caracteres.",
				)
            );
            if (!empty($_FILES["image"]["name"])) {
                $config['upload_path'] = "./repository/team/";
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
				$this->load->view(
					"admin/team/admin_team_put",
					array(
						"page" => "team"
					)
				);
			} else {
				if ($this->team_model->put($this->input->post(), $this->upload->data())) {
					$this->session->set_flashdata("success", "Alterações gravadas!");
				} else {
					$this->session->set_flashdata("error", "Nada alterado");
                }
				redirect("admin/team", "location");
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
            $team = $this->team_model->get($this->uri->segment(4));
            if ($team) {
                $this->load->view(
                    'admin/team/admin_team_put',
                    array(
						"team" => $team,
						"page" => "team"
                    )
                );
            } else {
                $this->session->set_flashdata("error", "Membro da equipe não encontrado!");
                redirect("admin/team", "location");
            }
        }
	}

}