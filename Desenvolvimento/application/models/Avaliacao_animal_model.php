<?php
class Avaliacao_animal_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_avaliacao($id_avaliacao = FALSE)
        {
            if ($id_avaliacao === FALSE)
            {
                $query = $this->db->get('avaliacao_animal');
                return $query->result_array();
            }
    
            $query = $this->db->get_where('avaliacao_animal', array('id_avaliacao' => $id_avaliacao));
            return $query->row_array();
        }

        public function get_avaliacao_by_usuario($id_usuario, $id_animal, $avaliacao)
        {    
            $query = $this->db->get_where('avaliacao_animal', array('id_usuario' => $id_usuario, 'id_animal' => $id_animal, 'avaliacao' => $avaliacao));
            return $query->row_array();
        }
    
        public function set_avaliacao()
        {
            $avaliacao = $this->input->post('avaliacao');
            $id_usuario = $this->session->userdata('id');
            $id_animal = $this->input->post('id_animal');

            $query = self::get_avaliacao_by_usuario($id_usuario, $id_animal, $avaliacao);

            if(!$query){
                $data = array(
                    'avaliacao' => $avaliacao,
                    'id_animal' => $id_animal,
                    'id_usuario' => $id_usuario
                );

                return $this->db->insert('avaliacao_animal', $data);
            }
        }
}