<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}
        
	public function login()
	{
		redirect('admin/dashboard');
	}
        
    public function logout()
	{
    	redirect('admin/auth');
	}
}
