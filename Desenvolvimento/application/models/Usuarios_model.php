<?php
class Usuarios_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_usuario($id_usuario = FALSE){
        if ($id_usuario === FALSE){
            $query = $this->db->get('usuario');
            return $query->result_array();
        }
    
        $query = $this->db->get_where('usuario', array('id_usuario' => $id_usuario));
        return $query->row_array();
    }
        
    public function set_usuario(){
        $this->load->helper('url');

        $senha = $this->input->post('senha');
        $options = ['cost' => 12,];
        $criptografada = password_hash($senha, PASSWORD_BCRYPT, $options);

        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $ponto = "($latitude, $longitude)";

        $data = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'senha' => $criptografada,
            'id_genero' => $this->input->post('genero'),
            'datanasci' => $this->input->post('data'),
            'localizacao' => $ponto
        );

        return $this->db->insert('usuario', $data);
    }

    function validate() {
        $this->db->where('email', $this->input->post('email')); 
        $this->db->where('senha', crypt($this->input->post('senha'), 'senha'));    
        $query = $this->db->get('usuario'); 
    
        if ($query->num_rows == 1) { 
            return true; 
        }
    }
    
    function logged() {
        $logged = $this->session->userdata('logged');
    
        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://oficina2015/login">Efetuar Login</a>';
            die();
        }
    }
}