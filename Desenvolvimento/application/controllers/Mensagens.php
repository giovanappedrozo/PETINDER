<?php
class Mensagens extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mensagens_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('animais_model');
        $this->load->model('usuarios_model');
    }

    public function chat($id_animal = NULL){
        $data['animal'] = $this->animais_model->get_animais($id_animal);
        $data['mensagens'] = $this->mensagens_model->get_mensagem($this->session->userdata('id'), $data['animal']);
        $data['title'] = "Chat";

        if($data['animal']){
            $id_doador = $this->usuarios_model->get_usuario($data['animal']['id_doador']);
            if (empty($data['animal'])){
                show_404();
            }
        }
        else
            $this->session->set_flashdata("danger", $this->lang->line("LocationNull")."<a href='".site_url('usuarios/register')."'></a>");

        $this->load->view('templates/header', $data);
        $this->load->view('usuarios/chat', $data);
        $this->load->view('templates/footer');
    }

    public function addMessage()
    {
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
        $animal = $this->animais_model->get_animais($this->input->post('animal'));
            
        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/register', $data);
            $this->load->view('templates/footer');
        }
        else { 
            $this->mensagens_model->set_mensagem($animal);

            if($this->session->flashdata("danger"))
                redirect('mensagens/'.$animal['id_animal']);
            else 
                redirect('mensagens/'.$animal['id_animal']);  
        }
    }
}