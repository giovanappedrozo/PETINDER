<?php
class Moradias_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_moradias($id_moradia = FALSE)
        {
            if ($id_moradia === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('moradia', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('moradia', array('id_moradia' => $id_moradia));
            return $query->row_array();
        }
}