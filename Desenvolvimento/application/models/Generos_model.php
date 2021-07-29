<?php
class Generos_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_genero($id_genero = FALSE)
        {
            if ($id_genero === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('genero', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('genero', array('id_genero' => $id_genero));
            return $query->row_array();
        }
}