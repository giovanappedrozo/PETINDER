<?php
class Pelagens_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_pelagem($id_pelagem = FALSE)
        {
            if ($id_pelagem === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('pelagem', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('pelagem', array('pelagem' => $id_pelagem));
            return $query->row_array();
        }
}