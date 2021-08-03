<?php
class Temperamentos_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_temperamento($id_temperamento = FALSE)
        {
            if ($id_temperamento === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $this->db->order_by('temperamento', 'ASC');
                $query = $this->db->get_where('temperamento', array('lang' => $lang));
                return $query->result_array();
            }
    
            $query = $this->db->get_where('temperamento', array('temperamento' => $id_temperamento));
            return $query->row_array();
        }
}