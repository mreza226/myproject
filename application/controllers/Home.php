<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
        
    public function __construct() 
    {
        parent::__construct();        
        $this->load->model('m_article');
    }
      
    public function index()
    {
        $data['title'] = "Bintang Timur";
        $this->load->view('home_view', $data);
    }

    public function display()
    {        
        $data['display'] = $this->m_article->list_home();
        $this->load->view('home_view', $data);
    }   

}