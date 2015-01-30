<?php

class User extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
	}
	
	function index(){
		$this->_set_validation_rules();
		$data = $this->_loadUserData();
		$this->load->view('html_open');
		$this->load->view('head', array("section"=>"Usuario"));
		$this->load->view('body_open');
		$this->load->view('facebook_js_sdk');
		$this->load->view('header');
		if ($this->form_validation->run() == false){
			$this->load->view('user/main', $data);
		}else{
			$this->load->view('user/register', $data);
		}
		$this->load->view('footer');
		$this->load->view('body_close');
		$this->load->view('html_close');
	}
	
	private function _set_validation_rules(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('profile', 'profile', 'required');
		$this->form_validation->set_rules('about', 'about', 'required');
		$this->form_validation->set_rules('token', 'token', 'required');
	}
	
	private function _getData(){
		
		$data = $this->_loadUserData();
		
	}
	
	
	
	private function _saveUser($data){
		
	}
	
	private function _loadUserData(){
		$isColaborador = false;
		$data = array();
		$fuser = $this->facebook->get_user();
		$data["profile"] = '';
		$data["about"] = '';
		if($fuser){
			$data["username"] = $this->_generateUsername($fuser["middle_name"]);
			$data["email"] = $fuser["email"];
			$data["name"] = $fuser["name"];
			$data["facebook_id"] = $fuser["id"];
			$user = $this->user_model->get_user($fuser["id"]);
			if($user) {
				$data["user"] = $user;
				$isColaborador = true;
			}
		}
		$data["isColaborador"] = $isColaborador;
		$data["fuser"] = $fuser;
		return $data;
	}
	
	private function _generateUsername($midlename){
		return str_replace(' ','.',strtolower ( $midlename ));
	} 
	
	

	
}