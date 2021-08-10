<?php
class Avaliacao_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_avaliacao($id_avaliacao = FALSE)
        {
            if ($id_avaliacao === FALSE)
            {
                $lang = $this->session->get_userdata('site_lang');
                $lang = $lang['site_lang'];
                if($lang == 'portuguese') $lang = 'pt_BR';
                else $lang = 'en_US';

                $query = $this->db->get_where('avaliacao', array('lang' => $lang));
                return $query->result_array();
            }
      
            $query = $this->db->get_where('avaliacao', array('avaliacao' => $id_avaliacao));
            return $query->row_array();
        }
    
        public function set_avaliacao()
        {
            $cast = $this->input->post('castrado');
            $img = $imagem = $this->upload->data();
            $img = $img['file_name'];

            if($cast == 'castrado') $cast = TRUE;
            else $cast = FALSE;

            $status = 1;

            $data = array(
                'imagem' => $img,
                'nome' => $this->input->post('nome'),
                'id_genero' => $this->input->post('genero'),
                'datanasci' => $this->input->post('data'),
                'id_raca' => $this->input->post('raca'),
                'id_porte' => $this->input->post('porte'),
                'id_pelagem' => $this->input->post('pelagem'),
                'especial' => $this->input->post('especial'),
                'id_temperamento' => $this->input->post('temperamento'),
                'infoadicional' => $this->input->post('info'),
                'castrado' => $cast,
                'id_status' => $status,
                'id_doador' => $this->input->post('doador')
            );

            return $this->db->insert('animal', $data);
        }
}