<?php
class Mensagens_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_mensagem($id_usuario = FALSE, $animal = FALSE)
        {
            if ($id_usuario === FALSE)
            {
                $query = $this->db->get('mensagem');
                return $query->result_array();
            }

            if($animal){
                $id_doador = $animal['id_doador'];
                $id_animal = $animal['id_animal'];

                $where = "(id_remetente='$id_usuario' OR id_destinatario='$id_usuario') AND (id_remetente='$id_doador' OR id_destinatario='$id_doador') AND (id_animal='$id_animal')";
                $this->db->where($where);
        
                $query = $this->db->get("mensagem");
                return $query->result_array();
            }
            else
                return $this->session->set_flashdata("danger", $this->lang->line("LocationNull")."<a href='".site_url('usuarios/register')."'></a>");
        }
        
        public function set_mensagem($animal = FALSE)
        {
            $this->load->helper('url');

            $data = array(
                'conteudo' => $this->input->post('mensagem'),
                'id_remetente' => $this->session->userdata('id'),
                'id_destinatario' => $animal['id_doador'],
                'id_animal' => $animal['id_animal']
            );

            return $this->db->insert('mensagem', $data);
        } 
    }