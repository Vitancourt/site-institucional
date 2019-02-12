<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_controller extends CI_Controller {

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
        $this->load->model("comments_model");
	}

    /*
     * Get data from comments table
     * Put on view datatable
     * and make delete
     */
	public function index()
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
				$this->load->view("admin/admin_comments");
			} else {
				if ($this->banner_model->delete($this->input->post("id"))) {
					$this->session->set_flashdata("success", "Comentário excluído!");
				} else {
					$this->session->set_flashdata("error", "Erro ao excluir o comentário");
				}
				redirect("admin/comments", "location");
			}
		} else {
			$array_comments = $this->comments_model->get();
			$this->load->view(
				'admin/admin_comments',
				array(
					"comments" => $array_comments
				)
			);
		}
    }
    
	/*
    * Show view admin_banner_post to user post
    * Get user POST
    */
	public function post()
	{
		if ($this->input->method(TRUE) == "POST") {
            $this->load->library('form_validation');
            $this->load->library('upload');
			$this->form_validation->set_rules(
				'comments',
				'Comentário',
				'required|max_length[64000]',
				array(
					"max_length" => "O comentário ultrapassou 64000 caracteres.",
					"required" => "Você não preencheu o comentário."
				)
			);
            $config['upload_path'] = "./repository/banner_homepage/";
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
                echo $this->upload->display_errors();
			    //exit();
            }
			$this->form_validation->set_rules(
				'order',
				'Ordem',
				'required|numeric',
				array(
					"numeric" => "A ordem deve ser um número inteiro.",
					"required" => "Você não preencheu o Nome de usuário.",
					
				)
            );
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_comments_post");
			} else {
				if ($this->comments_model->post($this->input->post(), $this->upload->data())) {
					$this->session->set_flashdata("success", "Comentário cadastrado!");
				} else {
					$this->session->set_flashdata("error", "Erro ao cadastrar o comentário");
				}
				redirect("admin/comments", "location");
			}
		} else {
			$this->load->helper("form");
			$this->load->view("admin/admin_comments_post");
		}
    }
    
	/*
    * Show view admin_banner_put to user put
    * Get user by id
    */
    public function put()
	{
		$this->load->model("banner_model");
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
				$config['upload_path'] = "./repository/banner_homepage/";
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
					echo $this->upload->display_errors();
					//exit();
				}
			}
			$this->form_validation->set_rules(
				'order',
				'Ordem',
				'required|numeric',
				array(
					"numeric" => "A ordem deve ser um número inteiro.",
					"required" => "Você não preencheu o Nome de usuário.",
					
				)
            );
			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/admin_banner_post");
			} else {
				if ($this->banner_model->put($this->input->post(), $this->upload->data())) {
					$this->session->set_flashdata("success", "Banner cadastrado!");
				} else {
					$this->session->set_flashdata("error", "Erro ao cadastrar o banner");
				}
				redirect("admin/banner", "location");
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
            $banner = $this->banner_model->get($this->uri->segment(4));
            if ($banner) {
                $this->load->view(
                    'admin/admin_banner_put',
                    array(
                        "banner" => $banner
                    )
                );
            } else {
                $this->session->set_flashdata("error", "Banner não encontrado!");
                redirect("admin/banner", "location");
            }
        }
	}

		/*
    * Show view user to user put
    * Get user by id
    */
    public function delete()
	{
		$this->load->model("banner_model");
        if ($this->input->method(TRUE) == "POST") {
			if (
				!empty($this->input->post("id")) &&
				!is_numeric($this->input->post("id"))
			) {
				$this->session->set_flashdata("error", "Erro de parâmetro!");
				return false;
			}
			if ($this->banner_model->delete($this->input->post("id"))) {
				$this->session->set_flashdata("success", "Banner excluído!");
			} else {
				$this->session->set_flashdata("error", "Nada alterado!");
			}
			redirect("admin/banner", "location");
		}
		return false;
	}

}