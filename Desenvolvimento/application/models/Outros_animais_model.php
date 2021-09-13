<?php
class Outros_animais_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_outros($id_outros = FALSE)
        {
            if ($id_outros === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('outrosanimais', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('outrosanimais', array('id_outrosanimais' => $id_outros));
            return $query->row_array();
        }
}