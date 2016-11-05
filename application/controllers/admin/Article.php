<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {
        
    public function __construct() 
    {
        parent::__construct();        
        $this->load->model('m_article');
    }
      
    public function index()
    {
        $data['title'] = "Bintang Timur";
        $this->load->view('article/create_article_view', $data);
    }

    public function create()
    {
        $this->load->view('admin/article/create_article_view');
    }
    
    public function create_article()
    {
        $data['title'] = $this->security->xss_clean($this->input->post('title'));
        $data['description'] = $this->security->xss_clean($this->input->post('description'));
        $data['created'] = gmdate ("Y-m-d H:i:s", time()+60*60*7); 
        $this->m_article->create_article($data);           
    }

    public function display()
    {        
        $data['display'] = $this->m_article->list_article();
        $this->load->view('admin/article/list_article_view', $data);
    }   

    public function delete()
    {
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->m_article->delete($id);
    }
}