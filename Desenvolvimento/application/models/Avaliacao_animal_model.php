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

        public function get_avaliacao_by_usuario($id_usuario, $avaliacao, $id_animal = FALSE)
        {   
            if($id_animal === FALSE){
                $query = $this->db->get_where('avaliacao_animal', array('id_usuario' => $id_usuario, 'avaliacao' => $avaliacao));            
                return $query->result_array();
            } 
            else{
                $query = $this->db->get_where('avaliacao_animal', array('id_usuario' => $id_usuario, 'id_animal' => $id_animal, 'avaliacao' => $avaliacao));
                return $query->row_array();
            }
        }

        public function get_avaliacao_by_both($id_usuario, $id_animal)
        {    
            $query = $this->db->get_where('avaliacao_animal', array('id_usuario' => $id_usuario, 'id_animal' => $id_animal, 'avaliacao' => TRUE));
            return $query->row_array();
        }
    
        public function set_avaliacao()
        {
            $avaliacao = $this->input->post('avaliacao');
            $id_usuario = $this->session->userdata('id');
            $id_animal = $this->input->post('id_animal');

            $query = self::get_avaliacao_by_usuario($id_usuario, $avaliacao, $id_animal);

            if(!$query){
                $data = array(
                    'avaliacao' => $avaliacao,
                    'id_animal' => $id_animal,
                    'id_usuario' => $id_usuario,
                    'status_solicitacao' => 1
                );

                return $this->db->insert('avaliacao_animal', $data);
            }
        }

        public function set_match($id_avaliacao, $id_animal)
        {
            $this->load->model('animais_model');

            if($this->input->post('avaliacao') == 'TRUE'){
                $avaliacao = array(
                    'status_solicitacao' => 2
                );

                $animal = array(
                    'id_status' => 2
                );

                $this->db->update('animal', $animal, array('id_animal' => $id_animal));
                return $this->db->update('avaliacao_animal', $avaliacao, array('id_avaliacao' => $id_avaliacao));        
            }
            else{
                $avaliacao = array(
                    'status_solicitacao' => 3
                );

                return $this->db->update('avaliacao_animal', $avaliacao, array('id_avaliacao' => $id_avaliacao));        
            }
        } 

        public function get_match_by_usuario($id_usuario){
            $query = $this->db->get_where('avaliacao_animal', array('id_usuario' => $id_usuario, 'status_solicitacao' => 2));            
            return $query->result_array();
        }

        public function get_match_by_animal($id_animal){
            $query = $this->db->get_where('avaliacao_animal', array('id_animal' => $id_animal, 'status_solicitacao' => 2));            
            return $query->result_array();
        }

        public function get_like($id_animal){
            $query = $this->db->get_where('avaliacao_animal', array('id_animal' => $id_animal, 'status_solicitacao' => 1, 'avaliacao' => 'TRUE'));            
            return $query->result_array();
        }
}