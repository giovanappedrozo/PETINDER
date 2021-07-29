<?php
class Racas_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_raca($id_raca = FALSE)
        {
            if ($id_raca === FALSE)
            {
                $query = $this->db->get('raca');
                return $query->result_array();
            }
    
            $query = $this->db->get_where('raca', array('raca' => $id_raca));
            return $query->row_array();
        }
}