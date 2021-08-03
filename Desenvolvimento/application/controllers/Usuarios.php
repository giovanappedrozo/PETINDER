<?php
class Usuarios extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('usuarios_model');
                $this->load->model('generos_model');
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
                $data['usuario'] = $this->usuarios_model->get_usuario($id_usuario);

                if (empty($data['usuario']))
                {
                        show_404();
                }

                $data['title'] = $data['usuario']['nome'];

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/view', $data);
                $this->load->view('templates/footer');
        }

        public function register()
        {
                $data['title'] = $this->lang->line('Title_reg');
                $data['generos'] = $this->generos_model->get_genero();

                $this->form_validation->set_rules('nome', 'Title', 'required');
                $this->form_validation->set_rules('email', 'Text', 'required');
                $this->form_validation->set_rules('genero', 'Title', 'required');
                $this->form_validation->set_rules('data', 'Text', 'required');
                $this->form_validation->set_rules('senha', 'Title', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/register', $data);
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->usuarios_model->set_usuario();
                        redirect('animais', 'refresh');
                }
        }

        public function application()
        {
                $data['title'] = $this->lang->line('Title_form');
                $data['generos'] = $this->generos_model->get_genero();

                $this->form_validation->set_rules('nome', 'Title', 'required');
                $this->form_validation->set_rules('email', 'Text', 'required');
                $this->form_validation->set_rules('genero', 'Title', 'required');
                $this->form_validation->set_rules('data', 'Text', 'required');
                $this->form_validation->set_rules('senha', 'Title', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/register');
                        $this->load->view('templates/footer');

                }
                else
                {
                        $this->usuarios_model->set_usuarios();
                        $this->load->view('usuarios/success');
                }
        }

        public function distance(){
                $data['usuarios'] = $this->usuarios_model->get_usuario();
                // $data['usuarios'] = $this->usuarios_model->get_usuario();

                // $point1 = explode(",", $data['usuario1']['localizacao']);

                // foreach($usuarios : $usuario){
                // $point2 = $usuario['localizacao'];                

                // $raioTerra = 6370986;
                // $lat1 =   deg2rad($ponto1);
                // $lat2 = deg2rad($ponto2);
                // $long1 = deg2rad($ponto1[1]);
                // $long2 = deg2rad($ponto2[1]);
                // $deltaLat =  deg2rad($lat2 - $lat1);
                // $deltaLong = deg2rad($long2 - $long1);

                // $a = pow(sin($deltaLat/2), 2) + cos($lat1) * cos($lat2) * pow(sin($deltaLong / 2), 2);
                // $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                
                // $d = $raioTerra * $c;

                // if($d <= 100){
                //         $data[]
                // }

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/dist', $data);
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
                                'usuario' => $this->input->post('email'),
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
                        
        public function logout(){
                $this->session->sess_destroy();
                redirect('usuarios/login');
        }

}