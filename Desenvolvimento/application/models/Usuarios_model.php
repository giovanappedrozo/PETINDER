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

        $email = $this->input->post('email');

        $this->db->where('email', $email); 
        $query = $this->db->get('usuario')->row_array();

        if(!$query){
            $senha = $this->input->post('senha');
            
            $options = ['cost' => 12,];
            $criptografada = password_hash($senha, PASSWORD_BCRYPT, $options);

            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');

            if($latitude && $longitude)
                $ponto = "($latitude, $longitude)";
            else $ponto = null;

            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $email,
                'senha' => $criptografada,
                'id_genero' => $this->input->post('genero'),
                'datanasci' => $this->input->post('data'),
                'localizacao' => $ponto
            );

            $this->db->insert('usuario', $data);
        }
        else 
            return $this->session->set_flashdata("danger", $this->lang->line("EmailRepeated")."<a href='".site_url('usuarios/register')."'>".$this->lang->line("Here")."</a>");
    }

    public function set_application(){
        $this->load->helper('url');
        $id_usuario = $this->input->post('id_usuario');

        $data = array(
            'id_moradia' => $this->input->post('moradia'),
            'id_horassozinho' => $this->input->post('horas'),
            'criancas' => $this->input->post('criancas'),
            'qtdmoradores' => $this->input->post('moradores'),
            'id_outrosanimais' => $this->input->post('outros'),
            'acessoprotegido' => $this->input->post('acesso'),
            'gastos' => $this->input->post('gastos'),
            'alergia' => $this->input->post('alergias')
        );

        $this->db->update('usuario', $data, array('id_usuario' => $id_usuario));
    }

    function validate($email, $senha) {
        $this->db->where('email', $email);
        $query = $this->db->get('usuario')->row_array();
        
        $senhaguardada = isset($query['senha']);

        if(crypt($senha,$senhaguardada) == $senhaguardada)        
            return $query;
    }
    
    function logged() {
        $logged = $this->session->userdata('logged');
    
        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina';
            die();
        }
    }

    function change_password($postData){
        $validate = false;

        $oldData = self::get_usuario($this->session->userdata('id'));

        if($oldData['senha'] == md5($postData['currentPassword']))
            $validate = true;

        if($validate){
            $data = array(
                'senha' => md5($postData['newPassword']),
            );
            $this->db->where('id_usuario', $this->session->userdata('id'));
            $this->db->update('usuario', $data);

            return array('status' => 'success', 'message' => '');
        }
        else{
            return array('status' => 'invalid', 'message' => '');
        }
    }

    function distance($id_usuario = FALSE){
        $usuario_logado = $this->session->userdata("id");
        $usuario = $this->usuarios_model->get_usuario($id_usuario);

        if(isset($usuario['localizacao'])) $localizacao = $usuario['localizacao'];
        else $localizacao = NULL;

        if($localizacao){
            $this->db
            ->select("ST_Distance(localizacao::geometry, POINT('".$localizacao."')::geometry) AS dist")
            ->where('id_usuario='.$id_usuario);

            $query = $this->db->get('usuario');

            return $query->row_array();
        }
    }

    public function update_usuario($id_usuario)
    {
        $senha = $this->input->post('senha');
            
        $options = ['cost' => 12,];
        $criptografada = password_hash($senha, PASSWORD_BCRYPT, $options);

        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

        if($latitude && $longitude)
            $ponto = "($latitude, $longitude)";
        else $ponto = null;

        $data = array(
            'email' => $this->input->post('email'),
            'senha' => $criptografada,
            'localizacao' => $ponto
        );

        return $this->db->update('usuario', $data, array('id_usuario' => $id_usuario));        
    } 

    public function delete_usuario($id_usuario = FALSE){
        if ($id_usuario != FALSE){
            $query = $this->db
                ->where('id_usuario', $id_usuario)
                ->delete('usuario');
        }
    }
}