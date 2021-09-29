<?php
class Usuarios extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->model('mensagens_model');
                $this->load->model('animais_model');
                $this->load->model('generos_model');
                $this->load->model('horas_sozinho_model');
                $this->load->model('outros_animais_model');
                $this->load->model('moradias_model');
                $this->load->model('avaliacao_animal_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
                $this->load->library('form_validation');
        }

        public function index()
        {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $data['lang'] = 'pt_br';
                else $data['lang'] = 'en_us';

                $data['usuarios'] = $this->usuarios_model->get_usuario();
                $data['title'] = $this->lang->line('Title_user');
                
                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/index', $data);
                $this->load->view('templates/footer');
        } 

        public function view($id_usuario, $id_animal = FALSE)
        {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $data['lang'] = 'pt_br';
                else $data['lang'] = 'en_us';

                $doador = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));

                if($doador == null && $id_usuario != $this->session->userdata('id'))
                        show_404();
                else {
                        $data['usuario'] = $this->usuarios_model->get_usuario($id_usuario);
                        $data['distance'] = $this->usuarios_model->distance($id_usuario);
                        $data['generos'] = $this->generos_model->get_genero();
                        $data['moradias'] = $this->moradias_model->get_moradias();
                        $data['outros'] = $this->outros_animais_model->get_outros();
                        $data['horas'] = $this->horas_sozinho_model->get_horas();

                        if($id_animal)
                                $data['animal'] = $id_animal;

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
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $data['lang'] = 'pt_br';
                else $data['lang'] = 'en_us';

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

                        if($this->session->flashdata("danger"))
                                redirect('usuarios/register', 'refresh');
                        else {
                                $this->login($this->input->post('email'), $this->input->post('senha'));
                                redirect('animais', 'refresh');  
                        }
                }
        }

        public function application()
        {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $data['lang'] = 'pt_br';
                else $data['lang'] = 'en_us';
                
                $data['title'] = $this->lang->line('Title_form');
                $data['moradias'] = $this->moradias_model->get_moradias();
                $data['outros'] = $this->outros_animais_model->get_outros();
                $data['horas'] = $this->horas_sozinho_model->get_horas();

                $this->form_validation->set_rules('moradia', 'Moradia', 'required');
                $this->form_validation->set_rules('horas', 'Horas sozinho', 'required');
                $this->form_validation->set_rules('outros', 'Outros animais', 'required');
                $this->form_validation->set_rules('acesso', 'Acesso', 'required');
                $this->form_validation->set_rules('moradores', 'Moradores', 'required|greater_than[0]');
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
                        redirect('animais', 'refresh');  
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

        public function my_chats()
        { 
                if(!$this->session->userdata("logged")){
                        show_404();
                }

                $data['mensagens'] = $this->mensagens_model->get_mensagem_by_usuario($this->session->userdata('id'));
                $data['title'] = $this->lang->line('Chat');

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/my_chats', $data);
                $this->load->view('templates/footer');
        }

        public function my_deslikes()
        { 
                if(!$this->session->userdata("logged")){
                        show_404();
                }

                $deslikes = $this->avaliacao_animal_model->get_avaliacao_by_usuario($this->session->userdata('id'), 'FALSE');

                if($deslikes){
                        foreach($deslikes as $deslike){
                                $query = $this->animais_model->get_animais($deslike['id_animal']);
                                $data['animais'][] = array(
                                        'id_animal' => $query['id_animal'],
                                        'imagem' => $query['imagem'],
                                        'nome' => $query['nome'],
                                        'id_doador' => $query['id_doador']
                                );
                        }
                }
                else 
                $data['animais'] = NULL;
                $data['deslike'] = TRUE;

                $data['title'] = $this->lang->line('My_deslikes');  
                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/my_animals', $data);
                $this->load->view('templates/footer');              
        }

        public function login(){
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('senha', 'Password', 'required');

                $email = $this->input->post('email');
                $senha = $this->input->post('senha');

                $query = $this->usuarios_model->validate($email, $senha);
                $data['title'] = $this->lang->line('Login');


                if ($this->form_validation->run() === FALSE) {

                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/login');
                        $this->load->view('templates/footer');
                } 
                else {

                        if ($query) { 
                                $data = array(
                                        'usuario' => $query['nome'],
                                        'id' => $query['id_usuario'],
                                        'logged' => true
                                        );
                                $this->session->set_userdata($data);
                                $this->usuarios_model->verify_animals();
                                redirect('animais', 'refresh');

                        } 
                        else {
                                $this->session->set_flashdata("danger", $this->lang->line("Danger")."<a href='".site_url('usuarios/register')."'>".$this->lang->line("Here")."</a>");
                                redirect('usuarios/login', 'refresh');
                        }
                }
        }

        public function change_password(){        
                $postData = $this->input->post();
                $update = $this->authentication_model->change_password($postData);
                if($update['status'] == 'success')
                    $this->session->set_flashdata('success', 'Your password has been successfully changed!');
        
        }

        public function confirm_password(){  
                if($this->input->post('action')){    
                        $senha = $this->input->post('action');
                        $confirm = $this->usuarios_model->confirm_password($senha);
                        if($confirm === true)
                                echo true;
                }
        }
        
        public function review($id_usuario, $id_animal){
                if($this->session->userdata('logged')){
                        $query = $this->avaliacao_animal_model->get_avaliacao_by_both($id_usuario, $id_animal);

                        if($query && ($query['status_solicitacao'] == 1)){
                                $this->avaliacao_animal_model->set_match($query['id_avaliacao'], $id_animal);
                                redirect('animais/');
                        }
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

        public function load_match(){
                $animais = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));
                $output = array();
                foreach($animais as $animal){
                        $matches = $this->avaliacao_animal_model->get_match_by_animal($animal['id_animal']);
                        foreach($matches as $match){
                                if($match){
                                        $usuarios = $this->usuarios_model->get_usuario($match['id_usuario']);

                                        $output[] = array(
                                                'id_usuario' => $usuarios['id_usuario'],
                                                'nome' => $usuarios['nome'], 
                                                'id_animal' => $match['id_animal'],
                                                'animal' => $animal['nome']
                                        );
                                }
                        }
                }
                return $output;
        }

        public function load_like($pag = FALSE)
        {
                if($pag == 0){
                        $animais = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));
                        $output = array();
                        foreach($animais as $animal){
                                $likes = $this->avaliacao_animal_model->get_like($animal['id_animal']);
                                foreach($likes as $like){
                                        if($like){
                                                $usuarios = $this->usuarios_model->get_usuario($like['id_usuario']);

                                                $output[] = array(
                                                        'id_usuario' => $usuarios['id_usuario'],
                                                        'nome' => $usuarios['nome'], 
                                                        'id_animal' => $like['id_animal'],
                                                        'animal' => $animal['nome']
                                                );
                                        }
                                }
                        }
                        return $output;
                }
                else{
                        $query = $this->usuarios_model->get_notificacao_by_animal($pag);
                                $output = array();
                                if($query->num_rows() > 0)
                                {
                                        foreach($query->result() as $row)
                                        {
                                                $userdata = $this->usuarios_model->get_usuario($row->id_usuario);

                                                $output[] = array(
                                                'id_usuario'  => $row->id_usuario,
                                                'nome' => $userdata['nome'],
                                                'id_animal' => $row->id_animal
                                                );
                                        }
                                }
                                return $output;
                }
        }

        public function view_notification($id_animal = FALSE){
                if($id_animal === FALSE)
                        $likes = self::load_like(0);
                else
                        $likes = self::load_like($id_animal);
                
                $data['title'] = $this->lang->line('Notification_title');
                $data['animais'] = $this->animais_model->get_animais_by_usuario($this->session->userdata('id'));

                if($likes){
                        $data['likes'] = $likes;
                }
                else
                        $data['likes'] = NULL;
                
                $matches = self::load_match();

                if($matches)
                        $data['matches'] = $matches;
                else
                        $data['matches'] = NULL;

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/notifications', $data);
                $this->load->view('templates/footer');
        }

}