<?php 

class Login extends DController{
	public function __construct(){
		parent:: __construct();
	}

	public function Index(){
		$this->login();
	}

	public function login(){
		Session::init();
		if(Session::get("login")==true){
			header('Location: '.BASE_URL.'/Admin');
		}
		$this->load->view('header');
		$this->load->view('Login/login');
		$this->load->view('footer');
	}

	public function loginAuth(){
		$table_user = 'tbl_user';
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$LoginModel = $this->load->model('LoginModel');
		$count = $LoginModel->userControll($table_user,$username,$password);
		if($count > 0 ){
			$result = $LoginModel->getUserData($table_user,$username,$password);
			Session::init();
			Session::set("login",true);
			Session::set("username",$result[0]['username']); 
			Session::set("userid",$result[0]['id']); 
			header('Location: '.BASE_URL.'/Admin');
		}else{
			header('Location: '.BASE_URL.'/Login');
		}
	}


	public function logout(){
		Session::init();
		Session::destroy();
		header('Location: '.BASE_URL.'/Login');
	}
 
}