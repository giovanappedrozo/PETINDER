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
                $this->load->library('form_validation');

                // $this->lang->load('content','portuguese');
        }

        public function index()
        { 
                $data['animais'] = $this->animais_model->get_animais();
                $data['title'] = $this->lang->line('Title_animal');
                $data['generos'] = $this->generos_model->get_genero();
                $data['especies'] = $this->especies_model->get_especie();
                $data['racas'] = $this->racas_model->get_raca();
                $data['portes'] = $this->portes_model->get_porte();
                $data['pelagens'] = $this->pelagens_model->get_pelagem();
                $data['temperamentos'] = $this->temperamentos_model->get_temperamento();
                $data['operador'] = '!=';

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

                $data['title'] = $this->lang->line('Title_pet_register');
                $data['generos'] = $this->generos_model->get_genero();
                $data['especies'] = $this->especies_model->get_especie();
                $data['racas'] = $this->racas_model->get_raca();
                $data['portes'] = $this->portes_model->get_porte();
                $data['pelagens'] = $this->pelagens_model->get_pelagem();
                $data['temperamentos'] = $this->temperamentos_model->get_temperamento();

                $config['upload_path'] = './assets/fotos';
                $config['allowed_types'] = 'jpeg|jpg|png|gif';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;
                $config['file_name'] = md5(uniqid(time()));

                $this->load->library('upload', $config);

                $this->form_validation->set_rules('nome', 'nome', 'required');

                if (($this->form_validation->run() === FALSE) || (!$this->upload->do_upload('profile_pic')))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('templates/header', $data);
                        $this->load->view('animais/register', $data, $error);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $data = array('image_metadata' => $this->upload->data());
                        $this->animais_model->set_animais();
                        redirect('animais', 'refresh');
                }
        }
}