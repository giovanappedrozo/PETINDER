<?php
class Animais extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->model('animais_model');
                $this->load->model('generos_model');
                $this->load->model('especies_model');
                $this->load->model('racas_model');
                $this->load->model('portes_model');
                $this->load->model('pelagens_model');
                $this->load->model('avaliacao_animal_model');
                $this->load->model('temperamentos_model');
                $this->load->helper('url', 'form');
                $this->load->library('form_validation');
                $this->load->library("pagination");
        }

        public function index()
        { 
                $config["base_url"] = base_url('animais');
                $config["total_rows"] = $this->animais_model->get_count();
                $config["per_page"] = 5;
                $config["uri_segment"] = 2;

                $this->pagination->initialize($config);

                $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

                $data["links"] = $this->pagination->create_links();

                if($this->session->userdata("logged")){
                        $data['animais'] = $this->animais_model->distance();

                        if($this->session->flashdata("danger")){
                                $data['animais'] = $this->animais_model->get_animais_pag($config["per_page"], $page);
                        }
                        else
                                $this->session->set_flashdata("success", $this->lang->line("LocationOn")."<a href='".site_url('usuarios/register')."'></a>");
                }
                else
                        $data['animais'] = $this->animais_model->get_animais_pag($config["per_page"], $page);

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
                $data['distance'] = $this->animais_model->distance($id_animal);
                $data['generos'] = $this->generos_model->get_genero();
                $data['especies'] = $this->especies_model->get_especie();
                $data['racas'] = $this->racas_model->get_raca();
                $data['portes'] = $this->portes_model->get_porte();
                $data['pelagens'] = $this->pelagens_model->get_pelagem();
                $data['temperamentos'] = $this->temperamentos_model->get_temperamento();

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
                        $this->load->view('animais/register', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $data = array('image_metadata' => $this->upload->data());
                        $this->animais_model->set_animais();
                        redirect('animais', 'refresh');
                }
        }

        public function review(){
                if($this->session->userdata('logged')){
                        $this->avaliacao_animal_model->set_avaliacao();
                        redirect('animais/view/'.$this->input->post('id_animal'));
                }
                else
                        redirect('usuarios/login', 'refresh');
        }

        public function delete($id_animal){
                $animal = $this->animais_model->get_animais($id_animal);
                if($this->session->userdata('id') == $animal['id_doador']){
                        $this->animais_model->delete_animal($id_animal);
                        redirect('usuarios/my_animals', 'refresh');
                }
                else
                        redirect('usuarios/login', 'refresh');
                
        }

        public function edit($id_animal){
                $data['animal'] = $this->animais_model->get_animais($id_animal);
                $data['title'] = $this->lang->line('Title_pet_edit');
                $data['generos'] = $this->generos_model->get_genero();
                $data['especies'] = $this->especies_model->get_especie();
                $data['racas'] = $this->racas_model->get_raca();
                $data['portes'] = $this->portes_model->get_porte();
                $data['pelagens'] = $this->pelagens_model->get_pelagem();
                $data['temperamentos'] = $this->temperamentos_model->get_temperamento();

                $this->form_validation->set_rules('nome', 'nome', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('animais/edit', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->animais_model->update_animal($id_animal);
                        redirect('usuarios/my_animals', 'refresh');
                }
        }
}