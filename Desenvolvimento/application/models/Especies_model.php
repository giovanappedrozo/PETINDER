<?php
class Especies_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_especie($id_especies = FALSE)
        {
            if ($id_especies === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('especie', array('lang' => $lang));
                return $query->result_array();
            }
      
            $query = $this->db->get_where('especie', array('especie' => $id_especies));
            return $query->row_array();
        }
}