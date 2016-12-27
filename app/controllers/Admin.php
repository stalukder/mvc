<?php 

class Admin extends DController{
	public function __construct(){
		parent:: __construct();
		Session::checkSession();
	}

	public function Index(){
		$this->home();
	}

	public function login(){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	public function home(){
		$this->load->view('header');
		$this->load->view('admin/home');
		$this->load->view('footer');
	}
 
}