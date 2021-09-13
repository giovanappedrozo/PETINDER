<?php
class Usuarios extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->model('animais_model');
                $this->load->model('generos_model');
                $this->load->model('horas_sozinho_model');
                $this->load->model('outros_animais_model');
                $this->load->model('moradias_model');
                $this->load->model('avaliacao_usuario_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');
        }

        public function index()
        {
            $data['usuarios'] = $this->usuarios_model->get_usuario();
            $data['title'] = $this->lang->line('Title_user');
            
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/index', $data);
            $this->load->view('templates/footer');
        } 

        public function view($id_usuario = NULL)
        {
                $doador = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));

                if($doador == null && $id_usuario != $this->session->userdata('id'))
                        show_404();
                else {
                        $data['usuario'] = $this->usuarios_model->get_usuario($id_usuario);
                        $data['distance'] = $this->usuarios_model->distance($id_usuario);
                        $data['generos'] = $this->generos_model->get_genero();

                        if (empty($data['usuario']))
                        {
                                show_404();
                        }

                        $data['title'] = $data['usuario']['nome'];

                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/view', $data);
                        $this->load->view('templates/footer');
                }
        }

        public function register()
        {
                $data['title'] = $this->lang->line('Title_reg');
                $data['generos'] = $this->generos_model->get_genero();

                $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[100]');
                $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
                $this->form_validation->set_rules('genero', 'Genero', 'required');
                $this->form_validation->set_rules('data', 'Data de nascimento', 'required');
                $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
                $this->form_validation->set_rules('confirmacao', 'Confirmação de Senha','required|matches[senha]');
                
                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/register', $data);
                        $this->load->view('templates/footer');

                }
                else
                { 
                        $this->usuarios_model->set_usuario();

                        $this->login($this->input->post('email'), $this->input->post('senha'));

                        if($this->session->flashdata("danger"))
                                redirect('usuarios/register', 'refresh');
                        else 
                                redirect('animais', 'refresh');  
                }
        }

        public function application()
        {
                $data['title'] = $this->lang->line('Title_form');
                $data['moradias'] = $this->moradias_model->get_moradias();
                $data['outros'] = $this->outros_animais_model->get_outros();
                $data['horas'] = $this->horas_sozinho_model->get_horas();

                $this->form_validation->set_rules('moradia', 'Moradia', 'required');
                $this->form_validation->set_rules('horas', 'Horas sozinho', 'required');
                $this->form_validation->set_rules('outros', 'Outros animais', 'required');
                $this->form_validation->set_rules('acesso', 'Acesso', 'required');
                $this->form_validation->set_rules('moradores', 'Moradores', 'required');
                $this->form_validation->set_rules('criancas', 'Criancas', 'required');
                $this->form_validation->set_rules('gastos', 'Gastos', 'required');
                $this->form_validation->set_rules('alergias', 'Alergias', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/adoption_form', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->usuarios_model->set_application();
                        $this->load->view('animais');
                }
        }

        public function my_animals()
        { 
                if(!$this->session->userdata("logged")){
                        show_404();
                }

                $data['animais'] = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));
                $data['title'] = $this->lang->line('Title_animal');

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/my_animals', $data);
                $this->load->view('templates/footer');
        }

        public function login(){

                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('senha', 'Password', 'required');

                $email = $this->input->post('email');
                $senha = $this->input->post('senha');

                // MODELO MEMBERSHIP
                $query = $this->usuarios_model->validate($email, $senha);
                $data['title'] = $this->lang->line('Login');


                if ($this->form_validation->run() === FALSE) {

                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/login');
                        $this->load->view('templates/footer');
                } 
                else {

                        if ($query) { // VERIFICA LOGIN E SENHA
                                $data = array(
                                'usuario' => $query['nome'],
                                'id' => $query['id_usuario'],
                                'logged' => true
                                );
                                $this->session->set_userdata($data);
                                redirect('animais', 'refresh');
                        } 
                        else {
                                $this->session->set_flashdata("danger", $this->lang->line("Danger")."<a href='".site_url('usuarios/register')."'>".$this->lang->line("Here")."</a>");
                                redirect('usuarios/login', 'refresh');
                        }
                }
        }

        function change_password(){        
                $postData = $this->input->post();
                $update = $this->authentication_model->change_password($postData);
                if($update['status'] == 'success')
                    $this->session->set_flashdata('success', 'Your password has been successfully changed!');
        
        }
        
        public function review(){
                if($this->session->userdata('logged')){
                        $this->avaliacao_usuario_model->set_avaliacao();
                        redirect('usuarios/'.$this->input->post('id_usuario'));
                }
                else
                        redirect('usuarios/login', 'refresh');
        }

        public function edit($id_usuario){
                $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
                $this->form_validation->set_rules('senha', 'Senha', 'min_length[6]');

                if ($this->form_validation->run() === FALSE)
                {
                        redirect('usuarios/'.$id_usuario, 'refresh');

                }
                else
                {
                        $this->usuarios_model->update_usuario($id_usuario);
                        redirect('animais', 'refresh');
                }
        }

        public function delete(){
                if($this->session->userdata('logged')){
                        $this->usuarios_model->delete_usuario($this->session->userdata('id'));
                        self::logout();
                }
                else
                        redirect('usuarios/login', 'refresh');
        }
                        
        public function logout(){
                $this->session->sess_destroy();
                redirect('/');
        }

}