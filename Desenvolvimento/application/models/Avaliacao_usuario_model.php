<?php
class Avaliacao_usuario_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_avaliacao($id_avaliacao = FALSE)
        {
            if ($id_avaliacao === FALSE)
            {
                $query = $this->db->get('avaliacao_usuario');
                return $query->result_array();
            }
    
            $query = $this->db->get_where('avaliacao_usuario', array('id_avaliacao' => $id_avaliacao));
            return $query->row_array();
        }
    
        public function set_avaliacao()
        {
            $data = array(
                'avaliacao' => $this->input->post('avaliacao'),
                'id_adotante' => $this->input->post('id_usuario'),
                'id_doador' => $this->session->userdata('id')
            );

            return $this->db->insert('avaliacao_usuario', $data);
        }
}