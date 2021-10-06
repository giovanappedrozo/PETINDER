<?php
class Racas_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_raca($id_especie = FALSE)
        {
            if ($id_especie === FALSE)
            {
                $this->db->order_by('id_especies', 'ASC');
                $query = $this->db->get('raca');
                return $query->result_array();
            }
    
            $query = $this->db
            ->order_by('raca', 'ASC')
            ->get_where('raca', array('id_especies' => $id_especie));

            return $query->result_array();
        }
}