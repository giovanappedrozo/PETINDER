<?php
class Portes_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_porte($id_porte = FALSE)
        {
            if ($id_porte === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('porte', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('porte', array('porte' => $id_porte));
            return $query->row_array();
        }
}