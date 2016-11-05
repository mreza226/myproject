<?php

Class M_article extends CI_Model 
{

    public function __construct()
    {
      
        $this->load->database();
    }

    public function create_article($data) 
    {      
        return $this->db->insert('article', $data);
    }

    public function list_article() 
    {
        $query = $this->db->query("SELECT * FROM article ");
        return $query->result_array();       
    }

    public function list_home() 
    {
        $query = $this->db->query("SELECT * FROM article ");
        return $query->result_array();       
    }

    public function detail_list($id = FALSE) 
    {
        if ($id === FALSE) 
        {
            $query = $this->db->get('article');
            return $query->result_array();
        }
        $query = $this->db->get_where('article', array('id' => $id));
        return $query->row_array();
    }

    public function delete($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('article');
    }
}
