<?php
class Horas_sozinho_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_horas($id_horas = FALSE)
        {
            if ($id_horas === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('horassozinho', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('horassozinho', array('id_horassozinho' => $id_horas));
            return $query->row_array();
        }
}