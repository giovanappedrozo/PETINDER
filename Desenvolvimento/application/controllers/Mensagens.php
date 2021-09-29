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

    public function chat($id_animal, $id_usuario){
        if($this->session->userdata('logged')){
            $data['animal'] = $this->animais_model->get_animais($id_animal);
            $data['usuario'] = null;

            if($id_usuario){
                $data['mensagens'] = $this->mensagens_model->get_mensagem($this->session->userdata('id'), $data['animal'], $id_usuario);
                $data['usuario'] = $id_usuario;
            }
            else
                $data['mensagens'] = $this->mensagens_model->get_mensagem($this->session->userdata('id'), $data['animal']);

            if($data['mensagens']){
                foreach($data['mensagens'] as $msg){
                    if($msg['status_msg'] == 0)
                    $this->mensagens_model->change_status($msg['id_mensagem']);
                }
            }

            if(!$this->input->post('action')){
                $usuario = $this->usuarios_model->get_usuario($id_usuario);
                $data['title'] = $usuario['nome'].' - '.$data['animal']['nome'];

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/chat', $data);
                $this->load->view('templates/footer');
            }
            else{
                $output = array();
                if($data['mensagens'])
                {
                    foreach($data['mensagens'] as $msg)
                    {
                        $hora = explode(" ",$msg['datahora']);
                        $hora = explode(":",$hora[1]);
                        $msg['datahora'] = $hora[0].":".$hora[1];

                        if($msg['id_remetente'] != $this->session->userdata('id'))
                            $output[] = array(
                            'conteudo'  => $msg['conteudo'],
                            'datahora' => $msg['datahora'],
                            'direcao' => 'esquerda'
                            );
                        else
                        $output[] = array(
                            'conteudo'  => $msg['conteudo'],
                            'datahora' => $msg['datahora'],
                            'direcao' => 'direita'
                        );
                    }
                    echo json_encode($output);
                }
            }
        }
        else
            show_404();
    }

    public function addMessage()
    {
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required');
        $usuario = $this->input->post('usuario');
        $animal = $this->animais_model->get_animais($this->input->post('animal'));
            
        if ($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/register', $data);
            $this->load->view('templates/footer');
        }
        else { 
            $this->mensagens_model->set_mensagem($animal);

        header('Location: '.$animal['id_animal'].'/'.$usuario);
        }
    }

    public function load_messages(){
            $data = $this->mensagens_model->get_mensagem_by_usuario($this->session->userdata('id'));

            $output = array();
            if($data)
            {
                foreach($data as $row)
                {
                    if($row['status_msg'] == FALSE && ($row['id_destinatario'] == $this->session->userdata('id'))){
                        $userdata = $this->usuarios_model->get_usuario($row['id_remetente']);
                        $animais = $this->animais_model->get_animais($row['id_animal']);

                        $output[] = array(
                        'id_usuario'  => $row['id_remetente'],
                        'nome' => $userdata['nome'],
                        'id_animal' => $row['id_animal'],
                        'conteudo' => $row['conteudo'],
                        'animal' => $animais['nome']
                        );
                    }
                }
            }
            echo json_encode($output);
                
    }

    function load_chat_data(){
        if($this->input->post('receiver_id')){
            $receiver_id = $this->input->post('receiver_id');
            $sender_id = $this->session->userdata('user_id');

            if($this->input->post('update_data') == 'yes'){
                $this->chat_model->Update_chat_message_status($sender_id);
            }

            $chat_data = $this->chat_model->Fetch_chat_data($sender_id, $receiver_id);

            if($chat_data->num_rows() > 0){
                foreach($chat_data->result() as $row){
                    $message_direction = '';

                    if($row->sender_id == $sender_id){
                        $message_direction = 'right';
                    }
                    else{
                        $message_direction = 'left';
                    }
                    
                    $date = date('D M Y H:i', strtotime($row->chat_messages_datetime));
                    $output[] = array(
                        'chat_messages_text' => $row->chat_messages_text,
                        'chat_messages_datetime'=> $date,
                        'message_direction'  => $message_direction
                        );
                    }
            }
            echo json_encode($output);
        }
    }
}
?>