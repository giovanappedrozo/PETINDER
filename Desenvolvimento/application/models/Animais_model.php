<?php
class Animais_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function get_animais($id_animal = FALSE)
        {
            if ($id_animal === FALSE)
            {
                $query = $this->db->get('animal');
                return $query->result_array();
            }
    
            $query = $this->db->get_where('animal', array('id_animal' => $id_animal));
            return $query->row_array();
        }
        
        public function set_animais()
        {
            $this->load->helper('url');

            // $slug = url_title($this->input->post('title'), 'dash', TRUE);

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
                'castrado' => $cast,
                'statusanimal' => $status
            );

            return $this->db->insert('animal', $data);
        }
}