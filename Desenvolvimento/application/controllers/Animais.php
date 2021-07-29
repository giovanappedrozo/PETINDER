<?php
class Animais extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('animais_model');
                $this->load->model('generos_model');
                $this->load->model('especies_model');
                $this->load->model('racas_model');
                $this->load->model('portes_model');
                $this->load->model('pelagens_model');
                $this->load->model('temperamentos_model');
                $this->load->helper('url_helper');
                // $this->lang->load('content','portuguese');
        }

        public function index()
        { 
            $data['animais'] = $this->animais_model->get_animais();
            $data['title'] = $this->lang->line('Title_animal');
            
            $this->load->view('templates/header', $data);
            $this->load->view('animais/index', $data);
            $this->load->view('templates/footer');
        } 

        public function view($id_animal = NULL)
        {
                $data['animal'] = $this->animais_model->get_animais($id_animal);

                if (empty($data['animal']))
                {
                        show_404();
                }

                $data['title'] = $data['animal']['nome'];

                $this->load->view('templates/header', $data);
                $this->load->view('animais/view', $data);
                $this->load->view('templates/footer');
        }

        public function register()
        {
                $this->load->helper('url', 'form');	
	        $this->load->library('form_validation');

                $data['title'] = $this->lang->line('Title_pet_register');
                $data['generos'] = $this->generos_model->get_genero();
                $data['especies'] = $this->especies_model->get_especie();
                $data['racas'] = $this->racas_model->get_raca();
                $data['portes'] = $this->portes_model->get_porte();
                $data['pelagens'] = $this->pelagens_model->get_pelagem();
                $data['temperamentos'] = $this->temperamentos_model->get_temperamento();

                $config['upload_path'] = './assets/fotos';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;

                $this->load->library('upload', $config);

                $this->upload->do_upload('img');
                       
                $this->form_validation->set_rules('img', 'imagem', 'required');
                $this->form_validation->set_rules('nome', 'nome', 'required');
                $this->form_validation->set_rules('genero', 'sexo', 'required');
                $this->form_validation->set_rules('data', 'data de nascimento', 'required');
                $this->form_validation->set_rules('especie', 'especie', 'required');
                $this->form_validation->set_rules('raca', 'raca', 'required');
                $this->form_validation->set_rules('porte', 'porte', 'required');
                $this->form_validation->set_rules('pelagem', 'pelagem', 'required');
                $this->form_validation->set_rules('especial', 'necessidades especiais', 'required');
                $this->form_validation->set_rules('temperamento', 'temperamento', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('animais/register', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->animais_model->set_animais();
                        $this->load->view('animais/success');
                }
        }
}